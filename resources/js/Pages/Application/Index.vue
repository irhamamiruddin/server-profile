<template>
    <AppLayout title="Dashboard">
        <template #header> </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                        >
                            <div class="overflow-hidden">
                                <div class="m-5 flex flex-wrap gap-3">
                                    <div
                                        class="rounded-md bg-white border border-gray-200 p-5 grow"
                                    >
                                        <div class="flex flex-col">
                                            <div
                                                class="overflow-x-auto sm:-mx-6 lg:-mx-8"
                                            >
                                                <div
                                                    class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                                                >
                                                    <div
                                                        class="overflow-x-auto"
                                                    >
                                                        <table
                                                            class="min-w-full text-center"
                                                        >
                                                            <thead
                                                                class="border-b"
                                                            >
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
                                                                        Server
                                                                        Name
                                                                    </th>
                                                                    <th
                                                                        scope="col"
                                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                                    >
                                                                        Application
                                                                        Name
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
                                                                        !applications
                                                                            .data
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
                                                                        application,
                                                                        i
                                                                    ) in applications.data"
                                                                    :key="
                                                                        application
                                                                    "
                                                                    class="border-b"
                                                                >
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900"
                                                                    >
                                                                        {{
                                                                            i +
                                                                            1
                                                                        }}
                                                                    </td>
                                                                    <td
                                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                                    >
                                                                        {{
                                                                            application
                                                                                .server
                                                                                .name
                                                                        }}
                                                                    </td>
                                                                    <td
                                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                                    >
                                                                        {{
                                                                            application.name
                                                                        }}
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
                                                                        <inertia-link
                                                                            :href="
                                                                                route(
                                                                                    'applications.show',
                                                                                    application.server_id
                                                                                )
                                                                            "
                                                                            title="View"
                                                                        >
                                                                            <button
                                                                                class="inline-block px-2.5 py-2 m-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"
                                                                            >
                                                                                View
                                                                            </button>
                                                                        </inertia-link>
                                                                        <inertia-link>
                                                                            <button
                                                                                class="inline-block px-2.5 py-2 m-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                            >
                                                                                Edit
                                                                            </button>
                                                                        </inertia-link>
                                                                        <button
                                                                            @click="
                                                                                deletePost(
                                                                                    application.id
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
                                                            :links="
                                                                applications.links
                                                            "
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
        </div>
    </AppLayout>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetPagination from "@/Components/Pagination.vue";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
        JetPagination,
    },

    props: ["applications"],
};
</script>
