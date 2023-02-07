import { defineStore } from "pinia";
import { useCartStore } from "~/store/cart";

export const useOrderStore = defineStore({
  id: "orderStore",
  state: () => ({
    deliveryMethods: [],
    paymentMethods: [],
    orderData: reactive({
      email: "",
      phone: "",
      firstname: "",
      lastname: "",
      address_line_1: "",
      address_line_2: "",
      city: "",
      postal_code: "",
      country: "Poland",
      delivery_id: null,
      payment_id: null,
    }),
  }),
  actions: {
    async setDeliveryMethods() {
      if (!this.deliveryMethods.length) {
        this.deliveryMethods = await apiFetch(`/delivery-methods`).then(
          function (response) {
            return response.data.value;
          }
        );
      }
    },

    async setPaymentMethods() {
      if (!this.paymentMethods.length) {
        this.paymentMethods = await apiFetch(`/payment-methods`).then(function (
          response
        ) {
          return response.data.value;
        });
      }
    },

    reset() {
      this.orderData = reactive({
        email: "",
        phone: "",
        firstname: "",
        lastname: "",
        address_line_1: "",
        address_line_2: "",
        city: "",
        postal_code: "",
        country: "Poland",
        delivery_id: null,
        payment_id: null,
      });
    },
  },
  getters: {
    deliveryCost() {
      const selectedDelivery = this.deliveryMethods.find((deliveryMethod) => {
        return deliveryMethod.id === this.orderData.delivery_id;
      });

      if (!selectedDelivery) {
        return 0.0;
      }

      return parseFloat(selectedDelivery.price).toFixed(2);
    },
    totalValue() {
      return (
        parseFloat(useCartStore().subtotalValue) + parseFloat(this.deliveryCost)
      ).toFixed(2);
    },
  },
  persist: {
    // sessionStorage localStorage
    storage: persistedState.cookiesWithOptions({
      sameSite: "strict",
    }),
  },
});
