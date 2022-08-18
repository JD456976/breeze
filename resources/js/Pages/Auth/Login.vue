<script setup>
import GuestLayout from '@/Layouts/Main.vue';
import InputText from 'primevue/inputtext';
import Checkbox from 'primevue/checkbox';
import Button from 'primevue/button';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in"/>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="surface-ground px-4 py-8 md:px-6 lg:px-8 flex align-items-center justify-content-center">
                <div class="surface-card p-4 shadow-2 border-round w-full lg:w-6">
                    <ValidationErrors class="mb-4"/>
                    <div class="text-center mb-5">
                        <div class="text-900 text-3xl font-medium mb-3">Welcome Back</div>
                        <span class="text-600 font-medium line-height-3">Don't have an account?</span>
                        <Link :href="route('register')" class="font-medium no-underline ml-2 text-blue-500 cursor-pointer">
                           Signup Today!
                        </Link>
                    </div>
                    <div>
                        <div class="field col-12">
                            <span class="p-float-label p-input-icon-right w-12">
                                <InputText  v-bind:class='{"p-invalid": form.errors.email}' class="p-inputtext-lg w-12" id="email" type="text" v-model="form.email"/>
                                <label for="email">Email</label>
                            </span>
                        </div>
                        <div class="field col-12">
                            <span class="p-float-label p-input-icon-right mt-3 w-12">
                                <InputText  v-bind:class='{"p-invalid": form.errors.password}' class="p-inputtext-lg w-12" id="password" type="password" v-model="form.password"/>
                                <label for="password">Password</label>
                            </span>
                        </div>

                        <div class="flex align-items-center justify-content-between mb-6">
                            <div class="flex align-items-center">
                                <div class="field-checkbox">
                                    <Checkbox id="city1" name="city" value="Chicago" v-model="form.remember" />
                                    <label for="city1">Remember Me</label>
                                </div>
                            </div>
                            <Link :href="route('password.request')" class="font-medium no-underline ml-2 text-blue-500 cursor-pointer">
                                Forgot Password?
                            </Link>
                        </div>
                        <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit" label="Sign In" class="p-button-raised w-full" />
                    </div>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
