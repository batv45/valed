<template>
    <div v-if="progress" class="progress progress-sm card-progress">
        <div class="progress-bar progress-bar-indeterminate" role="progressbar">
        </div>
    </div>
</template>

<script setup>
defineProps({
    progress:{
        type: Boolean,
        required: true
    }
})
</script>
