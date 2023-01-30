<template>
  <div class="bg-white">
    <!-- Mobile menu -->
    <TransitionRoot as="template" :show="open">
      <Dialog as="div" class="relative z-40 lg:hidden" @close="open = false">
        <TransitionChild
          as="template"
          enter="transition-opacity ease-linear duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="transition-opacity ease-linear duration-300"
          leave-from="opacity-100"
          leave-to="opacity-0">
          <div class="fixed inset-0 bg-black bg-opacity-25" />
        </TransitionChild>

        <div class="fixed inset-0 z-40 flex">
          <TransitionChild
            as="template"
            enter="transition ease-in-out duration-300 transform"
            enter-from="-translate-x-full"
            enter-to="translate-x-0"
            leave="transition ease-in-out duration-300 transform"
            leave-from="translate-x-0"
            leave-to="-translate-x-full">
            <DialogPanel
              class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
              <div class="flex px-4 pt-5 pb-2">
                <button
                  type="button"
                  class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400"
                  @click="open = false">
                  <span class="sr-only">Close menu</span>
                  <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                </button>
              </div>

              <!-- Links -->
              <TabGroup as="div" class="mt-2">
                <div class="border-b border-gray-200">
                  <TabList class="-mb-px flex space-x-8 px-4">
                    <Tab
                      v-for="mainCategory in navigation.categoryTree"
                      :key="mainCategory.id"
                      v-slot="{ selected }"
                      as="template">
                      <button
                        :class="[
                          selected
                            ? 'text-indigo-600 border-indigo-600'
                            : 'text-gray-900 border-transparent',
                          'flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium',
                        ]">
                        {{ mainCategory.name }}
                      </button>
                    </Tab>
                  </TabList>
                </div>
                <TabPanels as="template">
                  <TabPanel
                    v-for="mainCategory in navigation.categoryTree"
                    :key="mainCategory.name"
                    class="space-y-10 px-4 pt-10 pb-8">
                    <div class="grid grid-cols-2 gap-x-4">
                      <div
                        v-for="featuredCategory in mainCategory.featured"
                        :key="featuredCategory.name"
                        class="group relative text-sm">
                        <div
                          class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                          <img
                            :src="featuredCategory.imageSrc"
                            :alt="featuredCategory.imageAlt"
                            class="object-cover object-center" />
                        </div>
                        <a
                          :href="featuredCategory.href"
                          class="mt-6 block font-medium text-gray-900">
                          <span
                            class="absolute inset-0 z-10"
                            aria-hidden="true" />
                          {{ featuredCategory.name }}
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                      </div>
                    </div>
                    <div
                      v-for="category in mainCategory.categories"
                      :key="category.name">
                      <p
                        :id="`${mainCategory.id}-${category.id}-heading-mobile`"
                        class="font-medium text-gray-900">
                        {{ category.name }}
                      </p>
                      <ul
                        role="list"
                        :aria-labelledby="`${mainCategory.id}-${category.id}-heading-mobile`"
                        class="mt-6 flex flex-col space-y-6">
                        <li
                          v-for="subCategory in category.subcategories"
                          :key="subCategory.name"
                          class="flow-root">
                          <a
                            :href="`category/${subCategory.id}`"
                            class="-m-2 block p-2 text-gray-500"
                            >{{ subCategory.name }}</a
                          >
                        </li>
                      </ul>
                    </div>
                  </TabPanel>
                </TabPanels>
              </TabGroup>

              <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                <div
                  v-for="page in navigation.pages"
                  :key="page.name"
                  class="flow-root">
                  <a
                    :href="page.href"
                    class="-m-2 block p-2 font-medium text-gray-900"
                    >{{ page.name }}</a
                  >
                </div>
              </div>

              <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                <div class="flow-root">
                  <a href="#" class="-m-2 block p-2 font-medium text-gray-900"
                    >Sign in</a
                  >
                </div>
                <div class="flow-root">
                  <a href="#" class="-m-2 block p-2 font-medium text-gray-900"
                    >Create account</a
                  >
                </div>
              </div>

              <!--              <div class="border-t border-gray-200 py-6 px-4">-->
              <!--                <a href="#" class="-m-2 flex items-center p-2">-->
              <!--                  <img-->
              <!--                    src="https://tailwindui.com/img/flags/flag-canada.svg"-->
              <!--                    alt=""-->
              <!--                    class="block h-auto w-5 flex-shrink-0" />-->
              <!--                  <span class="ml-3 block text-base font-medium text-gray-900"-->
              <!--                    >CAD</span-->
              <!--                  >-->
              <!--                  <span class="sr-only">, change currency</span>-->
              <!--                </a>-->
              <!--              </div>-->
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>

    <header class="relative bg-white">
      <p
        class="flex h-8 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
        Get free delivery on orders over $100
      </p>

      <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
          <div class="flex h-16 items-center">
            <button
              type="button"
              class="rounded-md bg-white p-2 text-gray-400 lg:hidden"
              @click="open = true">
              <span class="sr-only">Open menu</span>
              <Bars3Icon class="h-6 w-6" aria-hidden="true" />
            </button>

            <!-- Logo -->
            <div class="ml-4 flex lg:ml-0">
              <a href="#">
                <span class="sr-only">{{ appConfig.title }}</span>
                <img class="h-8 w-auto" src="/gfx/kot.png" alt="" />
              </a>
            </div>

            <!-- Flyout menus -->
            <PopoverGroup class="hidden lg:ml-8 lg:block lg:self-stretch">
              <div class="flex h-full space-x-8">
                <Popover
                  v-for="mainCategory in navigation.categoryTree"
                  :key="mainCategory.name"
                  v-slot="{ open }"
                  class="flex">
                  <div class="relative flex">
                    <PopoverButton
                      :class="[
                        open
                          ? 'border-indigo-600 text-indigo-600'
                          : 'border-transparent text-gray-700 hover:text-gray-800',
                        'relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out',
                      ]"
                      >{{ mainCategory.name }}
                    </PopoverButton>
                  </div>

                  <transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="transition ease-in duration-150"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0">
                    <PopoverPanel
                      class="absolute inset-x-0 top-full text-sm text-gray-500">
                      <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                      <div
                        class="absolute inset-0 top-1/2 bg-white shadow"
                        aria-hidden="true" />

                      <div class="relative bg-white">
                        <div class="mx-auto max-w-7xl px-8">
                          <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                            <div class="col-start-2 grid grid-cols-2 gap-x-8">
                              <div
                                v-for="featuredCategory in mainCategory.featured"
                                :key="featuredCategory.name"
                                class="group relative text-base sm:text-sm">
                                <div
                                  class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                  <img
                                    :src="featuredCategory.imageSrc"
                                    :alt="featuredCategory.imageAlt"
                                    class="object-cover object-center" />
                                </div>
                                <a
                                  :href="featuredCategory.href"
                                  class="mt-6 block font-medium text-gray-900">
                                  <span
                                    class="absolute inset-0 z-10"
                                    aria-hidden="true" />
                                  {{ featuredCategory.name }}
                                </a>
                                <p aria-hidden="true" class="mt-1">Shop now</p>
                              </div>
                            </div>
                            <div
                              class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                              <div
                                v-for="category in mainCategory.categories"
                                :key="category.name">
                                <RouterLink
                                  :id="`${category.name}-heading`"
                                  :to="`/category/${mainCategory.id}`"
                                  class="font-medium text-gray-900">
                                  {{ category.name }}
                                </RouterLink>
                                <ul
                                  role="list"
                                  :aria-labelledby="`${category.name}-heading`"
                                  class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                  <li
                                    v-for="subCategory in category.subcategories"
                                    :key="subCategory.name"
                                    class="flex">
                                    <a
                                      :href="`category/${subCategory.id}`"
                                      class="hover:text-gray-800"
                                      >{{ subCategory.name }}</a
                                    >
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </PopoverPanel>
                  </transition>
                </Popover>

                <div class="flex items-center">
                  <span class="h-6 w-px bg-gray-200" aria-hidden="true" />
                </div>

                <a
                  v-for="page in navigation.pages"
                  :key="page.name"
                  :href="page.href"
                  class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                  >{{ page.name }}</a
                >
              </div>
            </PopoverGroup>

            <div class="ml-auto flex items-center">
              <div
                class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                <a
                  href="#"
                  class="text-sm font-medium text-gray-700 hover:text-gray-800"
                  >Sign in</a
                >
                <span class="h-6 w-px bg-gray-200" aria-hidden="true" />
                <a
                  href="#"
                  class="text-sm font-medium text-gray-700 hover:text-gray-800"
                  >Create account</a
                >
              </div>

              <!--              <div class="hidden lg:ml-8 lg:flex">-->
              <!--                <a-->
              <!--                  href="#"-->
              <!--                  class="flex items-center text-gray-700 hover:text-gray-800">-->
              <!--                  <img-->
              <!--                    src="https://tailwindui.com/img/flags/flag-canada.svg"-->
              <!--                    alt=""-->
              <!--                    class="block h-auto w-5 flex-shrink-0" />-->
              <!--                  <span class="ml-3 block text-sm font-medium">CAD</span>-->
              <!--                  <span class="sr-only">, change currency</span>-->
              <!--                </a>-->
              <!--              </div>-->

              <!-- Search -->
              <div class="flex lg:ml-6">
                <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Search</span>
                  <MagnifyingGlassIcon class="h-6 w-6" aria-hidden="true" />
                </a>
              </div>

              <!-- Cart -->
              <div class="ml-4 flow-root lg:ml-6">
                <a href="#" class="group -m-2 flex items-center p-2">
                  <ShoppingBagIcon
                    class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                    aria-hidden="true" />
                  <span
                    class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800"
                    >0</span
                  >
                  <span class="sr-only">items in cart, view bag</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </div>
</template>

<script setup>
import {
  Dialog,
  DialogPanel,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import {
  Bars3Icon,
  MagnifyingGlassIcon,
  ShoppingBagIcon,
  XMarkIcon,
} from "@heroicons/vue/24/outline";

const appConfig = useAppConfig();

const open = ref(false);

const navigation = ref({
  categoryTree: [],
  pages: [
    { name: "Company", href: "#" },
    { name: "Stores", href: "#" },
  ],
});

onMounted(() => {
  loadCategoryTree();
});

const loadCategoryTree = () => {
  apiFetch("/ui/categories-tree").then(function (response) {
    setCategoryTree(response.data.value);
  });
};

const setCategoryTree = (categoryTree) => {
  // categoryTree[0].featured = [
  //   {
  //     name: "New Arrivals",
  //     href: "#",
  //     imageSrc:
  //       "https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg",
  //     imageAlt:
  //       "Models sitting back to back, wearing Basic Tee in black and bone.",
  //   },
  //   {
  //     name: "Basic Tees",
  //     href: "#",
  //     imageSrc:
  //       "https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg",
  //     imageAlt:
  //       "Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.",
  //   },
  // ];

  navigation.value.categoryTree = categoryTree;
};
</script>
