<template>
    <AppLayout title="Create Application">
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
                                        <InertiaLink
                                            :href="route('applications.index')"
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
                                        </InertiaLink>

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
                                                        v-model="form.name"
                                                        type="text"
                                                        class="mt-1 block w-full"
                                                        autocomplete="name"
                                                    />
                                                    <JetInputError
                                                        :message="
                                                            $page.props.errors
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
                                                        value="Domain"
                                                    />
                                                    <JetInput
                                                        id="domain"
                                                        v-model="form.domain"
                                                        type="text"
                                                        class="mt-1 block w-full"
                                                        autocomplete="domain"
                                                    />
                                                    <JetInputError
                                                        :message="
                                                            $page.props.errors
                                                                .domain
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

                                                    <Multiselect
                                                        id="server"
                                                        v-model="form.server"
                                                        mode="single"
                                                        :options="server_name"
                                                        :searchable="false"
                                                        :classes="{
                                                            container:
                                                                'relative w-full mt-1 flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                                            containerActive:
                                                                'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                                            optionSelected:
                                                                'text-white bg-gray-800',
                                                            optionSelectedPointed:
                                                                'text-white bg-gray-800 opacity-90',
                                                            spacer: 'h-10 box-content',
                                                        }"
                                                    />

                                                    <JetInputError
                                                        :message="
                                                            $page.props.errors
                                                                .server
                                                        "
                                                        class="mt-2"
                                                    />
                                                </div>

                                                <!-- V tech -->
                                                <div
                                                    class="col-span-6 sm:col-span-4 mb-4"
                                                >
                                                    <JetLabel
                                                        class="font-bold"
                                                        for="v-tech"
                                                        value="Virtualization Technology"
                                                    />
                                                    <JetInput
                                                        id="v-tech"
                                                        v-model="form.v_tech"
                                                        type="text"
                                                        class="mt-1 block w-full"
                                                        autocomplete="v-tech"
                                                    />
                                                    <JetInputError
                                                        :message="
                                                            $page.props.errors
                                                                .v_tech
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

                                                    <Multiselect
                                                        mode="single"
                                                        v-model="form.status"
                                                        :options="[
                                                            'Active',
                                                            'Inactive',
                                                        ]"
                                                        :searchable="false"
                                                        :classes="{
                                                            container:
                                                                'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm mt-1 block w-full',
                                                            containerActive:
                                                                'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                                            optionSelected:
                                                                'text-white bg-gray-800',
                                                            optionSelectedPointed:
                                                                'text-white bg-gray-800 opacity-90',
                                                            spacer: 'h-10 py-px box-content',
                                                        }"
                                                    />

                                                    <JetInputError
                                                        :message="
                                                            $page.props.errors
                                                                .status
                                                        "
                                                        class="mt-2"
                                                    />
                                                </div>

                                                <!-- Config File -->
                                                <JetLabel
                                                    class="font-bold"
                                                    for="config_file"
                                                    value="Config Files Url"
                                                />
                                                <div
                                                    class="flex flex-wrap gap-1"
                                                >
                                                    <div
                                                        v-for="(
                                                            file, index
                                                        ) in form.config_file"
                                                        :key="index"
                                                        class="flex flex-wrap"
                                                    >
                                                        <div>
                                                            <JetInput
                                                                id="config_file"
                                                                v-model="
                                                                    file.url
                                                                "
                                                                type="text"
                                                                class="block w-full rounded-r-none"
                                                                autocomplete="config_file"
                                                            />
                                                        </div>

                                                        <div>
                                                            <button
                                                                type="button"
                                                                class="px-2.5 py-1.5 h-full bg-red-600 text-white leading-tight rounded-md rounded-l-none shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                @click="
                                                                    removeConfig(
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke="currentColor"
                                                                    stroke-width="2"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M20 12H4"
                                                                    />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        @click="addConfig()"
                                                        class="px-2.5 py-1.5 bg-blue-600 text-white leading-tight text-xs rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M12 4v16m8-8H4"
                                                            />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <JetInputError
                                                    :message="
                                                        $page.props.errors
                                                            .config_file
                                                    "
                                                    class="mt-2"
                                                />

                                                <div
                                                    class="rounded-md border border-indigo-300 p-5 my-5"
                                                    v-for="(
                                                        worker, index
                                                    ) in form.workers"
                                                    :key="index"
                                                >
                                                    <button
                                                        v-show="index != 0"
                                                        type="button"
                                                        @click="removeWorker()"
                                                        class="items-center float-right grid place-content-center px-2.5 py-1.5 w-16 mt-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-md shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M20 12H4"
                                                            />
                                                        </svg>
                                                    </button>

                                                    <!-- Worker Name -->
                                                    <div
                                                        class="clear-right col-span-6 sm:col-span-4 mb-4"
                                                    >
                                                        <JetLabel
                                                            class="font-bold"
                                                            for="worker_name"
                                                            value="Worker Name"
                                                        />
                                                        <JetInput
                                                            id="worker_name"
                                                            v-model="
                                                                worker.name
                                                            "
                                                            type="text"
                                                            class="mt-1 block w-full"
                                                            autocomplete="worker_name"
                                                        />
                                                        <JetInputError
                                                            :message="
                                                                $page.props
                                                                    .errors
                                                                    .workers
                                                            "
                                                            class="mt-2"
                                                        />
                                                    </div>

                                                    <div
                                                        class="flex flex-wrap gap-2"
                                                    >
                                                        <!-- Version -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4 grow"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="version"
                                                                value="Version / Tag"
                                                            />
                                                            <JetInput
                                                                id="version"
                                                                v-model="
                                                                    worker.version
                                                                "
                                                                type="number"
                                                                class="mt-1 block w-full"
                                                                autocomplete="version"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .workers
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Status -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4 w-64"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="status"
                                                                value="Status"
                                                            />

                                                            <Multiselect
                                                                id="status"
                                                                mode="single"
                                                                v-model="
                                                                    worker.status
                                                                "
                                                                :options="[
                                                                    'Active',
                                                                    'Inactive',
                                                                ]"
                                                                :searchable="
                                                                    false
                                                                "
                                                                :classes="{
                                                                    container:
                                                                        'relative w-full mt-1 flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                                                    containerActive:
                                                                        'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                                                    optionSelected:
                                                                        'text-white bg-gray-800',
                                                                    optionSelectedPointed:
                                                                        'text-white bg-gray-800 opacity-90',
                                                                    spacer: 'h-10 box-content',
                                                                }"
                                                            />

                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .workers
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Health Status -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4 w-64"
                                                        >
                                                            <JetLabel
                                                                class="truncate font-bold"
                                                                for="health_status"
                                                                value="Health Status"
                                                            />

                                                            <Multiselect
                                                                id="health_status"
                                                                mode="single"
                                                                v-model="
                                                                    worker.health_status
                                                                "
                                                                :options="[
                                                                    'Up',
                                                                    'Down',
                                                                ]"
                                                                :searchable="
                                                                    false
                                                                "
                                                                :classes="{
                                                                    container:
                                                                        'relative w-full mt-1 flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                                                    containerActive:
                                                                        'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                                                    optionSelected:
                                                                        'text-white bg-gray-800',
                                                                    optionSelectedPointed:
                                                                        'text-white bg-gray-800 opacity-90',
                                                                    spacer: 'h-10 box-content',
                                                                }"
                                                            />

                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .workers
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>
                                                    </div>

                                                    <JetLabel
                                                        class="font-bold"
                                                        for="port_no"
                                                        value="Ports"
                                                    />
                                                    <div
                                                        class="flex flex-wrap gap-1"
                                                    >
                                                        <div
                                                            v-for="(
                                                                port, i
                                                            ) in worker.ports"
                                                            :key="i"
                                                            class="flex flex-wrap"
                                                        >
                                                            <!-- <div>
                                                                <JetInput
                                                                    id="port_no"
                                                                    v-model="
                                                                        port.no
                                                                    "
                                                                    type="text"
                                                                    class="block w-32 rounded-r-none"
                                                                    autocomplete="port_no"
                                                                />
                                                            </div> -->

                                                            <div>
                                                                <button
                                                                    type="button"
                                                                    class="px-2.5 py-1.5 h-full bg-red-600 text-white leading-tight rounded-md rounded-l-none shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                    @click="
                                                                        removePort(
                                                                            i
                                                                        )
                                                                    "
                                                                >
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6"
                                                                        fill="none"
                                                                        viewBox="0 0 24 24"
                                                                        stroke="currentColor"
                                                                        stroke-width="2"
                                                                    >
                                                                        <path
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M20 12H4"
                                                                        />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            @click="addPort()"
                                                            class="px-2.5 py-1.5 bg-blue-600 text-white leading-tight text-xs rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                                        >
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                stroke-width="2"
                                                            >
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M12 4v16m8-8H4"
                                                                />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <JetInputError
                                                        :message="
                                                            $page.props.errors
                                                                .worker
                                                        "
                                                        class="mt-2"
                                                    />
                                                </div>
                                                <button
                                                    type="button"
                                                    @click="addWorker()"
                                                    class="inline-flex items-center place-content-center px-2.5 py-1.5 w-full mt-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M12 4v16m8-8H4"
                                                        />
                                                    </svg>
                                                    &nbsp;Add Worker
                                                </button>

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
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";
import Select from "@/Components/Select.vue";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Multiselect from "@vueform/multiselect";

export default {
    components: {
        AppLayout,
        JetInput,
        JetButton,
        JetLabel,
        Select,
        InertiaLink,
        Multiselect,
        JetInputError,
    },

    props: ["servers"],

    data() {
        return {
            form: {
                name: null,
                domain: null,
                server: null,
                v_tech: null,
                status: null,
                config_file: [
                    {
                        url: null,
                    },
                ],
                workers: [
                    {
                        name: null,
                        version: null,
                        // ports: [
                        //     {
                        //         no: null,
                        //     },
                        // ],
                        health_status: null,
                        status: null,
                    },
                ],
            },
            server_name: this.servers,
        };
    },

    methods: {
        createUser(form) {
            Inertia.post(route("applications.store", form));
        },

        addConfig() {
            this.form.config_file.push({
                url: null,
            });
        },

        removeConfig(index) {
            this.form.config_file.splice(index, 1);
        },

        addWorker() {
            this.form.workers.push({
                name: null,
                version: null,
                ports: [
                    {
                        no: null,
                    },
                ],
                health_status: null,
                status: null,
            });
        },

        removeWorker(index) {
            this.form.workers.splice(index, 1);
        },

        addPort() {
            worker.ports.push({
                no: null,
            });
        },

        removePort(index) {
            this.ports.splice(index, 1);
        },
    },
};
</script>
