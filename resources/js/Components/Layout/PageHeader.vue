<template>
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">

            <div class="col">
                <slot>
                    <div class="page-title">
                        {{ title }}
                    </div>
                    <span class="page-subtitle">
                        {{ subTitle }}
                    </span>
                </slot>
            </div>

            <div class="col-auto col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <slot name="actions"></slot>
                    <Link v-if="backHref" :href="backHref" class="btn btn-dark d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="15 6 9 12 15 18"></polyline>
                        </svg>
                        {{backText}}
                    </Link>
                    <Link v-if="backHref" :href="backHref" class="btn btn-dark d-sm-none btn-icon" aria-label="Geri dön">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="15 6 9 12 15 18"></polyline>
                        </svg>
                    </Link>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3"
defineProps({
    title: String,
    subTitle: String,
    backHref: String,
    backText: {
        type: String,
        default: 'Geri Dön'
    }
})
</script>

<style scoped>

</style>
