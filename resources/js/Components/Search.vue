<template>
    <JetInput
        type="text"
        class="block w-auto"
        placeholder="Search"
        v-model="form.search"
    />
</template>

<script>
import JetInput from "@/Jetstream/Input.vue";
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    components: {
        JetInput,
        InertiaLink,
    },

    props: ["filters"],

    data() {
        return {
            form: {
                search: this.filters.search,
                page: this.filters.page,
            },
        };
    },

    watch: {
        "form.search": function searchPost(newVal) {
            Inertia.get(
                route("activities.index", newVal ? { search: newVal } : {})
            );
        },
    },
};
</script>
