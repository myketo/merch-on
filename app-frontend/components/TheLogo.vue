<template>
  <NuxtLink to="/" class="flex items-center gap-3">
    <span class="sr-only">{{ appConfig.title }}</span>
    <img
      class="h-8 w-auto border-r-2 pr-4 border-gray-200"
      src="/gfx/kot.png"
      alt="" />
    <p class="font-medium tracking-wide text-xl text-slate-800">
      Merch<span class="text-orange-400 font-bold tracking-wider">ON</span>
    </p>
  </NuxtLink>
</template>

<script setup>
const appConfig = useAppConfig();
</script>
