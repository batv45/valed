<x-hotspot.login.layout>
    <x-slot:title>
        Giriş - {{$hotspot->name}}
    </x-slot:title>
<div class="container-tight py-4">
    <div class="container pt-3">
        <div class="alert alert-info">Yönlendiriliyorsunuz...</div>
        <form name="redirect" action="{{$action}}" method="post">
            <input type="text" hidden name="phone" value="{{$phone}}">
            <input type="text" hidden name="account_id" value="{{$account_id}}">
            <input type="text" hidden name="link-login-only" value="{{$link_login_only}}">
            <input type="hidden" name="dst" value="{{$link_orig}}">
            <button type="submit" class="btn btn-primary w-100"
                    value="DEVAM ET">DEVAM ET
            </button>
        </form>
    </div>
    <script>
        document.redirect.submit();
    </script>
</div>
</x-hotspot.login.layout>
