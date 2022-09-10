<template>
    <Head v-if="title" :title="title">
        <slot name="head" />
    </Head>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div :class="'container-'+containerType">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img :src="$page.props.app.app_logo" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <UserInfo :user="$page.props.user"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <Link :href="route('account.profile')" class="dropdown-item">
                                Hesabım</Link>
                            <div class="dropdown-divider"></div>
                            <Link :href="route('logout')" method="post" as="button" class="dropdown-item">Oturumu Kapat</Link>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <NavMenu/>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="page-body">
                <div :class="'container-'+containerType">
                    <Alert type="warning" class="alert-important" icon v-if="!$page.props.user.email_verified_at">E-Posta adresinizi onaylamanız gerekmektedir.</Alert>
                    <slot/>
                </div>
            </div>
            <VaFooter></VaFooter>
        </div>
        <FlashMessage/>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3"
import { Head } from '@inertiajs/inertia-vue3'

import VaFooter from "@/Components/Layout/Footer.vue"
import NavMenu from "@/Components/Layout/NavMenu.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import UserInfo from "@/Components/UserInfo.vue";
import Alert from "@/Components/Alert.vue";

defineProps({
    containerType:{
        type: String,
        default: () => 'xl'
    },
    title:String
})

</script>
