<template>
    <AppLayout title="Dashboard">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <div class="m-5">
                                <div
                                    class="rounded-md bg-white border border-gray-200 p-5"
                                >
                                    <div
                                        class="overflow-x-auto sm:-mx-6 lg:-mx-8"
                                    >
                                        <div
                                            class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                                        >
                                            <div class="overflow-x-auto">
                                                <div
                                                    class="text-2xl font-bold px-5 py-2"
                                                >
                                                    Search Results
                                                </div>

                                                <div
                                                    class="text-md font-semibold px-5 py-2 flex"
                                                >
                                                    <div>Applied Filters:</div>
                                                    <div
                                                        v-for="(
                                                            item, i
                                                        ) in tags"
                                                        :key="item"
                                                    >
                                                        <span
                                                            class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded"
                                                        >
                                                            {{ item[i] }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="my-3 px-3 py-2">
                                                    <JetInput
                                                        type="text"
                                                        class="block ml-2 mb-4 w-60"
                                                        v-model="form.search"
                                                        placeholder="Search"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetPagination from "@/Components/Pagination.vue";
import JetInput from "@/Jetstream/Input.vue";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";

export default {
    components: {
        AppLayout,
        JetPagination,
        JetInput,
        JetButton,
        InertiaLink,
    },

    props: ["documents", "filters"],

    data() {
        return {
            tag: ["myTntServer", "API Documentation"],
            form: {
                search: this.filters.search,
                page: this.filters.page,
            },
        };
    },

    watch: {
        "form.search": function searchPost(newVal) {
            Inertia.get(
                route("documentations.index", newVal ? { search: newVal } : {})
            );
        },
    },
};
</script>
