import { defineStore } from "pinia";

export const useUiStore = defineStore({
  id: "uiStore",
  state: () => ({
    categoryTree: [],
  }),
  actions: {},
  getters: {},
  persist: true,
  // persist: {
  //   storage: persistedState.localStorage, // sessionStorage
  // },
});
