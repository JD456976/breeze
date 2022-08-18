<script setup>
import Message from "primevue/message";
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
        <div v-if="$page.props.flash.error">
            <Message class="absolute bottom-0 right-0 w-4 z-2" severity="error" :life="5000" :sticky="false" :closable="true">
                    {{ $page.props.flash.error }}
            </Message>
        </div>
    </Transition>

    <Transition name="slide-fade">
        <div v-if="$page.props.flash.info">
            <Message class="absolute bottom-0 right-0 w-4 z-2" severity="info" :life="5000" :sticky="false" :closable="true">
                    {{ $page.props.flash.error }}
            </Message>
        </div>
    </Transition>

    <Transition name="slide-fade">
        <div v-if="$page.props.flash.warning">
            <Message class="absolute bottom-0 right-0 w-4 z-2" severity="warn" :life="5000" :sticky="false" :closable="true">
                {{ $page.props.flash.warning }}
            </Message>
        </div>
    </Transition>

    <Transition name="slide-fade">
        <div v-if="$page.props.flash.success">
            <Message class="absolute bottom-0 right-0 w-4 z-2" severity="success" :life="5000" :sticky="false" :closable="true">
                {{ $page.props.flash.success }}
            </Message>
        </div>
    </Transition>
</template>
