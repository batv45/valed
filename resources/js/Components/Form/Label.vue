<script setup>
defineProps({
    value:String,
    required:{
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <label class="form-label" :class="{'required': required}">
        <span v-if="value">{{ value }}</span>
        <span v-else> <slot /></span>
    </label>
</template>
