import { defineStore } from "pinia";

export const useCartStore = defineStore({
  id: "cartStore",
  state: () => ({
    products: [],
  }),
  actions: {
    add(newProduct) {
      // Empty carts
      if (!this.products.length) {
        this.products.push(newProduct);
        return true;
      }

      const existingProductKey = this.products.findIndex(
        (product) => newProduct.id === product.id
      );
      // Product not in cart
      if (existingProductKey === undefined) {
        this.products.push(newProduct);
        return true;
      }

      const sizeExists = this.products[existingProductKey].sizes.find(
        (size) => newProduct.sizes[0].id === size.id
      );
      // Size not in cart
      if (sizeExists === undefined) {
        this.products[existingProductKey].sizes.push(newProduct.sizes[0]);
        return true;
      }

      return false;
    },
    remove: () => ({}),
  },
  getters: {
    count: () => ({}),
    totalValue: () => ({}),
  },
  persist: true,
  // persist: {
  //   storage: persistedState.localStorage, // sessionStorage
  // },
});
