<script setup>
import AdminSideMenu from "@/Layouts/Partials/Admin/AdminSideMenu.vue";
import InputText from "primevue/inputtext";
import FlashMessages from '@/Components/FlashMessages.vue'
</script>

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

<style lang="scss" scoped>


.fade-enter, .fade-leave-to {
    transition: translateX(3em);
    opacity: 0;
}

.fade-enter-active, .fade-leave-active {
    transition: all .3s ease;
}


::v-deep(.custom-scrolltop) {
    width: 2rem;
    height: 2rem;
    border-radius: 4px;
    background-color: var(--primary-color);

    &:hover {
        background-color: var(--primary-color);
    }

    .p-scrolltop-icon {
        font-size: 1rem;
        color: var(--primary-color-text);
    }
}

</style>

<template>
    <Transition name="fade" mode="out-in" appear>
        <div :key="$page.url">
    <FlashMessages />
    <div class="min-h-screen flex relative lg:static surface-ground">
        <div id="app-sidebar-1" class="surface-section h-screen hidden lg:block flex-shrink-0 absolute lg:static left-0 top-0 z-1 border-right-1 surface-border select-none" style="width:280px">
            <div class="flex flex-column h-full">
                <div class="flex align-items-center px-5 flex-shrink-0" style="height:60px">
                    <img src="images/blocks/logos/hyper-700.svg" alt="Image" height="30">
                </div>
                <AdminSideMenu/>
            </div>
        </div>
        <div class="min-h-screen flex flex-column relative flex-auto">
            <div class="flex justify-content-between align-items-center px-5 surface-0 border-bottom-1 surface-border relative lg:static" style="height:60px">
                <div class="flex">
                    <a v-ripple class="cursor-pointer block lg:hidden text-700 mr-3 mt-1 p-ripple"
                       v-styleclass="{ selector: '#app-sidebar-1', enterClass: 'hidden', enterActiveClass: 'fadeinleft', leaveToClass: 'hidden', leaveActiveClass: 'fadeoutleft', hideOnOutsideClick: true }">
                        <i class="pi pi-bars text-4xl"></i>
                    </a>
                    <span class="p-input-icon-left">
                    <i class="pi pi-search"></i>
                    <InputText type="text" class="border-none w-10rem sm:w-20rem" placeholder="Search" />
                </span>
                </div>
                <a v-ripple class="cursor-pointer block lg:hidden text-700 p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'fadein', leaveToClass: 'hidden', leaveActiveClass: 'fadeout', hideOnOutsideClick: true }">
                    <i class="pi pi-ellipsis-v text-2xl"></i>
                </a>
                <ul class="list-none p-0 m-0 hidden lg:flex lg:align-items-center select-none lg:flex-row
                surface-section border-1 lg:border-none surface-border right-0 top-100 z-1 shadow-2 lg:shadow-none absolute lg:static">
                    <li>
                        <a v-ripple class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer
                        transition-duration-150 transition-colors p-ripple">
                            <i class="pi pi-inbox text-base lg:text-2xl mr-2 lg:mr-0"></i>
                            <span class="block lg:hidden font-medium">Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a v-ripple class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer
                        transition-duration-150 transition-colors p-ripple">
                            <i class="pi pi-bell text-base lg:text-2xl mr-2 lg:mr-0" v-badge.danger></i>
                            <span class="block lg:hidden font-medium">Notifications</span>
                        </a>
                    </li>
                    <li class="border-top-1 surface-border lg:border-top-none">
                        <a v-ripple class="flex p-3 lg:px-3 lg:py-2 align-items-center hover:surface-100 font-medium border-round cursor-pointer
                        transition-duration-150 transition-colors p-ripple">
                            <img src="images/blocks/avatars/circle/avatar-f-1.png" class="mr-3 lg:mr-0" style="width: 32px; height: 32px"/>
                            <div class="block lg:hidden">
                                <div class="text-900 font-medium">Josephine Lillard</div>
                                <span class="text-600 font-medium text-sm">Marketing Specialist</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="p-5 flex flex-column flex-auto">
                <div class="border-2 border-dashed surface-border border-round surface-section flex-auto">
                    <slot />
                </div>
            </div>
        </div>
    </div>
        </div>
    </Transition>
</template>
