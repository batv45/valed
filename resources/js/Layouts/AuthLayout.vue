<template>
    <Head v-if="title" :title="title">
        <slot name="head" />
    </Head>
    <div class="page page-center">
        <div class="container-tight py-4">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'

defineProps({
    title:String
})
</script>
