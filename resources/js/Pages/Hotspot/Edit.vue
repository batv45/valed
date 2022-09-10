<template>
    <AppLayout title="Hotspot Düzenle">
        <PageHeader title="Hotspot Düzenle" :sub-title="page_hotspot.name">
            <template #actions>
                <button type="submit" form="hotspotform" :class="{'btn-loading': form_hotspot.processing}" class="btn btn-primary"><CheckIcon/> Kaydet</button>
            </template>
        </PageHeader>
        <form id="hotspotform" @submit.prevent="submitEdit" class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hotspot Bilgileri</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <FormInput label="Hotspot Adı" v-model="form_hotspot.name"></FormInput>
                                </div>
                                <div class="mb-3">
                                    <TextareaAutosize label="Açıklama" v-model="form_hotspot.description" placeholder="Açıklama"></TextareaAutosize>
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Router</label>
                                <TomSelect v-model="form_hotspot.router_id"  :settings="tomSettings" placeholder="Router seç">
                                    <option v-for="router in page_routers" :value="router.id">{{router.name}} - {{router.ip_address}}</option>
                                </TomSelect>
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
import FormInput from "@/Components/Form/Input.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import TextareaAutosize from "@/Components/Form/TextareaAutosize.vue";
import {CheckIcon} from "vue-tabler-icons"
import TomSelect from "@/Components/Form/TomSelect.vue";
import {onMounted, ref} from "vue";

const props = defineProps({
    page_hotspot: Object,
    page_routers: Array
})

const tomSettings = ref()

const form_hotspot = useForm({
    name: props.page_hotspot.name,
    description: props.page_hotspot.description,
    router_id: props.page_hotspot.router_id
})

function submitEdit() {
    form_hotspot.put(route('hotspot.update',props.page_hotspot))
}
onMounted(() => {
})
</script>
