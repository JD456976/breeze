<script setup>
import DataTable from 'primevue/datatable';
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Column from 'primevue/column';
import Calendar from 'primevue/calendar';
import AdminLayout from '@/Layouts/Admin.vue'
import {Head} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import {FilterMatchMode, FilterOperator} from "primevue/api";
import Toast from 'primevue/toast';
import ConfirmPopup from 'primevue/confirmpopup';
import {useConfirm} from "primevue/useconfirm";
import {useToast} from "primevue/usetoast";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    sizes: Array
});

const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
    'name': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'created_at': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]},
});

const clearFilter = () => {
    initFilters();
};
const initFilters = () => {
    filters.value = {
        'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
        'name': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'created_at': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]},
    }
};

const confirm = useConfirm();
const toast = useToast();

const deleteSize = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to delete this size?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("admin.sizes.destroy", id));
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
        <Head title="Colors List" />
        <div>
            <ConfirmPopup></ConfirmPopup>
            <div class="card">
                <Toast position="bottom-right" group="br" />
                <DataTable :value="sizes" :paginator="true" class="p-datatable-customers" showGridlines :rows="10"
                           dataKey="id" v-model:filters="filters" filterDisplay="menu" responsiveLayout="scroll"
                           :globalFilterFields="['name','created_at']">
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
                        No sizes found.
                    </template>
                    <template #loading>
                        Loading sizes data. Please wait.
                    </template>
                    <Column field="size" header="Size" style="min-width:12rem">
                        <template #body="{data}">
                            {{data.size}}
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by size"/>
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
                                @click="deleteSize($event,slotProps.data.id)"
                                label="Delete"
                                v-tooltip.top="'Delete Size'"
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
