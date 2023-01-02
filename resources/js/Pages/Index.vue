<template>
    <Head title="Ana Sayfa"></Head>
    <AppLayout>
        <PageHeader title="Ana Sayfa" sub-title="Hotspot Dashboard" />
        <pre>{{$page.props.user}}</pre>
    </AppLayout>
</template>

<script setup>
import {Head} from "@inertiajs/inertia-vue3"
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
</script>

