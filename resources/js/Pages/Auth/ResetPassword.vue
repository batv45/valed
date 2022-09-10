<template>
    <AuthLayout title="Şifre Sıfırlama">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img :src="$page.props.app.app_logo" height="36" alt=""></a>
        </div>
        <form class="card card-md" @submit.prevent="submitForm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Şifre Sıfırlama</h2>
                <div class="mb-3">
                    <FormInput label="Yeni Şifre" v-model="form_password.password" :error="form_password.errors.password" required></FormInput>
                </div>
                <div class="mb-3">
                    <FormInput label="Yeni Şifre Tekrar" v-model="form_password.password_confirmation" :error="form_password.errors.password_confirmation" required></FormInput>
                </div>
                <div class="form-footer">
                    <button type="submit" :class="{'btn-loading': form_password.processing}" class="btn btn-primary w-100">
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
import FormInput from "@/Components/Form/Input.vue";
import {Link, useForm} from "@inertiajs/inertia-vue3";
export default {
    name: "ResetPassword",
    components: {AuthLayout,FormInput, Link},
    data(){
        return {
            form_password: useForm({
                token: route().params.token,
                email:route().params.email,
                password:null,
                password_confirmation: null,
            })
        }
    },
    methods:{
        submitForm(){
            this.form_password.post(route('password.update'))
        }
    }
}
</script>

<style scoped>

</style>
