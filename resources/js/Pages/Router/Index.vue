<template>
    <AppLayout title="Routerlar">
        <PageHeader title="Routerlar" sub-title="Mikrotik router cihazları listesi">

        </PageHeader>
        <div class="row mb-3">
            <div class="col">
                <form @submit.prevent="submitCreate" class="card">
                    <div class="card-header">
                        <h3 class="card-title"><PlusIcon /> Yeni Router Ekle</h3>
                        <div class="card-actions">
                            <button type="submit" class="btn btn-primary" :class="{'btn-loading': form_router.processing}"><PlusIcon/> Yeni Ekle</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <FormInput placeholder="Cihaz adı" v-model="form_router.name" :error="form_router.errors.name"></FormInput>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <FormInput placeholder="IP Adres" v-model="form_router.ip_address" :error="form_router.errors.ip_address"></FormInput>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <FormInput placeholder="API Port" v-model="form_router.api_port" :error="form_router.errors.api_port"></FormInput>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <FormInput placeholder="API Kullanıcı" v-model="form_router.api_username" :error="form_router.errors.api_username"></FormInput>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <FormInput placeholder="API Şifre" v-model="form_router.api_password" :error="form_router.errors.api_password"></FormInput>
                            </div>
                        </div>
                    </div>

                    <CardProgress :progress="form_router.processing"/>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Router Cihaz Listesi</h3>
                    </div>
                    <div class="table-responsive">
                        <Table :resource="page_routers">
                            <template #cell(actions)="{ item: router }">
                                <Link :href="route('router.show',router)" class="btn">
                                    <ChevronRightIcon/> Görüntüle
                                </Link>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import Table from "@/Components/Tabler/Components/Table.vue";
import FormInput from "@/Components/Form/Input.vue";
import {PlusIcon,ChevronRightIcon} from "vue-tabler-icons";
import {useForm, Link} from "@inertiajs/inertia-vue3";
import CardProgress from "@/Components/CardProgress.vue";

const form_router = useForm({
    name:null,
    ip_address:null,
    api_port:8728,
    api_username:null,
    api_password:null,
})

function submitCreate(){
    form_router.post(route('router.store'),{
        onSuccess: () => {
            form_router.reset()
        }
    })
}

defineProps({
    page_routers:Object
})
</script>
