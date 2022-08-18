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
import {authUserStore} from "@/Stores/authUserStore";
import {Link} from '@inertiajs/inertia-vue3';
import Avatar from "primevue/avatar";

let auth = authUserStore();
</script>

<template>
  <div class="overflow-y-auto">
    <ul class="list-none p-3 m-0">
      <li>
        <div v-ripple class="p-3 flex align-items-center justify-content-between text-600 cursor-pointer p-ripple"
             v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
          <span class="font-medium">FAVORITES</span>
          <i class="pi pi-chevron-down"></i>
        </div>
        <ul class="list-none p-0 m-0 overflow-hidden">
          <li>
              <Link v-ripple href="/"
                    class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple" >
                  <i class="pi pi-home mr-2"></i>
                  <span class="font-medium">Home</span>
              </Link>
          </li>
          <li>
            <a v-ripple
               class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
               v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
              <i class="pi pi-user mr-2"></i>
              <span class="font-medium">Candles</span>
              <i class="pi pi-chevron-down ml-auto"></i>
            </a>
            <ul class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
              <li>
                  <Link v-ripple :href="route('admin.products.index')"
                        class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                        v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                      <i class="pi pi-users mr-2"></i>
                      <span class="font-medium">Candles List</span>
                  </Link>
              </li>
                <li>
                    <Link v-ripple :href="route('admin.products.create')"
                          class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                          v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                        <i class="pi pi-users mr-2"></i>
                        <span class="font-medium">Add Candle</span>
                    </Link>
                </li>
            </ul>
          </li>
            <li>
                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                    <i class="pi pi-user mr-2"></i>
                    <span class="font-medium">Users</span>
                    <i class="pi pi-chevron-down ml-auto"></i>
                </a>
                <ul class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                    <li>
                        <Link v-ripple :href="route('admin.users.index')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Users List</span>
                        </Link>
                    </li>
                </ul>
            </li>
        </ul>
      </li>
    </ul>
    <ul class="list-none p-3 m-0">
      <li>
        <div v-ripple class="p-3 flex align-items-center justify-content-between text-600 cursor-pointer p-ripple"
             v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
          <span class="font-medium">PRODUCTS</span>
          <i class="pi pi-chevron-down"></i>
        </div>
        <ul class="list-none p-0 m-0 overflow-hidden">
            <li>
                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                    <i class="pi pi-user mr-2"></i>
                    <span class="font-medium">Tins</span>
                    <i class="pi pi-chevron-down ml-auto"></i>
                </a>
                <ul class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                    <li>
                        <Link v-ripple :href="route('admin.tins.index')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Tins List</span>
                        </Link>
                    </li>
                    <li>
                        <Link v-ripple :href="route('admin.tins.create')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Add Tin</span>
                        </Link>
                    </li>
                </ul>
            </li>
            <li>
                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                    <i class="pi pi-user mr-2"></i>
                    <span class="font-medium">Scents</span>
                    <i class="pi pi-chevron-down ml-auto"></i>
                </a>
                <ul class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                    <li>
                        <Link v-ripple :href="route('admin.scents.index')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Scents List</span>
                        </Link>
                    </li>
                    <li>
                        <Link v-ripple :href="route('admin.scents.create')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Add Scent</span>
                        </Link>
                    </li>
                </ul>
            </li>
            <li>
                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                    <i class="pi pi-user mr-2"></i>
                    <span class="font-medium">Colors</span>
                    <i class="pi pi-chevron-down ml-auto"></i>
                </a>
                <ul class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                    <li>
                        <Link v-ripple :href="route('admin.colors.index')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Colors List</span>
                        </Link>
                    </li>
                    <li>
                        <Link v-ripple :href="route('admin.colors.create')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Add Color</span>
                        </Link>
                    </li>
                </ul>
            </li>
            <li>
                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                    <i class="pi pi-user mr-2"></i>
                    <span class="font-medium">Sizes</span>
                    <i class="pi pi-chevron-down ml-auto"></i>
                </a>
                <ul class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                    <li>
                        <Link v-ripple :href="route('admin.sizes.index')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Sizes List</span>
                        </Link>
                    </li>
                    <li>
                        <Link v-ripple :href="route('admin.sizes.create')"
                              class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                              v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Add Size</span>
                        </Link>
                    </li>
                </ul>
            </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="mt-auto">
    <hr class="mb-3 mx-3 border-top-1 border-none surface-border"/>
    <a v-ripple
       class="m-3 flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
        <Avatar image="https://i.pravatar.cc/300" class="mr-2" shape="circle"/>
      <span class="font-medium">{{ auth.user.name }}</span>
    </a>
  </div>
</template>
