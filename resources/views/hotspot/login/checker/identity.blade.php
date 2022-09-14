<form class="mt-1" action="{{route('hotspot-login.check.identity',$hotspot->id)}}" method="post"
      autocomplete="off">
    <input type="hidden" name="link-login" value="{{old('link-login',request()->input('link-login'))}}">
    <input type="hidden" name="link-login-only"
           value="{{old('link-login-only',request()->input('link-login-only'))}}">
    <input type="hidden" name="link-orig" value="{{old('link-orig',request()->input('link-orig'))}}">
    <input type="hidden" name="link-orig-esc"
           value="{{old('link-orig-esc',request()->input('link-orig-esc'))}}">
    <input type="hidden" name="username" value="{{old('username',request()->input('username'))}}">
    <input type="hidden" name="error" value="{{old('error',request()->input('error'))}}">
    @csrf
    <div class="card-body p-3">
        <h2 class="card-title text-center mb-3">TC Kimlik Girişi</h2>
        <div class="mb-3">
            <label class="form-label required">Ad</label>
            <input type="text" name="first_name" required
                   value="{{old('first_name','batuhan')}}"
                   class="form-control @error('first_name') is-invalid @enderror"
                   placeholder="Adınız" autocomplete="off">
            @error('first_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label required">Soyad</label>
            <input type="text" name="last_name" required
                   value="{{old('last_name','ok')}}"
                   class="form-control @error('last_name') is-invalid @enderror"
                   placeholder="Soyad" autocomplete="off">
            @error('last_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label required">Doğum Tarihi</label>
            <input type="text" name="birth_year" required
                   value="{{old('birth_year','1996')}}"
                   class="form-control @error('birth_year') is-invalid @enderror"
                   placeholder="Doğum Tarihiniz" autocomplete="off">
            @error('birth_year')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label required">TC Kimlik</label>
            <input type="text" name="identity_number" required
                   value="{{old('identity_number','54637335882')}}"
                   class="form-control @error('identity_number') is-invalid @enderror"
                   placeholder="TC Kimlik Numaranız" autocomplete="off">
            @error('identity_number')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Telefon Numarası <small>( Opsiyonel )</small></label>
            <input type="text" name="phone"
                   value="{{old('phone','5555555555')}}"
                   placeholder="5XX XXX XX XX"
                   x-mask="999 999 99 99"
                   class="form-control @error('phone') is-invalid @enderror"
                   autocomplete="off">
            <small class="form-hint">* Doğrulama gerektirir.</small>
            @error('phone')
            <div class="invalid-feedback d-block">{{$message}}</div>
            @enderror
        </div>
        <div class="form-footer">
            <button type="submit" @if(is_null(old('link-login-only',request()->input('link-login-only')))) disabled
                    @endif class="btn btn-primary w-100">Oturum Aç
            </button>
        </div>
    </div>
</form>
