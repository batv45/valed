<template>
  <AuthLayout>
      <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="static/logo.svg" height="36" alt=""></a>
      </div>
      <form class="card card-md" @submit.prevent="submitLogin" autocomplete="off">
          <div class="card-body">
              <h2 class="card-title text-center mb-4">Yeni Kullanıcı Hesabı</h2>
              <div class="mb-3">
                  <FormInput label="Ad" v-model="form.first_name" :error="form.errors.first_name" required />
              </div>
              <div class="mb-3">
                  <FormInput label="Soyad" v-model="form.last_name" :error="form.errors.last_name" required />
              </div>
              <div class="mb-3">
                  <FormInput label="E-Posta" type="email" v-model="form.email" :error="form.errors.email" required />
              </div>
              <div class="mb-3">
                  <FormInput :type="viewPassword ? 'text' : 'password'" v-model="form.password" :error="form.errors.password"  required >
                      <template #label>
                          Şifre
                      </template>
                      <template #input-right>
                          <a href="#" tabindex="-1" @click.prevent="changeViewPassword" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                              <svg v-if="!viewPassword" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <circle cx="12" cy="12" r="2"></circle>
                                  <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                              </svg>
                              <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                  <circle cx="12" cy="16" r="1"></circle>
                                  <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                              </svg>
                          </a>
                      </template>
                  </FormInput>
              </div>
              <div class="mb-3">
                  <FormInput :type="viewPassword ? 'text' : 'password'" v-model="form.password_confirmation" :error="form.errors.password" required>
                      <template #label>
                          Şifre Tekrar
                      </template>
                      <template #input-right>
                          <a href="#" tabindex="-1" @click.prevent="changeViewPassword" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                              <svg v-if="!viewPassword" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <circle cx="12" cy="12" r="2"></circle>
                                  <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                              </svg>
                              <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                  <circle cx="12" cy="16" r="1"></circle>
                                  <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                              </svg>
                          </a>
                      </template>
                  </FormInput>
              </div>
              <div class="form-footer">
                  <button type="submit" class="btn btn-primary w-100" :class="{'btn-loading' : form.processing}">Kayıt Ol</button>
              </div>
          </div>
      </form>
      <div class="text-center text-muted mt-3">
          Mevcut hesabınız var mı? <Link :href="route('login')" tabindex="-1">Oturum Aç</Link>
      </div>
  </AuthLayout>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import FormInput from "@/Components/Form/Input.vue"
import {ref} from "vue";

const form = useForm({
    first_name:null,
    last_name:null,
    email: null,
    password: null,
    password_confirmation: null,
    remember: false
})

const submitLogin = () => {
    form.post(route('register'))
}

const viewPassword = ref(false)
const changeViewPassword = () => {
    viewPassword.value = !viewPassword.value
}
</script>

<style scoped>

</style>
