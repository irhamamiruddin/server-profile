<template>
    <AppLayout title="Dashboard">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <div class="m-5">
                                <div
                                    class="rounded-md bg-white border border-gray-200 p-5"
                                >
                                    <div class="overflow-x-auto">
                                        <div
                                            class="text-2xl font-bold px-5 py-2"
                                        >
                                            Documentations
                                        </div>
                                        <div class="my-3 px-3 py-2">
                                            <JetInput
                                                type="text"
                                                class="block ml-2 mb-4 w-60"
                                                v-model="form.search"
                                                placeholder="Search Documents..."
                                            />
                                        </div>
                                        <div class="px-5">
                                            <div v-if="!documents.data.length">
                                                <div
                                                    class="p-4 text-center text-gray-900"
                                                >
                                                    No Documentation
                                                </div>
                                            </div>
                                            <div
                                                v-for="(
                                                    document, i
                                                ) in documents.data"
                                                :key="document"
                                                class="flex flex-nowrap border border-gray-300 rounded-md my-3 px-5"
                                            >
                                                <div
                                                    class="text-center grid content-center"
                                                >
                                                    {{ i + 1 }}
                                                </div>
                                                <div
                                                    class="grow flex flex-nowrap col-span-3 px-6 py-4 text-gray-900"
                                                >
                                                    <div>
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-10 w-10 fill-gray-800"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                                clip-rule="evenodd"
                                                            />
                                                        </svg>
                                                    </div>
                                                    <div
                                                        class="px-3 grid content-center"
                                                    >
                                                        <div
                                                            class="font-semibold text-sm"
                                                        >
                                                            {{ document.name }}
                                                        </div>
                                                        <div
                                                            class="font-light text-xs"
                                                        >
                                                            {{
                                                                document.created_at
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="basis-1/3 px-6 py-2 grid content-center"
                                                >
                                                    {{ document.server.name }}
                                                </div>

                                                <div
                                                    class="grid content-center"
                                                >
                                                    <a
                                                        :href="
                                                            route(
                                                                'documentations.show',
                                                                document.id
                                                            )
                                                        "
                                                        title="Open Document"
                                                        target="_blank"
                                                    >
                                                        <JetButton
                                                            v-if="
                                                                hasAnyPermission(
                                                                    [
                                                                        'documentation-show',
                                                                    ]
                                                                )
                                                            "
                                                            class="place-content-center"
                                                            type="'button'"
                                                        >
                                                            View
                                                        </JetButton>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <JetPagination
                                            class="m-5"
                                            :links="documents.links"
                                        />
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

    props: ["documents", "filters", "isMember"],

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
                route("documentations.index", newVal ? { search: newVal } : {})
            );
        },
    },
};
</script>
