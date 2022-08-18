<script setup>

import Authenticated from "@/Layouts/Authenticated.vue";
import {Head, useForm} from "@inertiajs/inertia-vue3";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import Dropdown from "primevue/dropdown";
import Button from "primevue/button";

const props = defineProps({
    tins: Array,
    colors: Array,
    scents: Array
});

const form = useForm({
    tin: '',
    color: '',
    scent: ''
});

const submit = () => {
    form.post(route('orders.store'));
};

</script>

<style scoped>

</style>

<template>
    <Authenticated>
        <Head title="New Order"/>
        <div class="surface-section px-4 py-8 md:px-6 lg:px-8">
            <div class="card">
                <span class="text-4xl">Place New Order</span>
                <form @submit.prevent="submit">
                <TabView class="tabview-custom" ref="tabview4">
                    <TabPanel>
                        <template #header>
                            <li class="relative mr-0 md:mr-8 flex-auto">
                                <div class="border-1 border-300 border-round p-3 surface-card flex flex-column md:flex-row align-items-center z-1">
                                    <i v-if="form.tin" class="pi pi-check-circle text-green-500 text-2xl md:text-4xl mb-2 md:mb-0 mr-0 md:mr-3"></i>
                                    <div>
                                        <div class="text-900 font-medium mb-1">Tins</div>
                                        <span class="text-600 text-sm hidden md:block">Choose a tin color</span>
                                    </div>
                                </div>
                                <small v-if="form.errors.tin" id="name-help"
                                       class="p-error">{{ form.errors.tin }}
                                </small>
                                <div class="w-full absolute top-50 left-100 surface-300 hidden md:block" style="transform: translateY(-50%); height: 2px"></div>
                            </li>

                        </template>
                        <div class="surface-ground">
                            <Dropdown v-bind:class='{"p-invalid": form.errors.tin}' v-model="form.tin" :options="tins" optionLabel="name" :filter="true" placeholder="Select a Tin" :showClear="true">
                                <template #value="slotProps">
                                    <div class="country-item country-item-value" v-if="slotProps.value">
                                        <img :src="slotProps.value.media" />
                                        <div>{{slotProps.value.name}}</div>
                                    </div>
                                    <span v-else>
                                    {{slotProps.placeholder}}
                                </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="country-item">
                                        <img :src="slotProps.option.media" />
                                        <div>{{slotProps.option.name}}</div>
                                    </div>
                                </template>
                            </Dropdown>
                            <div>
                                <small v-if="form.errors.tin" id="name-help"
                                       class="p-error">{{ form.errors.tin }}
                                </small>
                            </div>
                        </div>
                    </TabPanel>
                    <TabPanel>
                        <template #header>
                            <li class="relative mr-0 md:mr-8 flex-auto">
                                <div class="border-1 border-300 border-round p-3 surface-card flex flex-column md:flex-row align-items-center z-1">
                                    <i v-if="form.color" class="pi pi-check-circle text-green-500 text-2xl md:text-4xl mb-2 md:mb-0 mr-0 md:mr-3"></i>
                                    <div>
                                        <div class="text-900 font-medium mb-1">Color</div>
                                        <span class="text-600 text-sm hidden md:block">What's your favorite color?</span>
                                    </div>
                                </div>
                                <small v-if="form.errors.color" id="name-help"
                                       class="p-error">{{ form.errors.color }}
                                </small>
                                <div class="w-full absolute top-50 left-100 surface-300 hidden md:block" style="transform: translateY(-50%); height: 2px"></div>
                            </li>
                        </template>
                        <Dropdown v-bind:class='{"p-invalid": form.errors.color}' v-model="form.color" :options="colors" optionLabel="name" :filter="true" placeholder="Select a Color" :showClear="true">
                            <template #value="slotProps">
                                <div class="country-item country-item-value" v-if="slotProps.value">
                                    <img :src="slotProps.value.media" />
                                    <div>{{slotProps.value.name}}</div>
                                </div>
                                <span v-else>
                                    {{slotProps.placeholder}}
                                </span>
                            </template>
                            <template #option="slotProps">
                                <div class="country-item">
                                    <img :src="slotProps.option.media" />
                                    <div>{{slotProps.option.name}}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <div>
                            <small v-if="form.errors.color" id="name-help"
                                   class="p-error">{{ form.errors.color }}
                            </small>
                        </div>
                    </TabPanel>
                    <TabPanel>
                        <template #header>
                            <li class="relative mr-0 md:mr-8 flex-auto">
                                <div class="border-1 border-300 border-round p-3 surface-card flex flex-column md:flex-row align-items-center z-1">
                                    <i v-if="form.scent" class="pi pi-check-circle text-green-500 text-2xl md:text-4xl mb-2 md:mb-0 mr-0 md:mr-3"></i>
                                    <div>
                                        <div class="text-900 font-medium mb-1">Scent</div>
                                        <span class="text-600 text-sm hidden md:block">Please your nose with a variety of scents</span>
                                    </div>
                                </div>
                                <small v-if="form.errors.scent" id="name-help"
                                       class="p-error">{{ form.errors.scent }}
                                </small>
                                <div class="w-full absolute top-50 left-100 surface-300 hidden md:block" style="transform: translateY(-50%); height: 2px"></div>
                            </li>
                        </template>
                        <Dropdown v-bind:class='{"p-invalid": form.errors.scent}' v-model="form.scent" :options="scents" optionLabel="name" :filter="true" placeholder="Select a Scent" :showClear="true">
                            <template #value="slotProps">
                                <div class="country-item country-item-value" v-if="slotProps.value">
                                    <img :src="slotProps.value.media" />
                                    <div>{{slotProps.value.name}}</div>
                                </div>
                                <span v-else>
                                    {{slotProps.placeholder}}
                                </span>
                            </template>
                            <template #option="slotProps">
                                <div class="country-item">
                                    <img :src="slotProps.option.media" />
                                    <div>{{slotProps.option.name}}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <div>
                            <small v-if="form.errors.scent" id="name-help"
                                   class="p-error">{{ form.errors.scent }}
                            </small>
                        </div>
                    </TabPanel>
                    <TabPanel>
                        <template #header>
                            <Button type="submit" label="Place New Order" class="p-button-raised" />
                        </template>
                    </TabPanel>
                </TabView>
                </form>
            </div>
        </div>
    </Authenticated>
</template>
