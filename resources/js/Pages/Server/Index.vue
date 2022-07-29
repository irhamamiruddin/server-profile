<template>
    <AppLayout title="Dashboard">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="overflow-x-auto">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <div
                                v-if="$page.props.flash.message"
                                class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full"
                                role="alert"
                            >
                                <svg
                                    aria-hidden="true"
                                    focusable="false"
                                    data-prefix="fas"
                                    data-icon="check-circle"
                                    class="w-4 h-4 mr-2 fill-current"
                                    role="img"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                                    ></path>
                                </svg>
                                {{ $page.props.flash.message }}
                            </div>
                            <!-- <div
                                v-if="$hasErrors"
                                class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full"
                                role="alert"
                            >
                                <svg
                                    aria-hidden="true"
                                    focusable="false"
                                    data-prefix="fas"
                                    data-icon="times-circle"
                                    class="w-4 h-4 mr-2 fill-current"
                                    role="img"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"
                                    ></path>
                                </svg>
                                <div v-for="(error, key) in errors" :key="key">
                                    {{ error }}
                                </div>
                            </div> -->
                            <div class="m-5 flex flex-wrap gap-3">
                                <div
                                    class="rounded-md bg-white border border-gray-200 p-5 grow"
                                >
                                    <InertiaLink
                                        :href="route('servers.create')"
                                    >
                                        <JetButton
                                            v-if="
                                                hasAnyPermission([
                                                    'server-create',
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

                                    <!-- Table -->

                                    <div class="overflow-x-auto">
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
                                                        Name
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                    >
                                                        Domain
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
                                                <tr v-if="!servers.data.length">
                                                    <td
                                                        class="p-4 text-center text-gray-900"
                                                        colspan="5"
                                                    >
                                                        No data
                                                    </td>
                                                </tr>
                                                <tr
                                                    v-for="(
                                                        server, i
                                                    ) in servers.data"
                                                    :key="server"
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
                                                        {{ server.name }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        {{ server.domain }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <span
                                                            v-if="
                                                                server.status ==
                                                                'Active'
                                                            "
                                                            class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-green-500"
                                                        >
                                                            {{ server.status }}
                                                        </span>
                                                        <span
                                                            v-else
                                                            class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-red-500"
                                                        >
                                                            {{ server.status }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <InertiaLink
                                                            :href="
                                                                route(
                                                                    'servers.show',
                                                                    server.id
                                                                )
                                                            "
                                                        >
                                                            <button
                                                                v-if="
                                                                    hasAnyPermission(
                                                                        [
                                                                            'server-show',
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
                                                                    'servers.edit',
                                                                    server.id
                                                                )
                                                            "
                                                        >
                                                            <button
                                                                v-if="
                                                                    hasAnyPermission(
                                                                        [
                                                                            'server-edit',
                                                                        ]
                                                                    )
                                                                "
                                                                class="inline-block px-2.5 py-2 m-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                                            >
                                                                Edit
                                                            </button>
                                                        </InertiaLink>

                                                        <InertiaLink
                                                            v-if="
                                                                !server.deleted_at
                                                            "
                                                        >
                                                            <button
                                                                class="inline-block px-2.5 py-2 m-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                v-if="
                                                                    hasAnyPermission(
                                                                        [
                                                                            'server-delete',
                                                                        ]
                                                                    )
                                                                "
                                                                @click="
                                                                    deleteServer(
                                                                        server.id
                                                                    )
                                                                "
                                                            >
                                                                Delete
                                                            </button>
                                                        </InertiaLink>
                                                        <InertiaLink v-else>
                                                            <button
                                                                class="inline-block px-2.5 py-2 m-1 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-900 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                v-if="
                                                                    hasAnyPermission(
                                                                        [
                                                                            'server-delete',
                                                                        ]
                                                                    )
                                                                "
                                                                @click="
                                                                    restore(
                                                                        server.id
                                                                    )
                                                                "
                                                            >
                                                                Restore
                                                            </button>
                                                        </InertiaLink>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <JetPagination
                                            class="m-5"
                                            :links="servers.links"
                                        />
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col gap-3">
                                        <ActivityList
                                            :activities="activities"
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
import ActivityList from "@/Pages/ActivityList.vue";
import JetInput from "@/Jetstream/Input.vue";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
        JetPagination,
        ActivityList,
        JetInput,
    },

    props: ["servers", "activities", "filters"],

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
                route("servers.index", newVal ? { search: newVal } : {})
            );
        },
    },

    methods: {
        deleteServer(id) {
            const result = confirm("Confirm delete?");
            if (result) {
                Inertia.delete(route("servers.destroy", id), {
                    preserveScroll: true,
                });
            }
        },

        restore(id) {
            const result = confirm("Confirm restore?");
            if (result) {
                Inertia.post(route("servers.restore", id), {
                    preserveScroll: true,
                });
            }
        },
    },
};
</script>
