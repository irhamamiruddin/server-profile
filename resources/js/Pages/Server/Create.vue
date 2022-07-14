<template>
    <AppLayout title="Dashboard">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden m-5">
                            <div
                                class="rounded-md bg-white border border-gray-200 p-5"
                            >
                                <div class="overflow-x-auto">
                                    <InertiaLink :href="route('servers.index')">
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
                                    </InertiaLink>

                                    <div class="clear-right py-5">
                                        <form>
                                            <div>
                                                <!-- Server Info -->
                                                <div
                                                    class="accordion-item bg-white border border-gray-200"
                                                >
                                                    <h2
                                                        class="flex accordion-header mb-0"
                                                        id="project"
                                                    >
                                                        <button
                                                            class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseServerInfo"
                                                            aria-expanded="true"
                                                            aria-controls="collapseServerInfo"
                                                        >
                                                            Server Information
                                                        </button>
                                                    </h2>
                                                    <div
                                                        id="collapseServerInfo"
                                                        class="accordion-collapse collapse show"
                                                        aria-labelledby="serverInfo"
                                                    >
                                                        <div
                                                            class="accordion-body py-4 px-5"
                                                        >
                                                            <!-- Server Name -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="name"
                                                                    value="Server Name"
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
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .name
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- Domain -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="domain"
                                                                    value="Server Domain"
                                                                />
                                                                <JetInput
                                                                    id="domain"
                                                                    v-model="
                                                                        form.domain
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="domain"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .domain
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- Server Environment -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="environment"
                                                                    value="Server Environment"
                                                                />
                                                                <JetInput
                                                                    id="environment"
                                                                    v-model="
                                                                        form.environment
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="environment"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .environment
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- IP Address -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="ip_address"
                                                                    value="Server IP Adress"
                                                                />
                                                                <JetInput
                                                                    id="ip_address"
                                                                    v-model="
                                                                        form.ip_address
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="ip_address"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .ip_address
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- Port -->
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
                                                                    autocomplete="port"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .port
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- DNS -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="dns"
                                                                    value="DNS"
                                                                />
                                                                <JetInput
                                                                    id="dns"
                                                                    v-model="
                                                                        form.dns
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="dns"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .dns
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
                                                                    autocomplete="status"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .status
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Hardware Specifications -->
                                                <div
                                                    class="accordion-item bg-white border border-gray-200"
                                                >
                                                    <h2
                                                        class="accordion-header mb-0"
                                                        id="hardwareSpecs"
                                                    >
                                                        <button
                                                            class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseHardwareSpecs"
                                                            aria-expanded="false"
                                                            aria-controls="collapseHardwareSpecs"
                                                        >
                                                            Hardware
                                                            Specifications
                                                        </button>
                                                    </h2>
                                                    <div
                                                        id="collapseHardwareSpecs"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="hardwareSpecs"
                                                    >
                                                        <div
                                                            class="accordion-body py-4 px-5"
                                                        >
                                                            <!-- OS Name -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="operating_system"
                                                                    value="Operating System"
                                                                />
                                                                <JetInput
                                                                    id="operating_system"
                                                                    v-model="
                                                                        form.operating_system
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="operating_system"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .operating_system
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- vcpu -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="vcpu_amount"
                                                                    value="Number of vCPUs"
                                                                />
                                                                <JetInput
                                                                    id="vcpu_amount"
                                                                    v-model="
                                                                        form.vcpu_amount
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="vcpu_amount"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .vcpu_amount
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>

                                                            <!-- Memory Size -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="memory"
                                                                    value="Memory Size"
                                                                />
                                                                <JetInput
                                                                    id="memory"
                                                                    v-model="
                                                                        form.memory
                                                                    "
                                                                    type="text"
                                                                    class="mt-1 block w-full"
                                                                    autocomplete="memory"
                                                                />
                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .memory
                                                                    "
                                                                    class="mt-2"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <JetButton
                                                :type="'button'"
                                                class="float-right bg-blue-500 hover:bg-blue-600 active:bg-blue-700 mt-3"
                                                @click="createUser(form)"
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
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        AppLayout,
        JetInput,
        JetButton,
        JetLabel,
        InertiaLink,
    },

    props: [],

    data() {
        return {
            form: {
                name: null,
                domain: null,
                environment: null,
                ip_address: null,
                port: null,
                dns: null,
                status: null,
                operating_system: null,
                vcpu_amount: null,
                memory: null,
            },
        };
    },

    methods: {
        createUser(form) {
            Inertia.post(route("servers.store", form));
        },
    },
};
</script>
