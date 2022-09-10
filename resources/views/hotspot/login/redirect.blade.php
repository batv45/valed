<x-hotspot.login.layout>
    <x-slot:title>
        Giriş - {{$hotspot->name}}
    </x-slot:title>

<div class="container-tight py-4">
    @if(is_null(request()->input('link-login-only')))
        <h3 class="text-danger">Hata: Router adresi mevcut değil</h3>
    @endif
    <div class="container pt-3">
        <div class="alert alert-info">Giriş için yönlendiriliyorsunuz...</div>

        <form name="redirect" action="{{request()->input('link-login-only')}}" method="post">
            <input type="text" hidden name="username" value="{{$username}}">
            <input type="text" hidden name="password" value="{{$password}}">
            <input type="hidden" name="dst" value="{{request()->input('link-orig')}}">
            <button type="submit" class="btn btn-primary w-100"
                    @if(is_null(request()->input('link-login-only'))) disabled @endif
                    value="DEVAM ET">DEVAM ET
            </button>
        </form>
    </div>
    <script>
        document.redirect.submit();
    </script>
</div>
</x-hotspot.login.layout>
