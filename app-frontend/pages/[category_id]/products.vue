<template>
  <div
    v-if="!products.length || !Object.keys(paginationData).length"
    class="mt-5 ml-8">
    <h1 class="text-xl">Brak produktów.</h1>
  </div>
  <div v-else>
    <ProductListing :products="products"></ProductListing>
    <ProductPagination :data="paginationData"></ProductPagination>
  </div>
</template>

<script setup>
const route = useRoute();

onMounted(() => {
  loadProducts();
});

onBeforeRouteUpdate((to, from, next) => {
  loadProducts(to.query.page, to.query.limit);
  next();
});

const products = ref([]);
const paginationData = ref({});

const loadProducts = (pageNo = undefined, itemsLimit = undefined) => {
  const params = {};
  if (pageNo || route.query.page) {
    params.page = pageNo ?? route.query.page;
  }
  if (itemsLimit || route.query.limit) {
    params.limit = itemsLimit ?? route.query.limit;
  }

  apiFetch(`/categories/${route.params.category_id}/products`, {
    params: params,
  }).then(function (response) {
    setProducts(response.data.value);
  });
};

const setProducts = (response) => {
  products.value = response.data;

  delete response.data;
  paginationData.value = response;
};
</script>
