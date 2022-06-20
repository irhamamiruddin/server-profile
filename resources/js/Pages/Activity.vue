<template #activity>
    <div class="p-5 rounded-md bg-white border border-gray-200">
        Display Activity
    </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
    },

    props: ["servers"],
};
</script>
