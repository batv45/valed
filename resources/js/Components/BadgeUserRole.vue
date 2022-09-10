<template>
    <div class="d-inline">
        <span class="badge bg-azure-lt" :class="badgeClass" v-if="userHasRole('admin',user)">Yetkili</span>
        <span class="badge bg-red-lt" :class="badgeClass"  v-else-if="userHasRole('super-admin',user)">Sistem Yöneticisi</span>
        <span class="badge bg-dark-lt" :class="badgeClass"  v-else>Kullanıcı</span>
    </div>
</template>

<script>
export default {
    props:{
        badgeClass:String,
        user:Object
    },
    name: "BadgeUserRole"
}
</script>

<style scoped>

</style>
