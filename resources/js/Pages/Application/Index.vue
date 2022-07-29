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
                                        <InertiaLink
                                            :href="route('applications.create')"
                                        >
                                            <JetButton
                                                v-if="
                                                    hasAnyPermission([
                                                        'application-create',
                                                    ])
                                                "
                                                class="float-right"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                                    />
                                                </svg>
                                                &nbsp;Create
                                            </JetButton>
                                        </InertiaLink>

                                        <div class="py-2">
                                            <JetInput
                                                type="text"
                                                class="block ml-2 mb-4 w-60"
                                                v-model="form.search"
                                                placeholder="Search"
                                            />
                                        </div>

                                        <table class="min-w-full text-center">
                                            <thead class="border-b">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                    >
                                                        No
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                    >
                                                        Server Name
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                    >
                                                        Application Name
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                    >
                                                        Status
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                    >
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-if="
                                                        !applications.data
                                                            .length
                                                    "
                                                >
                                                    <td
                                                        class="p-4 text-center text-gray-900"
                                                        colspan="5"
                                                    >
                                                        No data
                                                    </td>
                                                </tr>
                                                <tr
                                                    v-for="(
                                                        application, i
                                                    ) in applications.data"
                                                    :key="application"
                                                    class="border-b"
                                                >
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900"
                                                    >
                                                        {{ i + 1 }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        {{
                                                            application.server
                                                                .name
                                                        }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        {{ application.name }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <span
                                                            v-if="
                                                                application.status ==
                                                                'Active'
                                                            "
                                                            class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-green-500"
                                                        >
                                                            {{
                                                                application.status
                                                            }}
                                                        </span>
                                                        <span
                                                            v-else
                                                            class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-red-500"
                                                        >
                                                            {{
                                                                application.status
                                                            }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <InertiaLink
                                                            :href="
                                                                route(
                                                                    'applications.show',
                                                                    application.id
                                                                )
                                                            "
                                                            title="View"
                                                        >
                                                            <button
                                                                v-if="
                                                                    hasAnyPermission(
                                                                        [
                                                                            'application-show',
                                                                        ]
                                                                    )
                                                                "
                                                                class="inline-block px-2.5 py-2 m-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"
                                                            >
                                                                View
                                                            </button>
                                                        </InertiaLink>
                                                        <InertiaLink
                                                            :href="
                                                                route(
                                                                    'applications.edit',
                                                                    application.id
                                                                )
                                                            "
                                                        >
                                                            <button
                                                                v-if="
                                                                    hasAnyPermission(
                                                                        [
                                                                            'application-edit',
                                                                        ]
                                                                    )
                                                                "
                                                                class="inline-block px-2.5 py-2 m-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                                            >
                                                                Edit
                                                            </button>
                                                        </InertiaLink>
                                                        <button
                                                            @click="
                                                                deleteApp(
                                                                    application.id
                                                                )
                                                            "
                                                            v-if="
                                                                hasAnyPermission(
                                                                    [
                                                                        'application-delete',
                                                                    ]
                                                                )
                                                            "
                                                            class="inline-block px-2.5 py-2 m-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                        >
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <JetPagination
                                            class="m-5"
                                            :links="applications.links"
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
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetPagination from "@/Components/Pagination.vue";
import JetInput from "@/Jetstream/Input.vue";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
        JetPagination,
        JetInput,
    },

    props: ["applications", "filters"],

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
                route("applications.index", newVal ? { search: newVal } : {})
            );
        },
    },

    methods: {
        deleteApp(id) {
            const result = confirm("Confirm delete?");
            if (result) {
                Inertia.delete(route("applications.destroy", id), {
                    preserveScroll: true,
                });
            }
        },
    },
};
</script>
