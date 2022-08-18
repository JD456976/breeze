import {defineStore} from "pinia";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export let authUserStore = defineStore('user',{
    state() {
        return {
            user: computed(() => usePage().props.value.auth.user)
        }
    }
})
