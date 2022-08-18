<script setup>
import Button from "primevue/button";
import BreezeGuestLayout from '@/Layouts/Main.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
import InputText from "primevue/inputtext";

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Forgot Password" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
        <div class="surface-ground px-4 py-8 md:px-6 lg:px-8 flex align-items-center justify-content-center">
            <div class="surface-card p-4 shadow-2 border-round w-full lg:w-6">
                <ValidationErrors class="mb-4"/>
                <div class="text-center mb-5">
                    <span class="text-600 font-medium line-height-3">  Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</span>
                </div>
                <div>
                    <div class="field col-12">
                            <span class="p-float-label p-input-icon-right w-12">
                                <InputText  v-bind:class='{"p-invalid": form.errors.email}' class="p-inputtext-lg w-12" id="email" type="text" v-model="form.email"/>
                                <label for="email">Email</label>
                            </span>
                    </div>
                    <div class="field col-12">
                        <span class="text-600 font-medium">Have an Account?</span>
                        <Link :href="route('login')" class="font-medium no-underline ml-2 text-blue-500 cursor-pointer">
                            Sign In
                        </Link>
                    </div>
                    <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit" label="Send Reset Link" class="p-button-raised w-full" />
                </div>
            </div>
        </div>
    </form>
    </BreezeGuestLayout>
</template>
