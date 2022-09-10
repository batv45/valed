<template>
  <ButtonWithDropdown
    ref="dropdown"
    dusk="add-search-row-dropdown"
    :disabled="!hasSearchInputsWithoutValue"
    class="w-auto"
  >
    <template #button>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="15" cy="15" r="4"></circle>
            <path d="M18.5 18.5l2.5 2.5"></path>
            <path d="M4 6h16"></path>
            <path d="M4 12h4"></path>
            <path d="M4 18h4"></path>
        </svg>
    </template>

    <div
      role="menu"
      aria-orientation="horizontal"
      aria-labelledby="add-search-input-menu"
    >
      <button
        v-for="(searchInput, key) in searchInputs"
        :key="key"
        :dusk="`add-search-row-${searchInput.key}`"
        class="dropdown-item"
        role="menuitem"
        @click.prevent="enableSearch(searchInput.key)"
      >
        {{ searchInput.label }}
      </button>
    </div>
  </ButtonWithDropdown>
</template>

<script setup>
import ButtonWithDropdown from "./ButtonWithDropdown.vue";
import { ref } from "vue"

const props = defineProps({
    searchInputs: {
        type: Object,
        required: true,
    },

    hasSearchInputsWithoutValue: {
        type: Boolean,
        required: true,
    },

    onAdd: {
        type: Function,
        required: true,
    },
});

const dropdown = ref(null)

function enableSearch(key) {
    props.onAdd(key);
    dropdown.value.hide()
}
</script>
