<template>
    <AppLayout title="Router Görüntüle" container-type="fluid">
        <PageHeader :back-href="route('router.index')" back-text="Router'lar" title="Router Cihaz Bilgisi" :sub-title="page_router.name+ ' - '+page_router.ip_address+ ' Identity: '+page_router.identity">
            <template #actions>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                        Seçenekler
                    </button>
                    <div class="dropdown-menu">
                        <Link :href="route('router.edit',page_router)" class="dropdown-item"><EditIcon class="dropdown-item-icon"/> Düzenle</Link>
                        <a href="#" @click.prevent="confirmDelete" class="dropdown-item">
                            <TrashIcon class="dropdown-item-icon text-danger"/> Router Sil
                        </a>
                    </div>
                </div>
            </template>
        </PageHeader>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trafik Log Kayıtları</h3>
                    </div>
                    <div class="table-response">
                        <Table :resource="page_syslogs"></Table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";

import {Link} from "@inertiajs/inertia-vue3"
import {TrashIcon,EditIcon} from "vue-tabler-icons"
import {Inertia} from "@inertiajs/inertia";
import {useConfirm} from "@/src/useConfirm";
import Table from "@/Components/Tabler/Components/Table.vue";

const props = defineProps({
    page_router: Object,
    page_syslogs: Object
})

function confirmDelete() {
    useConfirm('Bu routerı silmek istediğinize emin misiniz?').then((result) => {
        if(result.isConfirmed){
            Inertia.delete(route('router.destroy',props.page_router))
        }
    })
}

</script>
