<template>
    <AppLayout>
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
                                                <inertia-link
                                                    :href="
                                                        route(
                                                            'applications.index'
                                                        )
                                                    "
                                                >
                                                    <JetButton
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
                                                                d="M11 17l-5-5m0 0l5-5m-5 5h12"
                                                            />
                                                        </svg>
                                                        &nbsp;Back
                                                    </JetButton>
                                                </inertia-link>

                                                <div class="clear-right">
                                                    <form>
                                                        <!-- Name -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="name"
                                                                value="Name"
                                                            />
                                                            <JetInput
                                                                id="name"
                                                                v-model="
                                                                    form.name
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                autocomplete="name"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .name
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Desc -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="description"
                                                                value="Description"
                                                            />
                                                            <JetInput
                                                                id="description"
                                                                v-model="
                                                                    form.description
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                autocomplete="description"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .description
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Version -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="version"
                                                                value="Version / Tag"
                                                            />
                                                            <JetInput
                                                                id="version"
                                                                v-model="
                                                                    form.version
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                autocomplete="version"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .version
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Ports -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="port"
                                                                value="Port"
                                                            />
                                                            <JetInput
                                                                id="port"
                                                                v-model="
                                                                    form.port
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                required
                                                                autocomplete="port"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .port
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Status -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="status"
                                                                value="Status"
                                                            />

                                                            <JetInput
                                                                id="status"
                                                                v-model="
                                                                    form.status
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                required
                                                                autocomplete="status"
                                                            />

                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .status
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Health Status -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="health_status"
                                                                value="Health Status"
                                                            />

                                                            <!-- <Select
                                                                :options="
                                                                    healthStatus
                                                                "
                                                                :modelValue="
                                                                    form.health_status
                                                                "
                                                            /> -->

                                                            <JetInput
                                                                id="health_status"
                                                                v-model="
                                                                    form.health_status
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                required
                                                                autocomplete="health_status"
                                                            />

                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .health_status
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Server -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="server"
                                                                value="Server"
                                                            />

                                                            <JetInput
                                                                id="server"
                                                                v-model="
                                                                    form.server
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                required
                                                                autocomplete="server"
                                                            />

                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .server
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <JetButton
                                                            :type="'button'"
                                                            class="float-right bg-blue-500 hover:bg-blue-600 active:bg-blue-700 mt-3"
                                                            @click="
                                                                createUser(form)
                                                            "
                                                        >
                                                            Save
                                                        </JetButton>
                                                    </form>
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
import JetInput from "@/Jetstream/Input.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";
import Select from "@/Components/Select.vue";

export default {
    components: {
        AppLayout,
        JetInput,
        JetButton,
        JetLabel,
        Select,
    },

    props: [],

    data() {
        return {
            form: {
                name: null,
                description: null,
                version: null,
                port: null,
                status: null,
                health_status: null,
            },

            status: ["Active", "Inactive"],
            healthStatus: ["Up", "Down"],
        };
    },

    methods: {
        createUser(form) {
            Inertia.post(route("applications.store", form));
        },
    },
};
</script>
