<template>
    <AuthLayout title="E-Posta Doğrula">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="." method="get">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">E-Posta adresinizi doğrulayın</h2>
                <p class="text-muted mb-4">E-Posta gelen kutunuzu kontrol edin. Hesabınızı doğrulamanız için size bir e-posta gönderdik. Gönderdiğimiz e-posta içerisindeki doğrulama linkini kullanın.</p>
                <div>
                    <Link :href="route('verification.send')" method="post" as="button" class="btn btn-primary w-100">
                        Tekrar gönder.
                    </Link>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";

</script>
