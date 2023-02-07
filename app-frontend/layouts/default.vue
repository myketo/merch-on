<template>
  <div id="app" class="bg-white">
    <TheNavigation></TheNavigation>
    <TheCart></TheCart>

    <slot></slot>

    <TheFooter></TheFooter>
  </div>
</template>

<script setup>
const config = useRuntimeConfig();
const appConfig = useAppConfig();

useHead({
  title: null,
});
</script>
