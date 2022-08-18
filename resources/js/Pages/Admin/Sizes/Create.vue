<script setup>
import AdminLayout from '@/Layouts/Admin.vue'
import {Head, useForm} from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import ValidationErrors from '@/Components/ValidationErrors.vue'

const form = useForm({
    size: '',
});

const submit = () => {
    form.post(route('admin.sizes.store'), {
        onFinish: () => form.reset('size'),
    });
};
</script>

<template>
    <AdminLayout>
        <Head title="Add New Size" />
        <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
            <div class="text-900 font-medium text-xl mb-3">Add New Size</div>
            <ValidationErrors />
            <form @submit.prevent="submit">
                <div class="surface-card p-4 shadow-2 border-round">
                    <div class="grid formgrid p-fluid">
                        <div class="field mb-4 col-12">
                            <label for="size" class="font-medium text-900">Size</label>
                            <InputText v-bind:class='{"p-invalid": form.errors.size}' v-model="form.size" id="size" type="text" />
                            <small v-if="form.errors.size" id="name-help"
                                   class="p-error">{{ form.errors.size }}</small>
                        </div>
                        <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                        <div class="col-12">
                            <Button type="submit" label="Add Size" class="w-auto mt-3"></Button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
