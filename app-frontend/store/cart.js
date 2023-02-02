import { defineStore } from "pinia";

export const useCartStore = defineStore({
  id: "cartStore",
  state: () => ({
    products: [],
    cartTabOpen: false,
  }),
  actions: {
    addProduct(newProduct) {
      // Empty carts
      if (!this.products.length) {
        this.products.push(newProduct);
        return true;
      }

      const existingProductKey = this.products.findIndex(
        (product) =>
          newProduct.id === product.id && newProduct.size.id === product.size.id
      );
      // Product not in cart
      if (existingProductKey === -1) {
        this.products.push(newProduct);
        return true;
      }

      return false;
    },
    removeProduct(productToRemove) {
      this.products = this.products.filter(
        (product) =>
          productToRemove.id !== product.id ||
          productToRemove.size.id !== product.size.id
      );
    },
    toggleTab() {
      this.cartTabOpen = !this.cartTabOpen;
    },
    remove: () => ({}),
  },
  getters: {
    productCount() {
      return this.products.reduce(function (a, b) {
        return a + b.amount;
      }, 0);
    },
    totalValue() {
      return this.products
        .reduce(function (a, b) {
          return a + b.price * b.amount;
        }, 0)
        .toFixed(2);
    },
  },
  persist: {
    // sessionStorage localStorage
    storage: persistedState.cookiesWithOptions({
      sameSite: "strict",
    }),
  },
});
