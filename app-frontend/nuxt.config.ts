// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  // server side rendering mode
  ssr: false,

  css: ["~/assets/css/main.css"],

  modules: ["@nuxtjs/tailwindcss"],

  runtimeConfig: {
    public: {
      apiBaseUrl: process.env.API_BASE_URL,
      apiKey: process.env.API_KEY,
    },
  },

  app: {
    head: {
      title: "Merch On",
    },
  },

  // vite: {
  //   css: {
  //     preprocessorOptions: {
  //       scss: {
  //         additionalData: '@use "@/assets/_colors.scss" as *;',
  //       },
  //     },
  //   },
  // },
});
