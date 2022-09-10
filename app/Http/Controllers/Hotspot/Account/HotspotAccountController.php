<?php

namespace App\Http\Controllers\Hotspot\Account;

use App\Http\Controllers\Controller;
use App\Models\HotspotAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HotspotAccountController extends Controller
{
    public function index()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });

        $hotaccts = QueryBuilder::for(HotspotAccount::class)
            ->allowedSorts(['first_name', 'last_name'])
            ->allowedFilters(['first_name', 'last_name', $globalSearch])
            ->paginate(request()->query('perPage', 15))
            ->withQueryString();

        return Inertia::render('Hotspot/Account/Index', [
            'page_hotspot_accounts' => $hotaccts,
        ])->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'name', label: 'Ad', canBeHidden: false, sortable: false, searchable: true)
                ->column(key: 'surname', label: 'Soyad', canBeHidden: false, sortable: false, searchable: true)
                ->column(key: 'phone', label: 'Telefon', canBeHidden: false, sortable: false, searchable: true)
                ->column(key: 'identity_number', label: 'TC Kimlik', canBeHidden: false, sortable: false, searchable: true)
                ->column(key: 'phone_verified_at', label:'Son telefon onayı', canBeHidden: false, sortable: true, searchable: true)
                ->column(key: 'identity_verified_at', label:'Son kimlik onayı', canBeHidden: false, sortable: true, searchable: true)
                ->column(key: 'actions',label: 'İşlemler',canBeHidden: false);

        });
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
