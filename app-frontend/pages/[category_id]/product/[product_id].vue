<template>
  <div class="bg-white">
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol
          role="list"
          class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <li
            v-for="breadcrumb in productData.breadcrumbs"
            :key="breadcrumb.id">
            <div class="flex items-center">
              <NuxtLink
                :to="`/${breadcrumb.id}/products`"
                class="mr-2 text-sm font-medium text-gray-900"
                >{{ breadcrumb.name }}</NuxtLink
              >
              <svg
                width="16"
                height="20"
                viewBox="0 0 16 20"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>
          <li class="text-sm">
            <p class="font-medium text-gray-500 hover:text-gray-600">
              {{ productData.name }}
            </p>
          </li>
        </ol>
      </nav>

      <!-- Image gallery -->
      <div
        class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
        <div
          v-for="image in productData.images"
          :key="image.src"
          :class="
            image.is_main
              ? 'aspect-w-4 aspect-h-5 sm:overflow-hidden sm:rounded-lg lg:aspect-w-3 lg:aspect-h-4'
              : 'aspect-w-3 aspect-h-4 hidden overflow-hidden rounded-lg lg:block'
          ">
          <img
            :src="image.src"
            :alt="image.alt"
            class="h-full w-full object-cover object-center" />
        </div>
      </div>

      <!-- Product info -->
      <div
        class="mx-auto max-w-2xl px-4 pt-1 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8"></div>

        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0">
          <h1
            class="text-2xl mb-2 font-bold tracking-tight text-gray-900 sm:text-3xl">
            {{ productData.name }}
          </h1>

          <h2 class="sr-only">Product information</h2>
          <p class="text-2xl tracking-tight text-gray-900">
            ${{ productData.price }}
          </p>

          <!-- Reviews -->
          <!--          <div class="mt-6">-->
          <!--            <h3 class="sr-only">Reviews</h3>-->
          <!--            <div class="flex items-center">-->
          <!--              <div class="flex items-center">-->
          <!--                <StarIcon-->
          <!--                  v-for="rating in [0, 1, 2, 3, 4]"-->
          <!--                  :key="rating"-->
          <!--                  :class="[-->
          <!--                    reviews.average > rating-->
          <!--                      ? 'text-gray-900'-->
          <!--                      : 'text-gray-200',-->
          <!--                    'h-5 w-5 flex-shrink-0',-->
          <!--                  ]"-->
          <!--                  aria-hidden="true" />-->
          <!--              </div>-->
          <!--              <p class="sr-only">{{ reviews.average }} out of 5 stars</p>-->
          <!--              <a-->
          <!--                :href="reviews.href"-->
          <!--                class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500"-->
          <!--                >{{ reviews.totalCount }} reviews</a-->
          <!--              >-->
          <!--            </div>-->
          <!--          </div>-->

          <form class="mt-10">
            <!-- Colors -->
            <!--            <div>-->
            <!--              <h3 class="text-sm font-medium text-gray-900">Color</h3>-->

            <!--              <RadioGroup v-model="selectedColor" class="mt-4">-->
            <!--                <RadioGroupLabel class="sr-only">-->
            <!--                  Choose a color-->
            <!--                </RadioGroupLabel>-->
            <!--                <div class="flex items-center space-x-3">-->
            <!--                  <RadioGroupOption-->
            <!--                    v-for="color in product.colors"-->
            <!--                    :key="color.name"-->
            <!--                    v-slot="{ active, checked }"-->
            <!--                    as="template"-->
            <!--                    :value="color">-->
            <!--                    <div-->
            <!--                      :class="[-->
            <!--                        color.selectedClass,-->
            <!--                        active && checked ? 'ring ring-offset-1' : '',-->
            <!--                        !active && checked ? 'ring-2' : '',-->
            <!--                        '-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none',-->
            <!--                      ]">-->
            <!--                      <RadioGroupLabel as="span" class="sr-only">-->
            <!--                        {{ color.name }}-->
            <!--                      </RadioGroupLabel>-->
            <!--                      <span-->
            <!--                        aria-hidden="true"-->
            <!--                        :class="[-->
            <!--                          color.class,-->
            <!--                          'h-8 w-8 border border-black border-opacity-10 rounded-full',-->
            <!--                        ]" />-->
            <!--                    </div>-->
            <!--                  </RadioGroupOption>-->
            <!--                </div>-->
            <!--              </RadioGroup>-->
            <!--            </div>-->

            <!-- Sizes -->
            <div class="mt-10 mb-3">
              <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Size</h3>
                <!--                <a-->
                <!--                  href="#"-->
                <!--                  class="text-sm font-medium text-indigo-600 hover:text-indigo-500"-->
                <!--                  >Size guide</a-->
                <!--                >-->
              </div>

              <RadioGroup v-model="selectedSize" class="mt-4">
                <RadioGroupLabel class="sr-only">
                  Choose a size
                </RadioGroupLabel>
                <div
                  class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                  <RadioGroupOption
                    v-for="sku in productData.skus"
                    :key="sku.name"
                    v-slot="{ active, checked }"
                    as="template"
                    :value="sku"
                    :disabled="!sku.active">
                    <div
                      :class="[
                        sku.active
                          ? 'bg-white shadow-sm text-gray-900 cursor-pointer'
                          : 'bg-gray-50 text-gray-200 cursor-not-allowed',
                        active ? 'ring-2 ring-indigo-500' : '',
                        'group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6',
                      ]">
                      <RadioGroupLabel as="span">{{
                        sku.name
                      }}</RadioGroupLabel>
                      <span
                        v-if="sku.active"
                        :class="[
                          active ? 'border' : 'border-2',
                          checked ? 'border-indigo-500' : 'border-transparent',
                          'pointer-events-none absolute -inset-px rounded-md',
                        ]"
                        aria-hidden="true" />
                      <span
                        v-else
                        aria-hidden="true"
                        class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                        <svg
                          class="absolute inset-0 h-full w-full stroke-2 text-gray-200"
                          viewBox="0 0 100 100"
                          preserveAspectRatio="none"
                          stroke="currentColor">
                          <line
                            x1="0"
                            y1="100"
                            x2="100"
                            y2="0"
                            vector-effect="non-scaling-stroke" />
                        </svg>
                      </span>
                    </div>
                  </RadioGroupOption>
                </div>
              </RadioGroup>
            </div>

            <!-- TODO: DON'T DELETE ALERT MESSAGE. -->
            <Transition name="add-to-cart-alert">
              <div
                v-show="success"
                id="alert-3"
                class="flex p-4 mt-7 mb-3 items-center text-green-800 rounded-lg bg-green-50"
                role="alert">
                <svg
                  aria-hidden="true"
                  class="flex-shrink-0 w-5 h-5"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Success</span>
                <div class="ml-3 text-sm font-medium">
                  {{ success }}
                </div>
                <button
                  type="button"
                  class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
                  data-dismiss-target="#alert-3"
                  aria-label="Close"
                  @click="success = null">
                  <span class="sr-only">Close</span>
                  <svg
                    aria-hidden="true"
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
            </Transition>
            <Transition name="add-to-cart-alert">
              <div
                v-show="error"
                id="alert-error"
                class="flex p-4 mt-7 mb-3 items-center text-red-800 rounded-lg bg-red-50"
                role="alert">
                <svg
                  aria-hidden="true"
                  class="flex-shrink-0 w-5 h-5"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Error</span>
                <div class="ml-3 text-sm font-medium">
                  {{ error }}
                </div>
                <button
                  type="button"
                  class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                  data-dismiss-target="#alert-error"
                  aria-label="Close"
                  @click="error = null">
                  <span class="sr-only">Close</span>
                  <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
            </Transition>

            <button
              type="submit"
              class="mt-7 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              @click.prevent="addToCart">
              Add to bag
            </button>
          </form>
        </div>

        <div
          class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-1 lg:pb-16 lg:pr-8">
          <!-- Description and details -->
          <div>
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
              <p class="text-base leading-7 text-gray-900">
                {{ productData.description }}
              </p>
            </div>
          </div>

          <!--          <div class="mt-10">-->
          <!--            <h3 class="text-sm font-medium text-gray-900">Highlights</h3>-->

          <!--            <div class="mt-4">-->
          <!--              <ul role="list" class="list-disc space-y-2 pl-4 text-sm">-->
          <!--                <li-->
          <!--                  v-for="highlight in product.highlights"-->
          <!--                  :key="highlight"-->
          <!--                  class="text-gray-400">-->
          <!--                  <span class="text-gray-600">{{ highlight }}</span>-->
          <!--                </li>-->
          <!--              </ul>-->
          <!--            </div>-->
          <!--          </div>-->

          <!--          <div class="mt-10">-->
          <!--            <h2 class="text-sm font-medium text-gray-900">Details</h2>-->

          <!--            <div class="mt-4 space-y-6">-->
          <!--              <p class="text-sm text-gray-600">{{ product.details }}</p>-->
          <!--            </div>-->
          <!--          </div>-->
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import { useCartStore } from "~/store/cart";

const route = useRoute();

const cartStore = useCartStore();
// cartStore.products = [];

const productData = ref({});
const selectedSize = ref({});

onMounted(() => {
  loadProductData();
});

const loadProductData = () => {
  apiFetch(`/products/show/${route.params.product_id}`, {
    query: {
      category_id: route.params.category_id,
    },
  }).then(function (response) {
    setProductData(response.data.value);
  });
};

const setProductData = (apiResponse) => {
  productData.value = apiResponse;
};

const error = ref(null);
const success = ref(null);

const addToCart = async () => {
  error.value = null;
  success.value = null;

  await nextTick();

  if (!selectedSize.value) {
    error.value = "Please select a size first.";
    return;
  }

  const addResult = cartStore.addProduct({
    id: productData.value.id,
    name: productData.value.name,
    price: productData.value.price,
    mainImage: productData.value.images.find((image) => image.is_main === true),
    amount: 1,
    size: {
      id: selectedSize.value.id,
      name: selectedSize.value.name,
      sku: selectedSize.value.sku,
    },
  });

  if (addResult === true) {
    success.value = "Product added to cart!";
  } else {
    error.value = "Product is already in cart.";
  }
};

// const product = {
//   colors: [
//     { name: "White", class: "bg-white", selectedClass: "ring-gray-400" },
//     { name: "Gray", class: "bg-gray-200", selectedClass: "ring-gray-400" },
//     { name: "Black", class: "bg-gray-900", selectedClass: "ring-gray-900" },
//   ],
//   highlights: [
//     "Hand cut and sewn locally",
//     "Dyed with our proprietary colors",
//     "Pre-washed & pre-shrunk",
//     "Ultra-soft 100% cotton",
//   ],
//   details:
//     'The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming "Charcoal Gray" limited release.',
// };
</script>

<style>
.add-to-cart-alert-enter-active {
  animation: add-to-cart-alert-in 0.5s;
}
.add-to-cart-alert-leave-active {
  animation: add-to-cart-alert-in 0.5s reverse;
}
@keyframes add-to-cart-alert-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}
</style>
