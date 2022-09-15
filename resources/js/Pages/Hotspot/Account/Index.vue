<template>
    <AppLayout title="Hotspot Kullanıcıları">
        <PageHeader title="Hotspot Kullanıcıları"></PageHeader>
        <div class="row">
            <div class="col">
                <div class="card">
                    <Table :resource="page_hotspot_accounts">
                        <template #head>
                            <tr>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>TELEFON</th>
                                <th>TC KİMLİK</th>
                                <th class="w-1">SON TELEFON ONAYI</th>
                                <th class="w-1">SON KİMLİK ONAYI</th>
                                <th class="w-1">İŞLEMLER</th>
                            </tr>
                        </template>
                        <template #body>
                            <tr
                                v-for="(account, key) in page_hotspot_accounts.data"
                                :key="key"
                            >
                                <td>{{ account.name }}</td>
                                <td>{{ account.surname }}</td>
                                <td><span v-maska="'### ### ## ##'">{{ account.phone }}</span></td>
                                <td>{{ account.identity_number }}</td>
                                <td>{{ account.phone_verified_at }}</td>
                                <td>{{ account.identity_verified_at }}</td>
                                <td>
                                    <Link :href="route('hotspot.show',account)" class="btn btn-sm">
                                        <ChevronRightIcon/> Görüntüle
                                    </Link>
                                </td>
                            </tr>
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
