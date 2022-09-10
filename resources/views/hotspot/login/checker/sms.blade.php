<div class="mt-1">

    {{--    <input type="hidden" name="link-login" value="{{old('link-login',request()->input('link-login'))}}">--}}
    <input type="hidden" name="link-login-only"
{{--           value="{{old('link-login-only',request()->input('link-login-only'))}}">--}}
    <input type="hidden" name="link-orig" value="{{old('link-orig',request()->input('link-orig'))}}">
    <input type="hidden" name="link-orig-esc"
           value="{{old('link-orig-esc',request()->input('link-orig-esc'))}}">
    <input type="hidden" name="username" value="{{old('username',request()->input('username'))}}">
    <input type="hidden" name="error" value="{{old('error',request()->input('error'))}}">
    @csrf
    <div x-data="sms" class="card-body p-3">
        <h2 class="card-title text-center mb-3">Telefon Numarası Doğrulama</h2>
        <label class="form-label required">Telefon Numarası</label>

        <form @submit.prevent="utils.post" class="row g-2 mb-3">
            <div class="col">
                <div class="input-group mb-2">
                      <span class="input-group-text">
                        +90
                      </span>
                    <input type="text" name="phone" required
                           x-model="phone"
                            placeholder="5XX XXX XX XX"
                           x-mask="999 999 99 99"
                           :class="errors.phone ? 'is-invalid': ''"
                           class="form-control"
                           autocomplete="off">
                </div>
                <div x-show="sent && sentDisplay" class="text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg> Doğrulama mesajı gönderildi.</div>
                <div x-show="errors.phone" x-text="errors.phone" class="invalid-feedback d-block"></div>
            </div>
            <div class="col-auto">
                <button :disabled="block" type="submit" class="btn btn-white" aria-label="Button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                        <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5"></path>
                    </svg>

                    <span x-show="block"><span x-text="timer"></span>sn. bekleyiniz.</span>
                    <span x-show="!block">Gönder</span></button>
            </div>
            <div x-show="sending" class="progress">
                <div class="progress-bar progress-bar-indeterminate bg-primary"></div>
            </div>
        </form>

        <div x-show="sent">

            <div class="hr-text">Telefon numarası doğrulama</div>
            <label class="form-label required">Telefon Numarası <span x-show="test_code"><u>Test Code:</u> <span x-text="test_code" class="text-primary fs-2"></span></span></label>
            <form @submit.prevent="utils.check" class="row g-2 mb-3">
                <div class="col">
                    <input id="verification" type="text" name="code" required
                           x-model="code"
                           @input="utils.validateCode"
                           :class="errors.code || verified === false ? 'is-invalid': verified === true ? 'is-valid':''"
                           class="form-control text-center form-number form-control"
                           x-mask="999999"
                           placeholder="_ _ _ _ _ _" autocomplete="off">

                    <div x-show="verified === false" class="text-danger mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                        </svg> Doğrulama kodu hatalı!
                    </div>
                    <div x-show="verified === true" class="text-success mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg> Doğrulama kodu onaylandı. Giriş için yönlendiriliyorsunuz...</div>
                    <div x-show="errors.code" x-text="errors.code" class="invalid-feedback d-block"></div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-white " aria-label="Button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg> Doğrula
                    </button>
                </div>
            </form>
        </div>
        <form x-show="verified === true && username && password" x-ref="form_redirect" name="redirect" :action="link_login_only" method="post">
            <input type="text" hidden name="username" x-model="username">
            <input type="text" hidden name="password" x-model="password">
            <input type="hidden" name="dst" :value="link_orig">
            <button type="submit" class="btn btn-primary w-100"
                    value="Giriş için tıklayın."><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg> Giriş için tıklayın.
            </button>
        </form>
    </div>
    <script>
        const sendBlockSecond = 1;
        document.addEventListener('alpine:init', () => {
            Alpine.data('sms', () => ({
                account_id:'{{request()->input('account_id')}}',
                username:null,
                password:null,
                sending: false,
                block: false,
                timer: sendBlockSecond,
                x:null,
                sent: false,
                sentDisplay: false,
                verified:null,
                phone:'{{request()->input('phone','555 000 88 44')}}',
                code:null,
                test_code:null,
                errors:{},
                utils: {
                    post(){
                        this.sent = false
                        this.sending = true
                        this.errors = {}
                        axios.post('{{route('hotspot-login.send-sms',$hotspot->id)}}', {
                            phone: this.phone,
                        })
                            .then(({data}) => {
                                this.code = null
                                this.test_code = null
                                this.verified = null
                                this.errors = {}
                                this.block = true
                                this.sending = false
                                this.sent = data.sent
                                this.sentDisplay = true
                                if( data.code ){
                                    this.test_code = data.code
                                }
                                this.timer = sendBlockSecond
                                this.x = setInterval(() => {
                                    this.timer--
                                    if( this.timer < 1){
                                        clearInterval(this.x)
                                        this.block = false
                                        this.timer = sendBlockSecond
                                    }
                                }, 1000)
                                setTimeout(() => {
                                    this.sentDisplay = false
                                },5000)
                                console.log(data);
                            })
                            .catch((error) => {
                                this.sending = false
                                if( error.response.data.hasOwnProperty('errors')){
                                    this.errors = error.response.data.errors
                                }
                                // console.log(error.response.data,'ERRRR');
                            });
                    },
                    validateCode(e){
                        this.errors = {}
                        this.verified = null
                        if(e.target.value.length < 6){
                            this.errors = {
                                code: 'Doğrulama kodu en az 6 karakter olmalı.'
                            }
                        }
                    },
                    check(){
                        this.errors = {}
                        if(this.code.length < 6){
                            this.errors = {
                                code: 'Doğrulama kodu en az 6 karakter olmalı.'
                            }
                            return false;
                        }
                        axios.post('{{route('hotspot-login.check.sms',$hotspot->id)}}', {
                            phone: this.phone,
                            code: this.code,
                            account_id: parseInt(this.account_id)
                        })
                            .then(({data}) => {
                                if(data.hasOwnProperty('verified')){
                                    this.verified = data.verified
                                    if(data.verified === true){
                                        this.username = data.username
                                        this.password = data.password
                                        setTimeout(() => {
                                            this.$refs.form_redirect.submit()
                                        },1000)
                                    }
                                }
                            })
                            .catch((error) => {
                                this.sending = false
                                if( error.response.data.hasOwnProperty('errors')){
                                    this.errors = error.response.data.errors
                                }
                                console.log(error.response.data,'CHECK ERRRR');
                            })
                    }
                }
            }))
        })
    </script>
</div>
