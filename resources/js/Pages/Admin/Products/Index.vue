<script setup>
import DataTable from 'primevue/datatable';
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Column from 'primevue/column';
import Calendar from 'primevue/calendar';
import AdminLayout from '@/Layouts/Admin.vue'
import {Head, Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import {FilterMatchMode, FilterOperator} from "primevue/api";
import Toast from 'primevue/toast';
import ConfirmPopup from 'primevue/confirmpopup';
import {useConfirm} from "primevue/useconfirm";
import {useToast} from "primevue/usetoast";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    products: Array
});

const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
    'name': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'color': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'tin': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'scent': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'created_at': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]},
});

const clearFilter = () => {
    initFilters();
};
const initFilters = () => {
    filters.value = {
        'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
        'name': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'color': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'tin': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'scent': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'created_at': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]},
    }
};

const confirm = useConfirm();
const toast = useToast();

const deleteProduct = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to delete this product?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("admin.products.destroy", id));
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Canceled",
                detail: "Nothing was deleted",
                group: "br",
                life: 3000
            });
        }
    });
};
</script>

<template>
    <AdminLayout>
        <Head title="Prodcuts List" />
        <div>
            <ConfirmPopup></ConfirmPopup>
            <div class="card">
                <Toast position="bottom-right" group="br" />
                <DataTable :value="products" :paginator="true" class="p-datatable-customers" showGridlines :rows="10"
                           dataKey="id" v-model:filters="filters" filterDisplay="menu" responsiveLayout="scroll"
                           :globalFilterFields="['name','email','color','tin','scent','created_at']">
                    <template #header>
                        <div class="flex justify-content-between">
                            <Button type="button" icon="pi pi-filter-slash" label="Clear" class="p-button-outlined" @click="clearFilter()"/>
                            <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
                        </span>
                        </div>
                    </template>
                    <template #empty>
                        No products found.
                    </template>
                    <template #loading>
                        Loading products data. Please wait.
                    </template>
                    <Column field="name" header="Name" style="min-width:12rem">
                        <template #body="{data}">
                            <Link v-tooltip.top="'Click To Edit'" :href="route('admin.products.edit', data.id)">
                                {{data.name}}
                            </Link>
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by name"/>
                        </template>
                    </Column>
                    <Column field="color" header="Color" style="min-width:12rem">
                        <template #body="{data}">
                            {{data.color.name}}
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by color"/>
                        </template>
                    </Column>
                    <Column field="tin" header="Tin" style="min-width:12rem">
                        <template #body="{data}">
                            {{data.tin.name}}
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by color"/>
                        </template>
                    </Column>
                    <Column field="scent" header="Scent" style="min-width:12rem">
                        <template #body="{data}">
                            {{data.scent.name}}
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by scent"/>
                        </template>
                    </Column>
                    <Column header="Created" filterField="created_at" dataType="date" style="min-width:10rem">
                        <template #body="{data}">
                            {{data.created_at}}
                        </template>
                        <template #filter="{filterModel}">
                            <Calendar v-model="filterModel.value" dateFormat="mm/dd/yy" placeholder="mm/dd/yyyy" />
                        </template>
                    </Column>
                    <Column header="Delete">
                        <template #body="slotProps">
                            <Button
                                @click="deleteProduct($event,slotProps.data.id)"
                                label="Delete"
                                v-tooltip.top="'Delete Product'"
                                class="p-button-danger p-button-raised p-button-sm"
                                icon="pi pi-trash"
                                iconPos="right"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </AdminLayout>
</template>
