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
                                    <div class="overflow-x-auto">
                                        <div>
                                            <inertia-link
                                                :href="route('users.index')"
                                            >
                                                <JetButton class="float-right">
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
                                                            d="M11 17l-5-5m0 0l5-5m-5 5h12"
                                                        />
                                                    </svg>
                                                    &nbsp;Back
                                                </JetButton>
                                            </inertia-link>
                                        </div>
                                        <div class="px-6 py-4">
                                            <p
                                                class="card-text mb-2 text-lg font-semibold"
                                            >
                                                Name : {{ user.name }}
                                            </p>
                                            <p
                                                class="card-text mb-2 text-lg font-semibold"
                                            >
                                                Email : {{ user.email }}
                                            </p>
                                            <p
                                                class="card-text mb-2 text-lg font-semibold"
                                            >
                                                Roles :
                                                <span
                                                    v-for="role in user.roles"
                                                    :key="role"
                                                    class="text-xs inline-block py-1 px-2.5 mx-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded"
                                                >
                                                    <label class="text-sm">{{
                                                        role.name
                                                    }}</label>
                                                </span>
                                            </p>
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
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";

export default {
    components: {
        AppLayout,
        InertiaLink,
        JetButton,
    },

    props: ["user"],
};
</script>
