<template>
  <div class="bg-white">
    <div
      class="grid grid-cols-1 lg:grid-cols-2 gap-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 lg:mt-5 lg:gap-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div>
        <div>
          <div>
            <div>
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Contact information
                </h3>
              </div>
            </div>

            <div class="mt-3 lg:mt-0">
              <form action="#" method="POST">
                <div class="sm:overflow-hidden sm:rounded-md">
                  <div class="space-y-6 bg-white px-4 py-5 sm:px-0">
                    <div class="col-span-6 lg:px-1">
                      <label
                        for="email-address"
                        class="block text-sm font-medium text-gray-700"
                        >Email address</label
                      >
                      <input
                        id="email-address"
                        v-model.trim="orderStore.orderData.email"
                        type="email"
                        name="email-address"
                        autocomplete="email"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        :class="{
                          'border-red-800': v$.email.$errors.length,
                        }" />
                      <!-- @change="v$.email.$touch"-->
                      <p
                        v-for="error in v$.email.$errors"
                        :key="error.$uid"
                        class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                        role="alert">
                        {{ error.$message }}
                      </p>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:px-1">
                      <label
                        for="phone-number"
                        class="block text-sm font-medium text-gray-700"
                        >Phone number</label
                      >
                      <input
                        id="phone-number"
                        v-model="orderStore.orderData.phone"
                        type="text"
                        name="phone-number"
                        autocomplete="phone"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        :class="{
                          'border-red-800': v$.phone.$errors.length,
                        }" />
                      <p
                        v-for="error in v$.phone.$errors"
                        :key="error.$uid"
                        class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                        role="alert">
                        {{ error.$message }}
                      </p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div aria-hidden="true" class="px-4 lg:px-0">
          <div class="py-5">
            <div class="border-t border-gray-200" />
          </div>
        </div>

        <div class="mt-3">
          <div>
            <div>
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Shipping information
                </h3>
              </div>
            </div>

            <div class="mt-5 lg:mt-0">
              <form action="#" method="POST">
                <div class="overflow-hidden sm:rounded-md">
                  <div class="bg-white px-4 py-5 sm:px-0">
                    <div class="grid grid-cols-6 gap-4">
                      <div class="col-span-6 sm:col-span-3 lg:pl-1">
                        <label
                          for="first-name"
                          class="block text-sm font-medium text-gray-700"
                          >First name</label
                        >
                        <input
                          id="first-name"
                          v-model.trim="orderStore.orderData.firstname"
                          type="text"
                          name="first-name"
                          autocomplete="firstname"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          :class="{
                            'border-red-800': v$.firstname.$errors.length,
                          }" />
                        <p
                          v-for="error in v$.firstname.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <div class="col-span-6 sm:col-span-3 lg:pr-1">
                        <label
                          for="last-name"
                          class="block text-sm font-medium text-gray-700"
                          >Last name</label
                        >
                        <input
                          id="last-name"
                          v-model.trim="orderStore.orderData.lastname"
                          type="text"
                          name="last-name"
                          autocomplete="lastname"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          :class="{
                            'border-red-800': v$.lastname.$errors.length,
                          }" />
                        <p
                          v-for="error in v$.lastname.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <!-- Maybe add a "Company" field? -->

                      <div class="col-span-6 lg:px-1">
                        <label
                          for="address-line-1"
                          class="block text-sm font-medium text-gray-700"
                          >Street address</label
                        >
                        <input
                          id="address-line-1"
                          v-model.trim="orderStore.orderData.address_line_1"
                          type="text"
                          name="address-line-1"
                          autocomplete="address-line-1"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          :class="{
                            'border-red-800': v$.address_line_1.$errors.length,
                          }" />
                        <p
                          v-for="error in v$.address_line_1.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <div class="col-span-6 lg:px-1">
                        <label
                          for="address-line-2"
                          class="block text-sm font-medium text-gray-700"
                          >Apartment, suite, etc.</label
                        >
                        <input
                          id="address-line-2"
                          v-model.trim="orderStore.orderData.address_line_2"
                          type="text"
                          name="address-line-2"
                          autocomplete="address-line-2"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          :class="{
                            'border-red-800': v$.address_line_2.$errors.length,
                          }" />
                        <p
                          v-for="error in v$.address_line_2.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <div class="col-span-6 sm:col-span-3 lg:pl-1">
                        <label
                          for="city"
                          class="block text-sm font-medium text-gray-700"
                          >City</label
                        >
                        <input
                          id="city"
                          v-model.trim="orderStore.orderData.city"
                          type="text"
                          name="city"
                          autocomplete="city"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          :class="{
                            'border-red-800': v$.city.$errors.length,
                          }" />
                        <p
                          v-for="error in v$.city.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <div class="col-span-6 sm:col-span-3 lg:pr-1">
                        <label
                          for="postal-code"
                          class="block text-sm font-medium text-gray-700"
                          >ZIP / Postal code</label
                        >
                        <input
                          id="postal-code"
                          v-model.trim="orderStore.orderData.postal_code"
                          type="text"
                          name="postal-code"
                          autocomplete="postal-code"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          :class="{
                            'border-red-800': v$.postal_code.$errors.length,
                          }" />
                        <p
                          v-for="error in v$.postal_code.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <div class="col-span-6 lg:px-1">
                        <label
                          for="country"
                          class="block text-sm font-medium text-gray-700"
                          >Country</label
                        >
                        <select
                          id="country"
                          v-model="orderStore.orderData.country"
                          name="country"
                          autocomplete="country"
                          disabled
                          :class="{
                            'border-red-800': v$.country.$errors.length,
                          }"
                          class="bg-slate-100 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                          <option selected value="Poland">Poland</option>
                        </select>
                        <p
                          v-for="error in v$.country.$errors"
                          :key="error.$uid"
                          class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                          role="alert">
                          {{ error.$message }}
                        </p>
                      </div>

                      <!--                      <div class="col-span-6 sm:col-span-3">-->
                      <!--                        <label-->
                      <!--                          for="region"-->
                      <!--                          class="block text-sm font-medium text-gray-700"-->
                      <!--                          >State / Province</label-->
                      <!--                        >-->
                      <!--                        <input-->
                      <!--                          id="region"-->
                      <!--                          type="text"-->
                      <!--                          name="region"-->
                      <!--                          autocomplete="address-level1"-->
                      <!--                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />-->
                      <!--                      </div>-->
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div aria-hidden="true" class="px-4 lg:px-0">
          <div class="py-5">
            <div class="border-t border-gray-200" />
          </div>
        </div>

        <div class="mt-5">
          <div>
            <div>
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Delivery method
                </h3>
              </div>
            </div>

            <div>
              <form action="#" method="POST">
                <div class="overflow-hidden sm:rounded-md">
                  <div class="bg-white px-4 py-5 lg:py-4 sm:px-0">
                    <div>
                      <fieldset>
                        <div
                          class="lg:px-1 mt-4 lg:mt-0 space-y-5 lg:space-y-0 flex flex-wrap justify-between items-center flex-col lg:flex-row">
                          <div
                            v-for="(
                              deliveryMethod, index
                            ) in orderStore.deliveryMethods"
                            :key="deliveryMethod.id"
                            class="w-full lg:w-auto lg:basis-1/2 lg:p-0"
                            :class="index % 2 === 0 ? 'lg:pr-4' : 'lg:pl:4'">
                            <input
                              :id="`delivery-${deliveryMethod.id}`"
                              v-model="orderStore.orderData.delivery_id"
                              name="deliveryMethod"
                              :value="deliveryMethod.id"
                              type="radio"
                              class="hidden" />
                            <label
                              :for="`delivery-${deliveryMethod.id}`"
                              tabindex="0"
                              class="cursor-pointer p-3 block text-sm rounded-lg border-2"
                              :class="
                                deliveryMethod.id ===
                                orderStore.orderData.delivery_id
                                  ? 'border-indigo-600'
                                  : 'border-gray-300'
                              ">
                              <div class="flex justify-between">
                                <p class="font-medium">
                                  {{ deliveryMethod.name }}
                                </p>

                                <svg
                                  v-if="
                                    deliveryMethod.id ===
                                    orderStore.orderData.delivery_id
                                  "
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 20 20"
                                  fill="currentColor"
                                  class="w-5 h-5 text-indigo-600">
                                  <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                                </svg>
                              </div>
                              <p class="text-gray-500">
                                {{ deliveryMethod.description }}
                              </p>
                              <p class="mt-5 font-medium">
                                ${{ deliveryMethod.price }}
                              </p>
                            </label>
                          </div>
                          <p
                            v-for="error in v$.delivery_id.$errors"
                            :key="error.$uid"
                            class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                            role="alert">
                            {{ error.$message }}
                          </p>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div aria-hidden="true" class="px-4 lg:px-0">
          <div class="py-5">
            <div class="border-t border-gray-200" />
          </div>
        </div>

        <div class="mt-5 sm:my-5">
          <div>
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Payment
                </h3>
              </div>
            </div>

            <div class="mt-3">
              <form action="#" method="POST">
                <div class="overflow-hidden sm:rounded-md">
                  <div class="space-y-6 bg-white px-4 py-3 sm:px-1">
                    <fieldset>
                      <div class="space-y-4 lg:space-y-0 lg:flex lg:gap-10">
                        <div
                          v-for="paymentMethod in orderStore.paymentMethods"
                          :key="paymentMethod.id"
                          class="flex items-center">
                          <input
                            :id="`payment-${paymentMethod.id}`"
                            v-model="orderStore.orderData.payment_id"
                            name="paymentMethod"
                            :value="paymentMethod.id"
                            type="radio"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                          <label
                            :for="`payment-${paymentMethod.id}`"
                            class="ml-3 block text-sm font-medium text-gray-700"
                            >{{ paymentMethod.name }}</label
                          >
                        </div>
                      </div>
                      <p
                        v-for="error in v$.payment_id.$errors"
                        :key="error.$uid"
                        class="p-2 pl-0 mb-4 text-sm text-red-800 rounded-lg"
                        role="alert">
                        {{ error.$message }}
                      </p>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="mt-8 sm:mt-0">
          <div>
            <div>
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Order summary
                </h3>
              </div>
            </div>
            <div class="shadow mt-5 mx-4 sm:mx-0">
              <div class="flow-root bg-white px-4 py-5">
                <div v-if="!cartStore.products.length">
                  No products in cart!
                </div>

                <TransitionGroup
                  v-else
                  name="cart-product-list"
                  tag="ul"
                  role="list"
                  class="-my-6 divide-y divide-gray-200 overflow-x-hidden">
                  <li
                    v-for="product in cartStore.products"
                    :key="product.size.id"
                    class="flex py-6 lg:px-1">
                    <div
                      class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                      <img
                        :src="product.mainImage.src"
                        :alt="product.mainImage.alt"
                        class="h-full w-full object-cover object-center" />
                    </div>
                    <div class="ml-4 flex flex-1 flex-col">
                      <div>
                        <div
                          class="flex justify-between text-sm font-medium text-gray-900">
                          <h3>
                            <NuxtLink :to="`/1/product/${product.id}`">{{
                              product.name
                            }}</NuxtLink>
                          </h3>
                          <p class="ml-4">
                            ${{ product.price * product.amount }}
                          </p>
                        </div>
                        <!--                                <p class="mt-1 text-sm text-gray-500">-->
                        <!--                                  {{ product.color }}-->
                        <!--                                </p>-->
                      </div>
                      <p class="my-2 lg:mt-1 lg:mb-0 text-sm text-gray-500">
                        Size: {{ product.size.name }}
                      </p>
                      <div
                        class="flex flex-1 items-end justify-between text-sm">
                        <p class="text-gray-500">
                          Amount: {{ product.amount }}
                        </p>

                        <div class="flex">
                          <button
                            type="button"
                            class="font-medium text-indigo-600 hover:text-indigo-500"
                            @click="cartStore.removeProduct(product)">
                            Remove
                          </button>
                        </div>
                      </div>
                    </div>
                  </li>
                </TransitionGroup>
              </div>

              <div class="border-t border-gray-200 py-6 px-4">
                <div class="space-y-3 mb-5">
                  <div class="flex justify-between text-sm text-gray-900">
                    <p>Subtotal</p>
                    <p class="font-medium">${{ cartStore.subtotalValue }}</p>
                  </div>
                  <div class="flex justify-between text-sm text-gray-900">
                    <p>Shipping</p>
                    <p class="font-medium">${{ orderStore.deliveryCost }}</p>
                  </div>
                </div>
                <div
                  class="flex justify-between text-lg font-bold text-gray-900">
                  <p>Total</p>
                  <p>${{ orderStore.totalValue }}</p>
                </div>
                <div class="mt-6">
                  <button
                    class="w-full rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700"
                    @click="createOrder()">
                    {{ processing ? "Processing..." : "Confirm Order" }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useCartStore } from "~/store/cart";
import { useOrderStore } from "~/store/order";
import { useVuelidate } from "@vuelidate/core";
import {
  email,
  required,
  numeric,
  maxLength,
  minLength,
  or,
} from "@vuelidate/validators";

const cartStore = useCartStore();
const orderStore = useOrderStore();

onMounted(() => {
  orderStore.setDeliveryMethods();
  orderStore.setPaymentMethods();
});

const formRules = computed(() => ({
  email: { required, email, maxLength: maxLength(50) },
  phone: { minLength: minLength(9), maxLength: maxLength(15) },
  firstname: { required, maxLength: maxLength(50) },
  lastname: { required, maxLength: maxLength(50) },
  address_line_1: { required, maxLength: maxLength(50) },
  address_line_2: { maxLength: maxLength(50) },
  city: { required, maxLength: maxLength(50) },
  postal_code: { required, maxLength: maxLength(15) },
  country: { required, maxLength: maxLength(50) },
  delivery_id: { required, maxLength: maxLength(3), numeric },
  payment_id: { required, maxLength: maxLength(3), numeric },
}));

const v$ = useVuelidate(formRules, orderStore.orderData);

const processing = ref(false);

const createOrder = async () => {
  if (processing.value || !cartStore.products.length) {
    return null;
  }

  const isFormCorrect = await v$.value.$validate();
  if (!isFormCorrect) {
    return null;
  }

  processing.value = true;

  const order = orderStore.orderData;
  order.total = orderStore.totalValue;
  order.delivery_cost = orderStore.deliveryCost;

  let orderProducts = cartStore.products;
  orderProducts = orderProducts.map((orderProduct) => {
    const newOrderProduct = {
      product_sku_id: orderProduct.size.id,
      amount: orderProduct.amount,
      price: orderProduct.price,
    };
    if ("discount" in orderProduct) {
      newOrderProduct.discount = orderProduct.discount;
    }

    return newOrderProduct;
  });

  const requestBody = {
    order: order,
    order_products: orderProducts,
  };

  apiFetch("/order/create", {
    method: "POST",
    body: requestBody,
  }).then(function (response) {
    processing.value = false;

    if (!response.data.value.success) {
      return navigateTo({
        path: "/order/failed",
      });
    }

    cartStore.reset();
    orderStore.reset();

    return navigateTo({
      path: "/order/success",
      query: {
        oid: response.data.value.orderCode,
      },
    });
  });
};
</script>
