<script setup>
import DataTable from 'primevue/datatable';
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Column from 'primevue/column';
import Calendar from 'primevue/calendar';
import {FilterMatchMode, FilterOperator} from "primevue/api";
import AdminLayout from '@/Layouts/Admin.vue';
import {ref} from 'vue';
import {Head, Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    users: Array
});

const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
    'name': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'email': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
    'created_at': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]},
});

const clearFilter = () => {
    initFilters();
};
const initFilters = () => {
    filters.value = {
        'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
        'name': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'email': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]},
        'created_at': {operator: FilterOperator.AND, constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]},
    }
};

</script>

<template>
    <AdminLayout>
        <Head title="Users List"/>
        <div>
            <div class="card">
                <DataTable :value="users" :paginator="true" class="p-datatable-customers" showGridlines :rows="10"
                           dataKey="id" v-model:filters="filters" filterDisplay="menu" responsiveLayout="scroll"
                           :globalFilterFields="['name','email','created_at']">
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
                        No users found.
                    </template>
                    <template #loading>
                        Loading users data. Please wait.
                    </template>
                    <Column field="name" header="Name" style="min-width:12rem">
                        <template #body="{data}">
                            <Link v-tooltip.top="'Click To Edit'" :href="route('admin.users.edit', data.id)">
                                {{data.name}}
                            </Link>
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by name"/>
                        </template>
                    </Column>
                    <Column header="Email" filterField="email" dataType="text" style="min-width:10rem">
                        <template #body="{data}">
                            {{data.email}}
                        </template>
                        <template #filter="{filterModel}">
                            <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by email"/>
                        </template>
                    </Column>
                    <Column header="Joined" filterField="created_at" dataType="date" style="min-width:10rem">
                        <template #body="{data}">
                            {{data.created_at}}
                        </template>
                        <template #filter="{filterModel}">
                            <Calendar v-model="filterModel.value" dateFormat="mm/dd/yy" placeholder="mm/dd/yyyy" />
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </AdminLayout>
</template>
