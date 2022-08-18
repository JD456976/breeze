<script setup>
import FlashMessages from '@/Components/FlashMessages.vue'
</script>

<template>
    <div class="p-4">
        <div class=" surface-border border-round surface-card" style="min-height: 20rem">
            <FlashMessages />
            <slot />
        </div>
    </div>
</template>
