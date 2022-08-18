<script setup>
import AdminLayout from '@/Layouts/Admin.vue'
import {Head, useForm} from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import Button from "primevue/button";
import ValidationErrors from '@/Components/ValidationErrors.vue'
import ImageUploader from "@/Components/ImageUploader.vue";

const props = defineProps({
    colors: Array,
    scents: Array,
    tins: Array
});

const form = useForm({
    name: '',
    tin: '',
    color: '',
    scent: '',
    cost: ''
});

const submit = () => {
    form.post(route('admin.products.store'), {
        onFinish: () => form.reset('name', 'tin', 'color','scent'),
    });
};
</script>

<template>
    <AdminLayout>
        <Head title="Add New Product" />
        <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
            <div class="text-900 font-medium text-xl mb-3">Add New Product</div>
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
                        <div class="field mb-4 col-12 md:col-6">
                            <label for="name" class="font-medium text-900">Color</label>
                            <Dropdown v-model="form.color"
                                      v-bind:class='{"p-invalid": form.errors.color}'
                                      optionValue="id"
                                      :options="colors"
                                      optionLabel="name"
                                      :filter="true"
                                      filterBy="name"
                                      :showClear="true" placeholder="Select a Color">
                                <template #option="slotProps">
                                    <div class="flex align-items-center">
                                        <div>{{slotProps.option.name}}</div>
                                    </div>
                                </template>
                            </Dropdown>
                            <div>
                                <small v-if="form.errors.color" id="name-help"
                                       class="p-error">{{ form.errors.color }}</small>
                            </div>
                        </div>
                        <div class="field mb-4 col-12 md:col-6">
                            <label for="name" class="font-medium text-900">Scent</label>
                            <Dropdown v-model="form.scent"
                                      v-bind:class='{"p-invalid": form.errors.scent}'
                                      optionValue="id"
                                      :options="scents"
                                      optionLabel="name"
                                      :filter="true"
                                      filterBy="name"
                                      :showClear="true" placeholder="Select a Scent">
                                <template #option="slotProps">
                                    <div class="flex align-items-center">
                                        <div>{{slotProps.option.name}}</div>
                                    </div>
                                </template>
                            </Dropdown>
                            <div>
                                <small v-if="form.errors.scent" id="name-help"
                                       class="p-error">{{ form.errors.scent }}</small>
                            </div>
                        </div>
                        <div class="field mb-4 col-12 md:col-6">
                            <label for="name" class="font-medium text-900">Tin</label>
                            <Dropdown v-model="form.tin"
                                      v-bind:class='{"p-invalid": form.errors.tin}'
                                      optionValue="id"
                                      :options="tins"
                                      optionLabel="name"
                                      :filter="true"
                                      filterBy="name"
                                      :showClear="true" placeholder="Select a Tin">
                                <template #option="slotProps">
                                    <div class="flex align-items-center">
                                        <div>{{slotProps.option.name}}</div>
                                    </div>
                                </template>
                            </Dropdown>
                            <div>
                                <small v-if="form.errors.tin" id="name-help"
                                       class="p-error">{{ form.errors.scent }}</small>
                            </div>
                        </div>
                        <div class="field mb-4 col-6">
                            <label for="name" class="font-medium text-900">Cost</label>
                            <InputText v-bind:class='{"p-invalid": form.errors.cost}' v-model="form.cost" id="cost" type="text" />
                            <small v-if="form.errors.cost" id="name-help"
                                   class="p-error">{{ form.errors.cost }}</small>
                        </div>
                        <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                        <div class="field mb-4 col-4">
                            <label for="name" class="font-medium text-900">Images</label>
                            <ImageUploader :allowMultiple="true" />
                        </div>
                        <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                        <div class="col-12">
                            <Button type="submit" label="Add Product" class="w-auto mt-3"></Button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
