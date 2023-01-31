<template>
  <div
    class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
      <NuxtLink
        :event="data.current_page === 1 ? '' : 'click'"
        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
        @click.prevent="changePage(-1)"
        >Previous</NuxtLink
      >
      <NuxtLink
        :event="data.current_page === data.total_pages ? '' : 'click'"
        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
        @click.prevent="changePage(1)"
        >Next</NuxtLink
      >
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          {{ " " }}
          <span class="font-medium">{{ data.from }}</span>
          {{ " " }}
          to
          {{ " " }}
          <span class="font-medium">{{ data.to }}</span>
          {{ " " }}
          of
          {{ " " }}
          <span class="font-medium">{{ data.total }}</span>
          {{ " " }}
          results
        </p>
      </div>
      <div>
        <nav
          class="isolate inline-flex -space-x-px rounded-md shadow-sm"
          aria-label="Pagination">
          <NuxtLink
            :event="data.current_page === 1 ? '' : 'click'"
            class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
            @click.prevent="changePage(-1)">
            <span class="sr-only">Previous</span>
            <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
          </NuxtLink>
          <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
          <a
            v-show="data.current_page > 1"
            href="#"
            class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
            @click.prevent="changePage(-1)"
            >{{ data.current_page - 1 }}</a
          >
          <a
            href="#"
            aria-current="page"
            class="relative z-10 inline-flex items-center border border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20"
            @click.prevent="changePage()"
            >{{ data.current_page }}</a
          >
          <a
            v-show="data.current_page < data.total_pages"
            href="#"
            class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex"
            @click.prevent="changePage(1)"
            >{{ data.current_page + 1 }}</a
          >
          <NuxtLink
            :event="data.current_page === data.total_pages ? '' : 'click'"
            class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
            @click.prevent="changePage(1)">
            <span class="sr-only">Next</span>
            <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
          </NuxtLink>
        </nav>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/20/solid";

const route = useRoute();

const props = defineProps({
  data: {
    type: [Object],
    required: true,
  },
});

const changePage = (direction = null) => {
  const pageTo = props.data.current_page + direction;

  if (
    pageTo === props.data.current_page ||
    pageTo < 1 ||
    pageTo > props.data.total_pages
  ) {
    return false;
  }

  const queryParams = {
    page: pageTo,
  };
  if (route.query.limit) {
    queryParams.limit = route.query.limit;
  }

  return navigateTo({
    path: "/" + route.params.category_id + "/products",
    query: queryParams,
  });
};
</script>
