<template>
    <JetDropdown align="right" width="72">
        <template #trigger>
            <JetInput
                type="text"
                class="block w-auto"
                placeholder="Search"
                v-model="form.search"
            />
        </template>

        <template #content>
            <div class="border-b-2 hover:bg-gray-100 px-2 py-1">
                <JetDropdownLink :href="route('profile.show')">
                    Item 1
                </JetDropdownLink>
            </div>
            <!-- <div class="border-b hover:bg-gray-100 px-2 py-1">
                <JetDropdownLink :href="route('profile.show')">
                    Item 2
                </JetDropdownLink>
            </div>
            <div class="border-b hover:bg-gray-100 px-2 py-1">
                <JetDropdownLink :href="route('profile.show')">
                    Item 3
                </JetDropdownLink>
            </div> -->
            <inertia-link :href="route('search.result')">
                <div
                    class="pt-3 font-light text-sm text-center text-gray-700 hover:text-blue-500"
                >
                    More results
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
