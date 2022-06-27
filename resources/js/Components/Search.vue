<template>
    <JetInput
        type="text"
        class="block w-auto"
        placeholder="Search"
        v-model="form.search"
    />
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        InertiaLink,
        JetInput,
    },

    props: {
        filters: Array,
    },

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
                route("activities.index", newVal ? { search: newVal } : {}) //show list of bnda di search instead of pegi ke specific page
            );
        },
    },
};
</script>
