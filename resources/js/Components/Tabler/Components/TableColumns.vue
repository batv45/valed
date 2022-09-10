<template>
  <ButtonWithDropdown
    placement="bottom-end"
    dusk="columns-dropdown"
    :active="hasHiddenColumns"
  >
    <template #button>
        <svg xmlns="http://www.w3.org/2000/svg"
             :class="{'text-primary':hasHiddenColumns}"
             class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="2"></circle>
            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
        </svg>
    </template>

      <label v-for="(column, key) in props.columns"
             v-show="column.can_be_hidden"
             :key="key"
             class="dropdown-item">
          <input class="form-check-input m-0 me-2" type="checkbox"

                 :aria-pressed="!column.hidden"
                 :aria-labelledby="`toggle-column-${column.key}`"
                 :aria-describedby="`toggle-column-${column.key}`"
                 :dusk="`toggle-column-${column.key}`"
                 @change.prevent="onChange(column.key, column.hidden)"
                 :checked="!column.hidden"> {{ column.label }}
      </label>
  </ButtonWithDropdown>
</template>

<script setup>
import ButtonWithDropdown from "./ButtonWithDropdown.vue";

const props = defineProps({
    columns: {
        type: Object,
        required: true,
    },

    hasHiddenColumns: {
        type: Boolean,
        required: true,
    },

    onChange: {
        type: Function,
        required: true,
    },
});
</script>
