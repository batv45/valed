<template>
  <div
    v-for="(searchInput, key) in searchInputs"
    v-show="searchInput.value !== null || isForcedVisible(searchInput.key)"
    :key="key"
    class="px-3 py-2"
  >
    <div class="row g-2 mb-0">
      <div class="col">
          <div class="input-group">
          <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <circle cx="15" cy="15" r="4"></circle>
                  <path d="M18.5 18.5l2.5 2.5"></path>
                  <path d="M4 6h16"></path>
                  <path d="M4 12h4"></path>
                  <path d="M4 18h4"></path>
              </svg>
            <span class="ms-1">{{ searchInput.label }}</span>
          </span>
              <input
                  :id="searchInput.key"
                  :ref="skipUnwrap.el"
                  :key="searchInput.key"
                  :name="searchInput.key"
                  :value="searchInput.value"
                  :placeholder="searchInput.label"
                  type="text"
                  class="form-control"
                  autocomplete="off"
                  @input="onChange(searchInput.key, $event.target.value)"
              >
          </div>
      </div>
      <div class="col-auto">
          <button
              class="btn btn-icon"
              :dusk="`remove-search-row-${searchInput.key}`"
              @click.prevent="onRemove(searchInput.key)"
          >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
              </svg>
          </button>
      </div>
  </div>
  </div>
</template>

<script setup>
import { computed, ref, watch, nextTick } from "vue"
import find from "lodash-es/find"

const skipUnwrap = { el: ref([]) };
let el = computed(() => skipUnwrap.el.value);

const props = defineProps({
    searchInputs: {
        type: Object,
        required: true,
    },

    forcedVisibleSearchInputs: {
        type: Array,
        required: true,
    },

    onChange: {
        type: Function,
        required: true,
    },

    onRemove: {
        type: Function,
        required: true,
    },
});

function isForcedVisible(key) {
    return props.forcedVisibleSearchInputs.includes(key)
}

watch(props.forcedVisibleSearchInputs, (inputs) => {
    const latestInput = inputs.length > 0 ? inputs[inputs.length -1] : null;

    if(!latestInput) {
        return;
    }

    nextTick().then(() => {
        const inputElement = find(el.value, (el) => {
            return el.__vnode.key ===  latestInput
        })

        if(inputElement) {
            inputElement.focus();
        }
    })
}, {immediate: true})
</script>

