import { useCartStore } from "~/store/cart";

export default defineNuxtRouteMiddleware(() => {
  const cartStore = useCartStore();

  cartStore.cartTabOpen = false;
});
