<script>
import StyleClass from 'primevue/styleclass';
import BadgeDirective from 'primevue/badgedirective';

export default {
    directives: {
        "styleclass": StyleClass,
        "badge": BadgeDirective,
    },
}
</script>

<script setup>
import GuestLayout from '@/Layouts/Main.vue'
import { Head } from '@inertiajs/inertia-vue3'
import { usePrimeVue } from "primevue/config";
import {authUserStore} from "@/Stores/authUserStore";
import TopNavBar from "@/Layouts/Partials/TopNavBar.vue";
import UserMenu from "@/Layouts/Partials/UserMenu.vue";

let auth = authUserStore();

const props = defineProps({
    products: Array
})

const $primevue = usePrimeVue();
defineExpose({
    $primevue
})
</script>

<template>
    <GuestLayout>
        <Head title="Welcome"/>
        <div class="surface-section">
            <div class="surface-overlay shadow-2 flex relative lg:static justify-content-between" style="min-height: 42px">

                <TopNavBar/>

                <UserMenu/>
            </div>
            <div class="flex w-full lg:w-auto border-y-1 surface-border surface-overlay lg:hidden py-3 lg:py-0">
                <ul class="list-none p-0 m-0 flex w-full" style="min-height:30px;">
                    <li class="flex flex-auto lg:flex-initial justify-content-center">
                        <a v-ripple class="text-900 font-medium inline-flex align-items-center cursor-pointer lg:pr-3 text-700 hover:text-primary p-ripple">
                            <i class="pi pi-search text-xl"></i>
                            <span class="hidden">Search</span>
                        </a>
                    </li>
                    <li class="flex flex-auto lg:flex-initial justify-content-center">
                        <a v-ripple class="text-900 font-medium inline-flex align-items-center cursor-pointer lg:px-3 text-700 hover:text-primary p-ripple">
                            <i class="pi pi-heart text-xl"></i>
                            <span class="hidden">Favorites</span>
                        </a>
                    </li>
                    <li class="flex flex-auto lg:flex-initial justify-content-center">
                        <a v-ripple class="text-900 font-medium inline-flex align-items-center cursor-pointer lg:px-3 text-700 hover:text-primary p-ripple">
                            <i class="pi pi-user text-xl"></i>
                            <span class="hidden">Sign In</span>
                        </a>
                    </li>
                    <li class="flex flex-auto lg:flex-initial justify-content-center">
                        <a v-ripple class="text-900 font-medium inline-flex align-items-center cursor-pointer lg:pl-3 pr-1 text-700 hover:text-primary p-ripple">
                            <i class="pi pi-shopping-cart text-xl" v-badge></i>
                            <span class="hidden">Cart</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="surface-section px-4 py-8 md:px-6 lg:px-8">
                <div class="text-900 font-medium text-4xl mb-4">Popular Items</div>
                <div class="grid -mt-3 -ml-3 -mr-3">
                    <div v-for="product in products" :key="id" class="col-12 md:col-6 lg:col-3 mb-3 lg:mb-0">
                        <div class="p-2">
                            <div class="relative">
                                <img :src="product.media" class="w-full" />
                                <button v-tooltip.top="'Buy Now!'" type="text" v-ripple class="p-link w-3rem h-3rem surface-0 hover:surface-200 border-circle shadow-2 inline-flex align-items-center justify-content-center absolute transition-colors transition-duration-300 p-ripple" style="top: 1rem; right: 1rem">
                                    <i class="pi pi-shopping-cart text-2xl text-500"></i>
                                </button>
                            </div>
                            <div class="flex align-items-center justify-content-between mt-3 mb-2">
                                <span class="text-900 font-medium text-xl">{{ product.name }}</span>
                                <span class="text-900 text-xl ml-3">${{ product.cost }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="surface-section px-4 py-8 md:px-6 lg:px-8">
                <div class="surface-900 text-0 p-4" style="border-radius:10px">
                    <div class="flex flex-column md:flex-row md:justify-content-between xl:justify-content-evenly">
                <span class="inline-flex align-items-center mb-3 md:mb-0">
                    <i class="pi pi-shopping-cart text-base xl:text-2xl mr-3"></i>
                    <span class="text-base xl:text-2xl font-medium">Free Shipping</span>
                </span>
                        <span class="inline-flex align-items-center mb-3 md:mb-0">
                    <i class="pi pi-refresh text-base xl:text-2xl mr-3"></i>
                    <span class="text-base xl:text-2xl font-medium">120 Days Return Policy</span>
                </span>
                        <span class="inline-flex align-items-center">
                    <i class="pi pi-star text-base xl:text-2xl mr-3"></i>
                    <span class="text-base xl:text-2xl font-medium">10 Year Warranty</span>
                </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap px-4 py-8 md:px-6 lg:px-8">
                <div class="w-full md:w-6 px-4 py-8 md:px-6 lg:px-8 surface-900">
                    <div class="text-4xl text-0 mb-3 font-medium">Promo Title Placeholder</div>
                    <p class="line-height-3 mt-0 mb-7 p-0 text-0 text-2xl">Malesuada bibendum arcu vitae elementum curabitur vitae nunc. Aliquam nulla facilisi cras fermentum. Et egestas quis ipsum suspendisse ultrices.</p>
                    <a tabindex="0" v-ripple class="text-xl cursor-pointer surface-card text-900 text-center px-5 py-3 border-1 border-gray-200 hover:text-primary transition-duration-150 select-none block w-12rem p-ripple">Read Story</a>
                </div>
                <div class="w-full md:w-6 bg-no-repeat bg-cover" style="background: url('images/blocks/ecommerce/storefront/storefront-1-17.png'); min-height: 400px;"></div>
            </div>

            <div class="surface-50 px-4 py-8 md:px-6 lg:px-8">
                <span class="text-900 text-3xl font-medium block text-center lg:text-left">Get 25% Discount Today!</span>
                <span class="text-600 text-2xl block mt-4 text-center lg:text-left">Sign up our email list and know all about new collections of Peak</span>
                <div class="mt-4 mx-auto lg:mx-0" style="max-width:38rem;">
                    <div class="p-inputgroup">
                        <InputText type="text" placeholder="Enter your email address" />
                        <Button label="Subscribe" class="surface-900 text-0 px-5 border-none"></Button>
                    </div>
                </div>
                <Divider layout="horizontal" class="surface-border"></Divider>
                <div class="grid grid-nogutter text-center lg:text-left">
                    <div class="col-12 sm:col-6 md:col-4 lg:col-3 mt-4 flex flex-column align-items-center lg:align-items-start">
                        <img src="images/blocks/logos/peak-700.svg" class="w-9rem mx-auto lg:mx-0" alt="Peak logo">
                        <div class="flex align-items-center w-full mt-5 justify-content-center lg:justify-content-start">
                            <a tabindex="0" class="cursor-pointer mr-3">
                                <i class="pi pi-facebook surface-900 p-1 text-sm border-circle text-0"></i>
                            </a>
                            <a tabindex="0" class="cursor-pointer mr-3">
                                <i class="pi pi-twitter surface-900 p-1 text-sm border-circle text-0"></i>
                            </a>
                            <a tabindex="0" class="cursor-pointer mr-3">
                                <i class="pi pi-youtube surface-900 p-1 text-sm border-circle text-0"></i>
                            </a>
                            <a tabindex="0" class="cursor-pointer">
                                <i class="pi pi-google surface-900 p-1 text-sm border-circle text-0"></i>
                            </a>
                        </div>
                        <span class="text-600 block mt-4"><i class="pi pi-phone mr-2"></i>1234 / 12 34 567</span>
                        <a tabindex="0" class="text-600 block mt-4 cursor-pointer hover:text-900 transition-duration-150 select-none w-8rem"><i class="pi pi-map-marker mr-2"></i>Contact Us</a>
                    </div>
                    <div class="col-12 sm:col-6 md:col-4 lg:col-3 mt-4 flex flex-column">
                        <span class="text-900 text-xl font-medium block">Company</span>
                        <ul class="list-none p-0">
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">About Peak</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Factories</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Careers</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Environmental Initiatives</a></li>
                        </ul>
                    </div>
                    <div class="col-12 sm:col-6 md:col-4 lg:col-3 mt-4 flex flex-column">
                        <span class="text-900 text-xl font-medium block">Account</span>
                        <ul class="list-none p-0">
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Manage Account</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Saved Items</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">My Cart</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Wishlist</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Orders & Returns</a></li>
                        </ul>
                    </div>
                    <div class="col-12 sm:col-6 md:col-4 lg:col-3 mt-4 flex flex-column">
                        <span class="text-900 text-xl font-medium block">Legal</span>
                        <ul class="list-none p-0">
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Investor Relations</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Data Privacy</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Terms of Service</a></li>
                            <li><a tabindex="0" class="text-600 hover:text-900 transition-duration-150 cursor-pointer mt-3 block">Legal Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
