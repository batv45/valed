<template>
    <form @submit.prevent="submitForm" class="card">
        <div class="card-header">
            <h3 class="card-title">Profil Bilgisi</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <FormInput label="Ad" v-model="form_profile.first_name" :error="form_profile.errors.first_name"></FormInput>
                </div>
                <div class="col-md-6">
                    <FormInput label="Soyad" v-model="form_profile.last_name" :error="form_profile.errors.last_name"></FormInput>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <FormInput label="E-Posta" v-model="form_profile.email" :error="form_profile.errors.email">
                        <template v-if="!form_profile.errors.email" #input-right>
                            <check-icon class="text-success" v-if="user.email_verified_at" />
                            <alert-triangle-icon class="text-warning" v-else />
                        </template>
                    </FormInput>
                    <small class="text-warning" v-if="!form_profile.errors.email && !user.email_verified_at">E-Posta gelen kutunuzu kontrol ediniz.</small>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary"> <CheckIcon/> Kaydet</button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import FormInput from "@/Components/Form/Input.vue";
import {CheckIcon, AlertTriangleIcon, UploadIcon} from "vue-tabler-icons"

const props = defineProps({
    user: {
        type: Object,
        required: true
    }
})

const form_profile = useForm({
    first_name: props.user.first_name,
    last_name: props.user.last_name,
    email: props.user.email,
    profile_photo:null
})

function submitForm(){
    form_profile.put(route('user-profile-information.update'),{
        errorBag:'updateProfileInformation'
    })
}
</script>
