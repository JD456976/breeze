<script setup>
import Avatar from 'primevue/avatar';
import {usePrimeVue} from "primevue/config";
import {Link} from "@inertiajs/inertia-vue3";
import {authUserStore} from "@/Stores/authUserStore";

let auth = authUserStore();

const $primevue = usePrimeVue();
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
    <i class="pi pi-ellipsis-v text-xl"></i>
  </a>
  <div
      class="hidden lg:flex lg:justify-content-end absolute lg:static w-full surface-overlay left-0 top-100 z-1 shadow-2 lg:shadow-none">
    <ul v-if="auth.user" class="flex list-none p-0 m-0 flex-column lg:flex-row">
      <li class="h-full">
        <a v-ripple
           class="cursor-pointer h-full inline-flex align-items-center text-600 py-3 lg:py-0 px-3 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-ripple">
          <span class="pi pi-book mr-2 lg:mr-0"></span>
          <span class="font-medium inline lg:hidden">Documentation</span>
        </a>
      </li>
      <li class="h-full">
        <a v-ripple
           class="cursor-pointer h-full inline-flex align-items-center text-600 py-3 lg:py-0 px-3 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-ripple">
          <span class="pi pi-inbox mr-2 lg:mr-0"></span>
          <span class="font-medium inline lg:hidden">Inbox</span>
        </a>
      </li>
      <li class="h-full">
        <a v-ripple
           class="cursor-pointer h-full inline-flex align-items-center text-600 py-3 lg:py-0 px-3 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-ripple">
          <span class="pi pi-bell mr-2 lg:mr-0"></span>
          <span class="font-medium inline lg:hidden">Notifications</span>
        </a>
      </li>
      <li class="h-full relative">
        <a v-ripple
           class="cursor-pointer h-full inline-flex align-items-center text-600 py-3 lg:py-0 px-3 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-ripple"
           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'scalein', leaveToClass: 'hidden', leaveActiveClass: 'fadeout', hideOnOutsideClick: true }">
          <Avatar image="https://i.pravatar.cc/300" class="mr-2" shape="circle"/>
          <span class="mx-2 font-medium text-900">{{ auth.user.name }}</span>
          <i class="pi pi-angle-down"></i>
        </a>
        <div
            class="hidden static lg:absolute w-full surface-overlay left-0 top-100 z-1 shadow-none lg:shadow-2 origin-top border-round pl-3 lg:pl-0">
          <ul class="list-none p-0 m-0">
            <li>
                <Link :href="route('profile.edit', auth.user.slug)"
                      v-ripple
                      class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple">
                    <span class="pi pi-user-edit mr-2"></span>
                    <span class="font-medium">Profile</span>
                </Link>
            </li>
            <li>
                <Link :href="route('orders.index')"
                      v-ripple
                      class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple">
                    <span class="pi pi-sign-out mr-2"></span>
                    <span class="font-medium">My Orders</span>
                </Link>
            </li>
            <li>
              <Link :href="route('logout')" method="post"
                    v-ripple
                    class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple">
                <span class="pi pi-sign-out mr-2"></span>
                <span class="font-medium">Sign Out</span>
              </Link>
            </li>
          </ul>
        </div>
      </li>
    </ul>
    <ul v-if="!auth.user" class="flex list-none p-0 m-0 flex-column lg:flex-row">
      <li class="h-full">
        <Link :href="route('login')"
              v-ripple
              class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple">
          <span class="pi pi-sign-out mr-2"></span>
          <span class="font-medium">Login</span>
        </Link>
      </li>
      <li class="h-full">
        <Link :href="route('register')"
              v-ripple
              class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple">
          <span class="pi pi-key mr-2"></span>
          <span class="font-medium">Register</span>
        </Link>
      </li>
    </ul>
  </div>
</template>
