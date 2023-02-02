import { defineStore } from "pinia";

export const useUiStore = defineStore({
  id: "uiStore",
  state: () => ({
    categoryTree: [],
  }),
  actions: {},
  getters: {},
  persist: {
    // sessionStorage localStorage
    storage: persistedState.cookiesWithOptions({
      sameSite: "strict",
    }),
  },
});
