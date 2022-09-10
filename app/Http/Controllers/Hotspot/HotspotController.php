<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotspot\HotspotCreateRequest;
use App\Http\Requests\Hotspot\HotspotLoginIdentityRequest;
use App\Http\Requests\Hotspot\HotspotUpdateRequest;
use App\Models\Hotspot;
use App\Models\HotspotAccount;
use App\Models\Router;
use App\Models\Syslog\SystemEvent;
use App\Models\User;
use App\Services\Radius\RadiusService;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HotspotController extends Controller
{
    public function index()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('description', 'LIKE', "%{$value}%");
                });
            });
        });

        $routers = Router::all();
        $hotspots = QueryBuilder::for(Hotspot::class)
            ->allowedSorts(['name', 'description'])
            ->allowedFilters(['name', 'description', $globalSearch])
            ->paginate(request()->query('perPage', 15))
            ->withQueryString();

        return Inertia::render('Hotspot/Index', [
            'page_hotspots' => $hotspots,
            'page_routers' => $routers
        ])->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'name', searchable: true, sortable: false, canBeHidden: false)
                ->column(key: 'description', label: 'Açıklama', searchable: true, sortable: false ,canBeHidden: false)
                ->column(key: 'actions',label: 'İşlemler',canBeHidden: false);

        });

    }

    public function create()
    {
    }

    public function store(HotspotCreateRequest $request)
    {
        Hotspot::create($request->validated());
        flash('Yeni Hotspot Oluşturuldu.')->success();
    }

    public function show($hotspot_id)
    {
        $hotspot = Hotspot::with('router')->findOrFail($hotspot_id);

        return Inertia::render('Hotspot/Show', [
            'page_hotspot' => $hotspot
        ]);

    }

    public function edit($hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);
        $routers = Router::all();

        return Inertia::render('Hotspot/Edit', [
            'page_hotspot' => $hotspot,
            'page_routers' => $routers
        ]);
    }

    public function update(HotspotUpdateRequest $request, $hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);

        $hotspot->update($request->validated());
        flash('Hotspot bilgisi güncellendi.')->success();

        return redirect()->route('hotspot.show',$hotspot);
    }

    public function destroy($hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);

        $hotspot->delete();

        flash('Hotspot bilgisi silindi.')->success();

        return redirect()->route('hotspot.index');
    }

    public function login($hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);
        $phone = preg_replace('/\s+/', '', request()->input('phone'));

        return view('hotspot.login.index',compact('hotspot','phone'));
    }
    public function loginRedirect(Request $request, $hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);
        $action = route('hotspot-login.index',$hotspot->id);
        $phone = preg_replace('/\s+/', '', request()->input('phone'));
        $link_login_only = request()->input('link-login-only');
        $link_orig = request()->input('link-orig');
        $account_id = request()->input('account_id');

        return view('hotspot.login.index-redirect',compact('hotspot','phone','action','link_login_only','link_orig','account_id'));
    }

    public function testResult(Request $request)
    {
        $request->dd();

    }
}
