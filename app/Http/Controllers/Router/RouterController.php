<?php

namespace App\Http\Controllers\Router;

use App\Http\Controllers\Controller;
use App\Http\Requests\Router\RouterCreateRequest;
use App\Http\Requests\Router\RouterUpdateRequest;
use App\Models\Router;
use App\Models\Syslog\SystemEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RouterController extends Controller
{
    public function index()
    {
        $routers = QueryBuilder::for(Router::class)
            ->paginate(request()->query('perPage', 15))
            ->withQueryString();

        return inertia('Router/Index',[
            'page_routers' =>  $routers
        ])->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column('name', 'Cihaz Adı', false)
                ->column('ip_address', 'IP Adres', false)
                ->column('api_port', 'Api Port', false)
                ->column('api_username', 'Api Kullanıcı', false)
                ->column('api_password', 'Api Şifre', true,true)
                ->column('actions', 'İşlemler', false);
        });
    }

    public function create()
    {
        return redirect()->route('router.index');
    }

    public function store(RouterCreateRequest $request)
    {
        $router = Router::create($request->validated());
        if($router->wasRecentlyCreated){
            flash('Yeni Router oluşturuldu.')->success();
        }
        return redirect()->route('router.index');
    }

    public function show($router_id)
    {
        $router = Router::findOrFail($router_id);

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('FromHost', 'LIKE', "%{$value}%")
                        ->orWhere('Message', 'LIKE', "%{$value}%");
                });
            });
        });


        $syslogs = QueryBuilder::for(SystemEvent::class)
            ->where('SysLogTag','hotspotlog')
            ->when($router->identity, function ($query, $identity) {
                $query->where('FromHost', $identity);
            })
            ->allowedFilters(['FromHost', 'Message', 'ReceivedAt','DeviceReportedTime',
                $globalSearch])
            ->latest('ID')
            ->paginate(request()->query('perPage', 15))
            ->withQueryString();

        return inertia('Router/Show',[
            'page_router' => $router,
            'page_syslogs' => $syslogs
        ])->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch('Arama...')
                ->column(key: 'ID', label:'#ID', searchable: true, sortable: true)
                ->column(key: 'FromHost', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'ReceivedAt', label: 'Tarih', searchable: true, sortable: true )
                ->column(key: 'DeviceReportedTime', label: 'Rapor Tarihi', searchable: true, sortable: true )
                ->column(key: 'Message', label: 'Açıklama', searchable: true, sortable: true ,canBeHidden: false);
        });
    }

    public function edit($router_id)
    {

        $router = Router::findOrFail($router_id);

        return inertia('Router/Edit', [
            'page_router' => $router,

        ]);
    }

    public function update(RouterUpdateRequest $request, $router_id)
    {
        $router = Router::findOrFail($router_id);

        $router->update($request->validated());

        flash('Router bilgis güncellendi.')->success();
        return redirect()->route('router.show', $router_id);
    }

    public function destroy($router_id)
    {
        $router = Router::findOrFail($router_id);

        $router->forceDelete();

        flash('Router bilgisi silindi.')->success();

        return redirect()->route('router.index');
    }
}
