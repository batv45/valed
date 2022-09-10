<template>
    <ul class="navbar-nav nav-pills">
        <li class="nav-item"  :class="{'active': route().current('index')}">
            <Link class="nav-link" :href="route('index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  Ana Sayfa
                </span>
            </Link>
        </li>
        <li class="nav-item" :class="{'active': route().current('router.*')}">
            <Link class="nav-link" :href="route('router.index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                <wifi-icon ></wifi-icon>
                </span>
                <span class="nav-link-title">
                    Routerlar
                </span>
            </Link>
        </li>
        <li class="nav-item" :class="{'active': route().current('hotspot.*')}">
            <Link class="nav-link" :href="route('hotspot.index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                <wifi-icon ></wifi-icon>
                </span>
                <span class="nav-link-title">
                    Hotspotlar
                </span>
            </Link>
        </li>
        <li class="nav-item" :class="{'active': route().current('hotspot-account.*')}">
            <Link class="nav-link" :href="route('hotspot-account.index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                <users-icon ></users-icon>
                </span>
                <span class="nav-link-title">
                    Hotspot Kullanıcıları
                </span>
            </Link>
        </li>
    </ul>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {WifiIcon,UsersIcon} from "vue-tabler-icons"
</script>

<style scoped>

</style>
