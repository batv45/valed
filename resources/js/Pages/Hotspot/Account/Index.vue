<template>
    <AppLayout title="Hotspot Kullanıcıları">
        <PageHeader title="Hotspot Kullanıcıları"></PageHeader>
        <div class="row">
            <div class="col">
                <div class="card">
                    <Table :resource="page_hotspot_accounts">
                        <template #cell(actions)="{ item: hotspot_account }">
                            <Link :href="route('hotspot.show',hotspot_account)" class="btn btn-sm">
                                <ChevronRightIcon/> Görüntüle
                            </Link>
                        </template>
                    </Table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import {PlusIcon, ChevronRightIcon} from "vue-tabler-icons"
import {Link, useForm} from "@inertiajs/inertia-vue3"
import Table from "@/Components/Tabler/Components/Table.vue";

defineProps({
    page_hotspot_accounts: Object
})
</script>
