<script setup>
import Table from "./Components/Table.vue";

defineProps(["resource"])
</script>

<template>
    <div class="table-responsive">
        <Table :resource="resource" :input-debounce-ms="500">

        </Table>
    </div>
</template>
