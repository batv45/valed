<template>
  <th
    v-show="!cell.hidden"
  >
    <component
      :is="cell.sortable ? 'div' : 'div'"
      :class="{'cursor-pointer' : cell.sortable}"
      :dusk="cell.sortable ? `sort-${cell.key}` : null"
      @click.prevent="onClick"
    >
      <span class="">
        <slot name="label"><span class="uppercase">{{ cell.label }}</span></slot>

        <slot name="sort">
            <svg
                v-if="cell.sortable && !cell.sorted"
                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M3 9l4 -4l4 4m-4 -4v14"></path>
               <path d="M21 15l-4 4l-4 -4m4 4v-14"></path>
            </svg>
            <svg
                v-if="cell.sortable && cell.sorted === 'asc'"
                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-ascending-letters" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4"></path>
               <path d="M19 21h-4l4 -7h-4"></path>
               <path d="M4 15l3 3l3 -3"></path>
               <path d="M7 6v12"></path>
            </svg>
            <svg
                v-if="cell.sortable && cell.sorted === 'desc'"
                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-descending-letters" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M15 21v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4"></path>
               <path d="M19 10h-4l4 -7h-4"></path>
               <path d="M4 15l3 3l3 -3"></path>
               <path d="M7 6v12"></path>
            </svg>
        </slot>
      </span>
    </component>
  </th>
</template>

<script setup>
const props = defineProps({
    cell: {
        type: Object,
        required: true,
    },
});

function onClick() {
    if (props.cell.sortable) {
        props.cell.onSort(props.cell.key);
    }
}
</script>
