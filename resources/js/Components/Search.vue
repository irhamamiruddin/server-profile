<template>
    <JetDropdown align="right" width="72" contentClasses="py-2 bg-gray-100">
        <template #trigger>
            <JetInput
                type="text"
                class="block w-auto"
                placeholder="Search"
                v-model="form.search"
            />
        </template>

        <template #content>
            <div class="max-h-64 overflow-auto will-change-scroll bg-white">
                <JetDropdownLink
                    v-for="i in 100"
                    :key="i"
                    :href="route('profile.show')"
                    class="border-b-2"
                >
                    <div class="text-lg font-semibold">Item {{ i }}</div>
                    <div class="text-sm mt-2 font-light">
                        Item {{ i }} description
                    </div>
                </JetDropdownLink>
            </div>

            <inertia-link :href="route('search.result')">
                <div
                    class="pt-3 font-light text-sm text-center text-gray-600 hover:text-blue-500 border-t"
                >
                    Show all results
                </div>
            </inertia-link>
        </template>
    </JetDropdown>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";

export default {
    components: {
        JetInput,
        InertiaLink,
        JetDropdown,
        JetDropdownLink,
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
