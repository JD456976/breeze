<script setup>
import FlashMessages from '@/Components/FlashMessages.vue'
import TopNavBar from "@/Layouts/Partials/TopNavBar.vue";
import UserMenu from "@/Layouts/Partials/UserMenu.vue";
</script>

<template>
    <div class="p-4">
        <div class=" surface-border border-round surface-card" style="min-height: 20rem">
            <div class="surface-overlay shadow-2 flex relative lg:static justify-content-between" style="min-height: 42px">
                <FlashMessages />
                <TopNavBar/>
                <UserMenu/>
            </div>
            <slot />
        </div>
    </div>
</template>
