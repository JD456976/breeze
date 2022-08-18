<script setup>
import GuestLayout from '@/Layouts/Main.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Password from 'primevue/password';
import InputText from "primevue/inputtext";
import Button from "primevue/button";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<style lang="scss" scoped>
::v-deep(.p-password input) {
    width: 15rem
}
</style>

<template>
    <GuestLayout>

        <Head title="Register"/>

        <form @submit.prevent="submit">
            <div class="surface-ground px-4 py-8 md:px-6 lg:px-8 flex align-items-center justify-content-center">
                <div class="surface-card p-4 shadow-2 border-round w-full lg:w-6">
                    <ValidationErrors class="mb-4"/>
                    <div class="text-center mb-5">
                        <div class="text-900 text-3xl font-medium mb-3">Welcome!!</div>
                        <span class="text-600 font-medium line-height-3">Have an account already?</span>
                        <Link :href="route('login')" class="font-medium no-underline ml-2 text-blue-500 cursor-pointer">
                            Sign In!
                        </Link>
                    </div>
                    <div>
                        <div class="field col-12">
                            <span class="p-float-label p-input-icon-right w-12">
                                <InputText  v-bind:class='{"p-invalid": form.errors.name}' class="p-inputtext-lg w-12" id="name" type="text" v-model="form.name"/>
                                <label for="name">Name</label>
                            </span>
                        </div>
                        <div class="field col-12">
                            <span class="p-float-label p-input-icon-right w-12">
                                <InputText  v-bind:class='{"p-invalid": form.errors.email}' class="p-inputtext-lg w-12" id="email" type="text" v-model="form.email"/>
                                <label for="email">Email</label>
                            </span>
                        </div>
                        <div class="field col-12">
                            <span class="p-float-label p-input-icon-right w-12">
                                <Password v-bind:class='{"p-invalid": form.errors.password}' class="p-inputtext-lg" id="password" type="password" v-model="form.password" toggleMask></Password>
                                <label for="password">Password</label>
                            </span>
                        </div>
                        <div class="field col-12">
                            <span class="p-float-label p-input-icon-right w-12">
                                <Password v-bind:class='{"p-invalid": form.errors.password_confirmation}' class="p-inputtext-lg" id="password_confirmation" type="password" v-model="form.password_confirmation" toggleMask></Password>
                                <label for="password">Confirm Password</label>
                            </span>
                        </div>
                        <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit" label="Create Account" class="p-button-raised w-full" />
                    </div>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
