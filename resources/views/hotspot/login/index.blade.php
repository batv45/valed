<x-hotspot.login.layout>
    <x-slot:title>
        Giriş - {{$hotspot->name}}
    </x-slot:title>
    <script>
        const link_login_only = '{{old('link-login-only', request()->input('link-login-only'))}}'
        const link_orig = '{{old('link-orig', request()->input('link-orig'))}}'
    </script>
<div class="container-tight py-4">
    <div class="text-center mb-3">
        <h4 class="display-6">{{$hotspot->name}}</h4>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-title">Aşağıdaki hataları kontrol edin&hellip;</h4>
            @foreach ($errors->all() as $error)
                <p class="m-0 text-danger">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(is_null(old('link-login-only',request()->input('link-login-only'))))
        <h3 class="text-danger text-center">Hata: Router adresi mevcut değil</h3>
    @endif
    @if (request()->input('error'))
        <div class="alert alert-danger">
            {{request()->input('error')}}
        </div>
    @endif

    <div class="card">
        <ul class="nav nav-tabs nav-fill" data-bs-toggle="tabs">
            <li class="nav-item">
                <a href="#tabs-tc" class="nav-link {{!$phone ? 'active' : ''}}" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 11l2 2l4 -4"></path>
                    </svg> T.C. Kimlik Doğrulaması</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-sms" class="nav-link {{$phone ? 'active' : ''}}" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile-message me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11 3h10v8h-3l-4 2v-2h-3z"></path>
                        <path d="M15 16v4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h2"></path>
                        <path d="M10 18v.01"></path>
                    </svg> SMS Doğrulaması</a>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane {{!$phone ? 'active show' : ''}}" id="tabs-tc">
                    @include('hotspot.login.checker.identity')
                </div>
                <div class="tab-pane {{$phone ? 'active show' : ''}}" id="tabs-sms">
                    @include('hotspot.login.checker.sms')
                </div>
            </div>
        </div>
    </div>
    </div>
</x-hotspot.login.layout>
