<template>
  <ButtonWithDropdown
    placement="bottom-end"
    dusk="filters-dropdown"
    :active="hasEnabledFilters"
  >
    <template #button>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
        </svg>
    </template>

    <div
      role="menu"
      aria-orientation="horizontal"
      aria-labelledby="filter-menu"
    >
        <label
            v-for="(filter, key) in filters"
            :key="key"
            class="dropdown-item">
            <span class="me-3">{{ filter.label }}</span>
            <select
                v-if="filter.type === 'select'"
                :name="filter.key"
                :value="filter.value"
                class="form-select form-select-sm"
                @change="onFilterChange(filter.key, $event.target.value)"
            >
                <option
                    v-for="(option, optionKey) in filter.options"
                    :key="optionKey"
                    :value="optionKey"
                >
                    {{ option }}
                </option>
            </select>
        </label>
    </div>
  </ButtonWithDropdown>
</template>

<script setup>
import ButtonWithDropdown from "./ButtonWithDropdown.vue";

defineProps({
    hasEnabledFilters: {
        type: Boolean,
        required: true,
    },

    filters: {
        type: Object,
        required: true,
    },

    onFilterChange: {
        type: Function,
        required: true,
    },
});
</script>

