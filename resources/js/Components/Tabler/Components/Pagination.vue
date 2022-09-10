<template>
  <div
    v-if="hasPagination"
    class=""
  >
    <div v-if="!hasData || pagination.total < 1" class="p-3 text-center text-muted">
      {{ translations.no_results_found }}
    </div>
      <div v-if="hasData" class="border-top p-3" style="background-color: #fafbfc!important;">
          <!-- simple and mobile -->
          <ul
              v-if="hasData"
              class="d-flex justify-content-between pagination m-0"
              :class="{'d-sm-none': hasLinks}"
          >
              <li class="page-item"
                  :class="{
                  'disabled': !previousPageUrl,
                  '': previousPageUrl
                }">
                  <component
                      :is="previousPageUrl ? 'a' : 'div'"
                      :href="previousPageUrl"
                      :dusk="previousPageUrl ? 'pagination-simple-previous' : null"
                      class="page-link"
                      @click.prevent="onClick(previousPageUrl)"
                  >
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                           width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                           stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <polyline points="15 6 9 12 15 18"></polyline>
                      </svg>
                      <span class="hidden sm:inline ml-2">{{ translations.previous }}</span>
                  </component>
              </li>
              <PerPageSelector
                  dusk="per-page-mobile"
                  class="form-select-sm"
                  :value="perPage"
                  :options="perPageOptions"
                  :on-change="onPerPageChange"
              />

              <li class="page-item"
                  :class="{
                  'disabled': !nextPageUrl,
                  '': nextPageUrl
                }">
                  <component
                      :is="nextPageUrl ? 'a' : 'div'"
                      :href="nextPageUrl"
                      :dusk="nextPageUrl ? 'pagination-simple-next' : null"
                      class="page-link"
                      @click.prevent="onClick(nextPageUrl)"
                  >
                      <span class="hidden sm:inline mr-2">{{ translations.next }}</span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                           width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                           stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <polyline points="9 6 15 12 9 18"></polyline>
                      </svg>
                  </component>
              </li>
          </ul>

          <!-- full pagination -->
          <div
              v-if="hasData && hasLinks"
              class="d-none d-sm-flex align-items-center justify-content-between"
          >
              <div class="d-flex align-items-center">
                  <div class="me-2">
                      <PerPageSelector
                          dusk="per-page-full"
                          class="form-select-sm"
                          :value="perPage"
                          :options="perPageOptions"
                          :on-change="onPerPageChange"
                      />
                  </div>
                  <div class="d-inline">
                      <p class="m-0 text-muted">
                          <span class="font-medium">{{ pagination.total }}</span>
                          kayıttan
                          <span class="font-medium">{{ pagination.from }}</span>
                          -
                          <span class="font-medium">{{ pagination.to }}</span>
                          kayıt görüntüleniyor.
                      </p>
                  </div>
              </div>
              <div class="">
                  <ul
                      class="pagination mb-0"
                      aria-label="Pagination"
                  >
                      <li class="page-item me-1"
                          :class="{
                  'disabled': !previousPageUrl,
                  '': previousPageUrl
                }">
                          <component
                              :is="previousPageUrl ? 'a' : 'div'"
                              :href="previousPageUrl"
                              :dusk="previousPageUrl ? 'pagination-previous' : null"
                              class="page-link"
                              @click.prevent="onClick(previousPageUrl)"
                          >
                              <span class="sr-only">{{ translations.previous }}</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                   fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <polyline points="15 6 9 12 15 18"></polyline>
                              </svg>
                          </component>
                      </li>

                      <li class="page-item me-1"
                          :class="{
                  'active': link.active,
                }"
                          v-for="(link, key) in pagination.links"
                          :key="key"
                      >
                          <slot name="link">
                              <component
                                  :is="link.url ? 'a' : 'div'"
                                  v-if="
                      !isNaN(link.label) || link.label === '...'
                    "
                                  :href="link.url"
                                  :dusk="link.url ? `pagination-${link.label}` : null"
                                  class="page-link"
                                  @click.prevent="onClick(link.url)"
                              >
                                  {{ link.label }}
                              </component>
                          </slot>
                      </li>
                      <li class="page-item me-1"
                          :class="{
                  'disabled': !nextPageUrl,
                  '': nextPageUrl
                }">
                          <component
                              :is="nextPageUrl ? 'a' : 'div'"
                              :href="nextPageUrl"
                              :dusk="nextPageUrl ? 'pagination-next' : null"
                              class="page-link"
                              @click.prevent="onClick(nextPageUrl)"
                          >
                              <span class="sr-only">{{ translations.next }}</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                   fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <polyline points="9 6 15 12 9 18"></polyline>
                              </svg>
                          </component>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</template>

<script setup>
import PerPageSelector from "./PerPageSelector.vue"
import { computed } from "vue";
import { getTranslations } from "../translations.js"

const translations = getTranslations();

const props = defineProps({
    onClick: {
        type: Function,
        required: false,
    },
    perPageOptions: {
        type: Array,
        default() {
            return () => [15, 30, 50, 100]
        },
        required: false
    },
    onPerPageChange: {
        type: Function,
        default() {
            return () => {}
        },
        required: false,
    },
    hasData: {
        type: Boolean,
        required: true,
    },
    meta: {
        type: Object,
        required: false,
    }
});

const hasLinks = computed(() => {
    if(!("links" in pagination.value)) {
        return false;
    }

    return pagination.value.links.length > 0;
});

const hasPagination = computed(() => {
    return Object.keys(pagination.value).length > 0;
});

const pagination = computed(() => {
    return props.meta;
});

const previousPageUrl = computed(() => {
    if ("prev_page_url" in pagination.value) {
        return pagination.value.prev_page_url;
    }

    return null;
});

const nextPageUrl = computed(() => {
    if ("next_page_url" in pagination.value) {
        return pagination.value.next_page_url;
    }

    return null;
});

const perPage = computed(() => {
    return parseInt(pagination.value.per_page)
})
</script>
