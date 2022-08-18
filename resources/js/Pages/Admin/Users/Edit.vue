<script setup>
import Button from "primevue/button";
import InputSwitch from 'primevue/inputswitch';
import {useCountriesStore} from "@/Stores/userCountriesStore";
import {useStatesStore} from "@/Stores/userStatesStore";
import {usePrimeVue} from "primevue/config";
import Authenticated from "@/Layouts/Authenticated.vue";
import InputText from "primevue/inputtext";
import FileUpload from 'primevue/fileupload';
import Dropdown from 'primevue/dropdown';
import Avatar from "primevue/avatar";
import {useForm, Head} from "@inertiajs/inertia-vue3";

let countries = useCountriesStore();
let states = useStatesStore();

const $primevue = usePrimeVue();
defineExpose({
    $primevue
})

const props = defineProps({
    user: Object
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    address: props.user.address,
    city: props.user.city,
    state: props.user.state,
    zip: props.user.zip,
    country: props.user.country
});

const submit = () => {
    form.patch(route('admin.users.update', props.user.id));
};
</script>

<script>
import StyleClass from 'primevue/styleclass';
import BadgeDirective from 'primevue/badgedirective';

export default {
    directives: {
        "styleclass": StyleClass,
        "badge": BadgeDirective,
    },
}
</script>


<template>
    <Head title="Edit Profile"/>
    <Authenticated>
        <div class="min-h-screen flex relative lg:static surface-ground">
            <div class="min-h-screen flex flex-column relative flex-auto">
                <div class="p-5 flex flex-column flex-auto">
                    <div>
                        <div class="text-900 font-medium text-xl mb-3">{{ props.user.name }}'s Profile</div>
                        <div class="surface-card p-4 shadow-2 border-round">
                            <form @submit.prevent="submit">
                                <div class="grid formgrid p-fluid">
                                    <div class="field mb-4 col-6">
                                        <label for="nickname" class="font-medium">Name</label>
                                        <div v-tooltip.top="'Cannot be edited'">
                                            <InputText v-bind:class='{"p-invalid": form.errors.name}' disabled v-model="form.name" id="name" type="text"/>
                                            <small v-if="form.errors.name" id="name-help"
                                                   class="p-error">{{ form.errors.name }}</small>
                                        </div>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-3 ml-10">
                                        <label for="avatar" class="font-medium">Avatar</label>
                                        <div class="flex align-items-center">
                                            <Avatar image="https://i.pravatar.cc/300" class="mr-2" size="xlarge" shape="circle" />
                                            <FileUpload mode="basic" name="avatar" url="./upload.php" accept="image/*" :maxFileSize="5000000" class="p-button-outlined p-button-plain" chooseLabel="Upload Image"></FileUpload>
                                        </div>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="email" class="font-medium">Email</label>
                                        <InputText v-bind:class='{"p-invalid": form.errors.email}' v-model="form.email" id="email" />
                                        <small v-if="form.errors.email" id="name-help"
                                               class="p-error">{{ form.errors.email }}</small>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12">
                                        <div class="field mb-4 col-12 md:col-12">
                                            <label for="email" class="font-medium">Address</label>
                                            <InputText v-bind:class='{"p-invalid": form.errors.address}' v-model="form.address" id="address" />
                                            <small v-if="form.errors.address" id="name-help"
                                                   class="p-error">{{ form.errors.address }}</small>
                                        </div>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-4">
                                        <label for="email" class="font-medium">City</label>
                                        <InputText v-bind:class='{"p-invalid": form.errors.city}' v-model="form.city" id="city" />
                                        <small v-if="form.errors.city" id="name-help"
                                               class="p-error">{{ form.errors.city }}</small>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-2">
                                        <label for="state" class="font-medium">State</label>
                                        <Dropdown v-model="form.state"
                                                  v-bind:class='{"p-invalid": form.errors.state}'
                                                  optionValue="code"
                                                  :options="states.collection"
                                                  optionLabel="name"
                                                  :filter="true"
                                                  filterBy="name"
                                                  :showClear="true" placeholder="Select a State">
                                            <template #option="slotProps">
                                                <div class="flex align-items-center">
                                                    <div>{{slotProps.option.name}}</div>
                                                </div>
                                            </template>
                                        </Dropdown>
                                        <div>
                                            <small v-if="form.errors.state" id="name-help"
                                                   class="p-error">{{ form.errors.state }}</small>
                                        </div>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-2">
                                        <label for="zip" class="font-medium">Zip</label>
                                        <InputText v-bind:class='{"p-invalid": form.errors.zip}' v-model="form.zip" id="zip" />
                                        <small v-if="form.errors.zip" id="name-help"
                                               class="p-error">{{ form.errors.zip }}</small>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-3">
                                        <label for="bio" class="font-medium">Country</label>
                                        <Dropdown v-model="form.country"
                                                  v-bind:class='{"p-invalid": form.errors.country}'
                                                  optionValue="code"
                                                  :options="countries.collection"
                                                  optionLabel="name"
                                                  :filter="true"
                                                  filterBy="name"
                                                  :showClear="true" placeholder="Select a Country">
                                            <template #option="slotProps">
                                                <div class="flex align-items-center">
                                                    <div>{{slotProps.option.name}}</div>
                                                </div>
                                            </template>
                                        </Dropdown>
                                        <div>
                                            <small v-if="form.errors.country" id="name-help"
                                                   class="p-error">{{ form.errors.country }}</small>
                                        </div>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12">
                                        <label for="privacy" class="font-medium">Privacy</label>
                                        <div class="flex align-items-center">
                                            <InputSwitch></InputSwitch>
                                            <span class="ml-2">Share my data with contacts</span>
                                        </div>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="col-12">
                                        <Button type="submit" label="Save Changes" class="w-auto mt-3"></Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Authenticated>
</template>
