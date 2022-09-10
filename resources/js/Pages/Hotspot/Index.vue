<template>
    <AppLayout title="Hotspotlar">
        <PageHeader title="Hotspotlar"></PageHeader>
        <div class="row mb-3">
            <div class="col">
                <form @submit.prevent="submitCreate" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Yeni Hotspot Ekle</h3>
                        <div class="card-actions">
                            <button type="submit" class="btn btn-primary" :class="{'btn-loading': form_hotspot.processing}"><PlusIcon/> Yeni Ekle</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <FormInput placeholder="Hotspot Adı" v-model="form_hotspot.name" :error="form_hotspot.errors.name"></FormInput>
                            </div>
                            <div class="col-md-4 col-lg-4 pt-2">
                                <TomSelect v-model="form_hotspot.router_id" placeholder="Router seç">
                                    <option v-for="router in page_routers" :value="router.id">{{router.name}} - {{router.ip_address}}</option>
                                </TomSelect>
                                <div class="small text-danger mt-1">{{form_hotspot.errors.router_id}}</div>
                            </div>
                        </div>
                    </div>

                    <CardProgress :progress="form_hotspot.processing"/>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <Table :resource="page_hotspots">
                        <template #cell(actions)="{ item: hotspot }">
                            <Link :href="route('hotspot.show',hotspot)" class="btn">
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
import FormInput from "@/Components/Form/Input.vue"
import CardProgress from "@/Components/CardProgress.vue"
import Table from "@/Components/Tabler/Components/Table.vue";
import TomSelect from "@/Components/Form/TomSelect.vue";

const form_hotspot = useForm({
    name:null,
    router_id:''
})

defineProps({
    page_routers: Array,
    page_hotspots: Object
})

function submitCreate() {
    form_hotspot.post(route('hotspot.store'),{
        onSuccess: () => form_hotspot.reset()
    })
}

</script>
