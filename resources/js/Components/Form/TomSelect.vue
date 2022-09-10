<template>
    <select class="form-select" :id="id" :value="modelValue" >
        <slot/>
    </select>
</template>

<script setup>
import TomSelect from "tom-select"
import {getCurrentInstance, nextTick, onBeforeUnmount, onMounted, onUnmounted, ref} from "vue";
import {v4 as uuid} from "uuid";

defineEmits(['update:modelValue']);

const instance = getCurrentInstance();

const props = defineProps({
    modelValue: [Number, String, Array],
    id: {
        type: String,
        default() {
            return `select-input-${uuid()}`
        },
    },
    settings: {
        type: Object,
        default: () => ({})
    },
    disabled: {
        type: Boolean,
        default: false
    }
})
const tomsel = ref(null)
onMounted(() => {
    tomsel.value = new TomSelect('#'+props.id,{
        // onInitialize: () => {
        //     // nextTick(() => {
        //     //     setTimeout(() => {
        //     //         // tomsel.value.setValue(props.modelValue,true)
        //     //         select.value.value = 1
        //     //         console.log(select.value.value)
        //     //     },1000)
        //     // })
        //
        // },
        onChange: value => {
            instance.emit('update:modelValue', value)
        },

        ...props.settings
    });
})
onUnmounted(() => {
    tomsel.value.destroy()
})
</script>
