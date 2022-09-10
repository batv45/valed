<template>
    <AppLayout title="Hesabım">
        <PageHeader title="Hesabım"> </PageHeader>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <TabProfile :user="user"></TabProfile>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import TabProfile from "@/Pages/Account/Components/TabProfile.vue";

export default {
    name: "Profile",
    components: {TabProfile, PageHeader, AppLayout},
    props:{
        user:Object
    },
    data(){
        return {

        }
    }
}
</script>
