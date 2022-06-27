<template>
    <AppLayout title="Dashboard" :filters="filters">
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
                                                    <!-- <JetInput
                                                        type="text"
                                                        class="block ml-2 mb-4 w-60"
                                                        v-model="form.search"
                                                        placeholder="Search"
                                                    /> -->
                                                    <div
                                                        class="overflow-x-auto"
                                                    >
                                                        <table
                                                            class="min-w-full text-left"
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
                                                                    </th>
                                                                    <th
                                                                        scope="col"
                                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                                    >
                                                                        User
                                                                    </th>
                                                                    <th
                                                                        scope="col"
                                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                                    >
                                                                        Activity
                                                                    </th>
                                                                    <th
                                                                        scope="col"
                                                                        class="text-sm font-bold text-gray-900 px-6 py-4"
                                                                    >
                                                                        Date
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
                                                                        !activities
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
                                                                        activity,
                                                                        i
                                                                    ) in activities.data"
                                                                    :key="
                                                                        activity
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
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900"
                                                                    >
                                                                        {{
                                                                            activity
                                                                                .server
                                                                                .name
                                                                        }}
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-900 flex flex-nowrap px-6 py-4 whitespace-nowrap"
                                                                    >
                                                                        <div>
                                                                            <img
                                                                                class="h-10 w-10 rounded-full object-cover"
                                                                                :src="
                                                                                    activity
                                                                                        .user
                                                                                        .profile_photo_url
                                                                                "
                                                                                :alt="
                                                                                    activity
                                                                                        .user
                                                                                        .name
                                                                                "
                                                                                :title="
                                                                                    activity
                                                                                        .user
                                                                                        .name
                                                                                "
                                                                            />
                                                                        </div>
                                                                        <div
                                                                            class="px-3 grid content-center"
                                                                        >
                                                                            <div
                                                                                class="font-semibold text-sm"
                                                                            >
                                                                                {{
                                                                                    activity
                                                                                        .user
                                                                                        .name
                                                                                }}
                                                                            </div>
                                                                            <div
                                                                                class="font-light text-xs"
                                                                            >
                                                                                {{
                                                                                    activity
                                                                                        .user
                                                                                        .email
                                                                                }}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-900 px-6 py-4 whitespace-nowrap"
                                                                    >
                                                                        <div
                                                                            class="font-semibold text-sm"
                                                                        >
                                                                            {{
                                                                                activity
                                                                                    .type
                                                                                    .description
                                                                            }}
                                                                        </div>
                                                                        <div
                                                                            class="font-light text-xs"
                                                                        >
                                                                            {{
                                                                                activity
                                                                                    .type
                                                                                    .name
                                                                            }}
                                                                        </div>
                                                                    </td>
                                                                    <td
                                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                                    >
                                                                        {{
                                                                            activity.created_at
                                                                        }}
                                                                    </td>
                                                                    <td
                                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                                    >
                                                                        <inertia-link
                                                                            :href="
                                                                                route(
                                                                                    'activities.show',
                                                                                    activity.id
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
                                                                                    activity.id
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
                                                                activities.links
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
import JetInput from "@/Jetstream/Input.vue";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
        JetPagination,
        JetInput,
    },

    props: ["activities", "filters"],

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
