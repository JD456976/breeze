<script setup>
import AdminLayout from '@/Layouts/Admin.vue'
import {Head, useForm} from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import ValidationErrors from '@/Components/ValidationErrors.vue'
import ImageUploader from "@/Components/ImageUploader.vue";

const props = defineProps({
    color: Object,
    media: Array
})

const form = useForm({
    name: props.color.name,
});

const submit = () => {
    form.patch(route('admin.colors.update', props.color.id), {
        onFinish: () => form.reset('name'),
    });
};
</script>

<template>
    <AdminLayout>
        <Head :title="'Update Color ' + color.name" />
        <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
            <div class="text-900 font-medium text-xl mb-3">Update Color {{ color.name }}</div>
            <ValidationErrors />
            <form @submit.prevent="submit">
                <div class="surface-card p-4 shadow-2 border-round">
                    <div class="grid formgrid p-fluid">
                        <div class="field mb-4 col-12">
                            <label for="name" class="font-medium text-900">Name</label>
                            <InputText v-bind:class='{"p-invalid": form.errors.name}' v-model="form.name" id="name" type="text" />
                            <small v-if="form.errors.name" id="name-help"
                                   class="p-error">{{ form.errors.name }}</small>
                        </div>
                        <div class="field mb-4 col-4">
                            <label for="name" class="font-medium text-900">Image</label>
                            <ImageUploader :files="media" />
                        </div>
                        <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                        <div class="col-12">
                            <Button type="submit" :label="'Update ' + color.name " class="w-auto mt-3"></Button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
