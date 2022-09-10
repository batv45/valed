<template>
    <AppLayout title="Router Düzenle">
        <PageHeader title="Router Düzenle" :sub-title="page_router.name" :back-href="route('router.show',page_router)">
            <template #actions>
                <button type="submit" form="routerForm" :class="{'btn-loading': form_router.processing}" class="btn btn-primary"><CheckIcon/> Kaydet</button>
            </template>
        </PageHeader>

        <form id="routerForm" @submit.prevent="submitForm" class="row">

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Router bilgileri</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <FormInput label="Cihaz Adı" v-model="form_router.name" :error="form_router.errors.name"></FormInput>
                            </div>
                            <div class="col-md-4">
                                <FormInput label="IP Adres" v-model="form_router.ip_address" :error="form_router.errors.ip_address"></FormInput>
                            </div>
                            <div class="col-md-4">
                                <FormInput label="API Port" v-model="form_router.api_port" :error="form_router.errors.api_port"></FormInput>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <FormInput label="API Username" v-model="form_router.api_username" :error="form_router.errors.api_username"></FormInput>
                            </div>
                            <div class="col-md-4">
                                <FormInput label="API Password" v-model="form_router.api_password" :error="form_router.errors.api_password"></FormInput>
                            </div>
                        </div>

                        <div class="hr-text">Logging</div>

                        <div class="row">
                            <div class="col-md-4">
                                <FormInput label="Identity" v-model="form_router.identity" :error="form_router.errors.identity"></FormInput>
                            </div>
                            <div class="col-md-4">
                                <FormInput label="Log Prefix" v-model="form_router.log_prefix" :error="form_router.errors.log_prefix"></FormInput>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import {CheckIcon} from "vue-tabler-icons"
import FormInput from "@/Components/Form/Input.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    page_router: Object
})

const form_router = useForm({
    name: props.page_router.name,
    description: props.page_router.description,
    ip_address: props.page_router.ip_address,
    api_username: props.page_router.api_username,
    api_password: props.page_router.api_password,
    api_port: props.page_router.api_port,
    identity: props.page_router.identity,
    log_prefix: props.page_router.log_prefix
})

function submitForm(){
    form_router.put(route('router.update',props.page_router))
}
</script>
