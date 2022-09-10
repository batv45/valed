<template>
    <AppLayout title="Hotspot Görüntüle">
        <PageHeader :title="page_hotspot.name"
                    :back-href="route('hotspot.index')"
                    back-text="Hotspot'lar"
                    sub-title="Hotspot Bilglileri">
            <template #actions>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                        Seçenekler
                    </button>
                    <div class="dropdown-menu">
                        <Link :href="route('hotspot.edit',page_hotspot)" class="dropdown-item"><EditIcon class="dropdown-item-icon"/> Düzenle</Link>
                        <a href="#" @click.prevent="confirmDelete" class="dropdown-item">
                            <TrashIcon class="dropdown-item-icon text-danger"/> Hotspot Sil
                        </a>
                    </div>
                </div>
            </template>
        </PageHeader>
        <div class="row justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Router Bilgileri</h3>
                        <div class="card-actions">
                            <Link v-if="page_hotspot.router" :href="route('router.show',page_hotspot.router_id)" class="btn btn-light btn-sm">Log Görüntüle</Link>
                            <span v-else class="badge bg-danger-lt animate__animated animate__pulse animate__infinite ">Router Seçilmedi</span>
                        </div>
                    </div>
                    <div class="card-body"  v-if="page_hotspot.router">
                        <dl class="row">
                            <dt class="col-5">Cihaz Adı:</dt>
                            <dd class="col-7">{{page_hotspot.router.name}}</dd>

                            <dt class="col-5">Cihaz IP:</dt>
                            <dd class="col-7">{{page_hotspot.router.ip_address}}</dd>

                            <dt class="col-5">API Port:</dt>
                            <dd class="col-7">{{page_hotspot.router.api_port}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Router Giriş Sayfası</h3>
                        <div>
                            <DownloadIcon/> <a :href="route('hotspot-template-login',page_hotspot)" target="_blank" class="text-primary">login.html</a>
                            <Link as="button" method="post" :href="route('hotspot-login.index',page_hotspot)" :data="{
                                'link-login-only' : route('hotspot-login.test-result',page_hotspot)
                            }" target="_blank" class="ms-2 badge ">Test Modu</Link>
                        </div>
                    </div>
                </div>

                <div v-if="page_hotspot.description" class="card bg-secondary-lt mt-2">
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-typography" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="4" y1="20" x2="7" y2="20"></line>
                                <line x1="14" y1="20" x2="21" y2="20"></line>
                                <line x1="6.9" y1="15" x2="13.8" y2="15"></line>
                                <line x1="10.2" y1="6.3" x2="16" y2="20"></line>
                                <polyline points="5 20 11 4 13 4 20 20"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Hotspot Açıklaması <Link :href="route('hotspot.edit',page_hotspot)" class="text-primary"><EditIcon/></Link></h3>
                        <p>{{page_hotspot.description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import {EditIcon,TrashIcon,DownloadIcon,AssemblyIcon} from "vue-tabler-icons"
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import {Link} from "@inertiajs/inertia-vue3"
import {useConfirm} from "@/src/useConfirm";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    page_hotspot: Object,
})


function confirmDelete() {
    useConfirm('Bu hotspotu silmek istediğinize emin misiniz?').then((result) => {
        if(result.isConfirmed){
            Inertia.delete(route('hotspot.destroy',props.page_hotspot))
        }
    })
}
</script>
