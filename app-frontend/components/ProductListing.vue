<template>
  <div class="bg-white">
    <!--    TODO: ADD BREADCRUMBS AND PAGE TITLE-->
    <div
      class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>

      <div
        class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <NuxtLink
          v-for="product in products"
          :key="product.id"
          :to="`/${route.params.category_id}/product/${product.id}`"
          class="group">
          <div
            class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
            <img
              :src="product.main_image_filename"
              :alt="product.main_image_alt"
              class="h-full w-full object-cover object-center group-hover:opacity-75" />
          </div>
          <h3 class="mt-4 text-sm text-gray-700">{{ product.name }}</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">
            ${{ product.price }}
          </p>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup>
const route = useRoute();

defineProps({
  products: {
    type: [Array],
    required: true,
  },
});
</script>
