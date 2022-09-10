<template>
    <AuthLayout title="Şifremi Unuttum">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img :src="$page.props.app.app_logo" height="36" alt=""></a>
        </div>
        <form class="card card-md" @submit.prevent="submitForm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Şifre Sıfırlama</h2>
                <p class="text-muted mb-4">Şifrenizi sıfırlamak için hesabınıza kayıtlı e-posta adresinizi giriniz.</p>
                <div class="mb-3">
                    <FormInput type="email" label="E-Posta Adresi" v-model="form_forgot.email" :error="form_forgot.errors.email" required></FormInput>
                </div>
                <div class="form-footer">
                    <button type="submit" :class="{'btn-loading': form_forgot.processing}" class="btn btn-primary w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
                        Gönder
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Giriş ekranınıa dönmek için <Link :href="route('login')">tıklayın</Link>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import {Link, useForm} from "@inertiajs/inertia-vue3";
import FormInput from "@/Components/Form/Input.vue"

export default {
    name: "ForgotPassword",
    components: {AuthLayout, Link, FormInput},
    data(){
        return {
            form_forgot: useForm({
                email: null
            })
        }
    },
    methods:{
        submitForm(){
            this.form_forgot.post(route('password.email'))
        }
    }
}
</script>
