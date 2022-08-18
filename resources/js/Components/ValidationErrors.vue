<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import Message from 'primevue/message';

const errors = computed(() => usePage().props.value.errors);

let hasErrors = computed(() => Object.keys(errors.value).length > 0);

function close()
{
    hasErrors = false;
}
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>

<template>
    <Transition name="slide-fade">
        <div v-if="hasErrors">
            <Message severity="error" :life="5000" :sticky="false" :closable="true"><span class="font-medium text-xl mb-3">Whoops! Something went wrong.</span>
                <ul class="m-0 p-0 text-rose-600 ml-3">
                    <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
                </ul>
            </Message>
        </div>
    </Transition>
</template>
