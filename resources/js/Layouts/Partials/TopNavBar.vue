<script setup>
import {usePrimeVue} from "primevue/config";
import {authUserStore} from "@/Stores/authUserStore";
import {Link} from '@inertiajs/inertia-vue3';

const $primevue = usePrimeVue();
let auth = authUserStore();

defineExpose({
    $primevue
})
</script>

<script>
import StyleClass from 'primevue/styleclass';

export default {
    directives: {
        "styleclass": StyleClass,
    },
}
</script>

<template>
    <a v-ripple class="cursor-pointer inline-flex align-items-center px-3 lg:hidden text-700 p-ripple"
       v-styleclass="{ selector: '@next', enterClass: 'hidden', leaveToClass: 'hidden', hideOnOutsideClick: true }">
        <i class="pi pi-bars text-2xl"></i>
    </a>
  <div class="hidden lg:flex absolute lg:static w-full surface-overlay left-0 top-100 z-1 shadow-2 lg:shadow-none">
    <ul class="flex list-none p-0 m-0 flex-column lg:flex-row">
      <li class="h-full">
          <Link v-ripple href="/"
                class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple">
              <span class="pi pi-home mr-2"></span>
              <span class="font-medium">Products</span>
          </Link>
      </li>
      <li class="h-full">
          <Link v-ripple :href="route('orders.create')"
                class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple">
              <span class="pi pi-home mr-2"></span>
              <span class="font-medium">New Order</span>
          </Link>
      </li>
      <li class="h-full">
        <a v-ripple
           class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple">
          <span class="pi pi-calendar mr-2"></span>
          <span class="font-medium">Calendar</span>
        </a>
      </li>
      <li class="h-full">
          <Link v-ripple :href="route('admin.dashboard')"
                class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple">
              <span class="pi pi-home mr-2"></span>
              <span class="font-medium">Admin</span>
          </Link>
      </li>
    </ul>
  </div>
</template>
