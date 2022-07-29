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
                                                            errors.name
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
                                                        for="name"
                                                        value="Domain"
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
                                                            errors.name
                                                        "
                                                        class="mt-2"
                                                    />
                                                </div>

                                                <!-- V tech -->
                                                <div
                                                    class="col-span-6 sm:col-span-4 mb-4"
                                                >
                                                    <table
                                                        class="min-w-full border-separate"
                                                    >
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                >
                                                                    Virtualization
                                                                    Technology
                                                                </th>
                                                                <th
                                                                    class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                >
                                                                    Config File
                                                                    Url
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr
                                                                v-for="(
                                                                    v_tech,
                                                                    index
                                                                ) in form.v_tech"
                                                                :key="index"
                                                            >
                                                                <td>
                                                                    <JetInput
                                                                        id="v_tech"
                                                                        v-model="
                                                                            form.v_technology
                                                                        "
                                                                        type="text"
                                                                        class="mt-1 block w-full"
                                                                        autocomplete="v_tech"
                                                                    />
                                                                    <JetInputError
                                                                        :message="
                                                                            $page
                                                                                .props
                                                                                .errors
                                                                                .v_technology
                                                                        "
                                                                        class="mt-2"
                                                                    />
                                                                </td>
                                                                <td>
                                                                    <JetInput
                                                                        id="config_file"
                                                                        v-model="
                                                                            form.config_file
                                                                        "
                                                                        type="text"
                                                                        class="mt-1 block w-full"
                                                                        autocomplete="config_file"
                                                                    />

                                                                    <JetInputError
                                                                        :message="
                                                                            $page
                                                                                .props
                                                                                .errors
                                                                                .config_file
                                                                        "
                                                                        class="mt-2"
                                                                    />
                                                                </td>
                                                                <td
                                                                    class="w-12"
                                                                    v-show="
                                                                        index !=
                                                                        0
                                                                    "
                                                                >
                                                                    <button
                                                                        type="button"
                                                                        class="inline-block px-2.5 py-2 w-full bg-red-600 grid place-content-center text-white font-medium leading-tight uppercase rounded-md shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                        @click="
                                                                            remove(
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
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <button
                                                        type="button"
                                                        @click="add()"
                                                        class="grid place-content-center px-2.5 py-1.5 w-full mt-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg focus:bg-blue-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
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
                                                            errors
                                                                .description
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
                                                                form.version
                                                            "
                                                            type="number"
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
                                                        class="col-span-6 sm:col-span-4 mb-4 grow"
                                                    >
                                                        <JetLabel
                                                            class="font-bold"
                                                            for="port"
                                                            value="Port"
                                                        />
                                                        <JetInput
                                                            id="port"
                                                            v-model="form.ports"
                                                            type="number"
                                                            class="mt-1 block w-full"
                                                            required
                                                            autocomplete="port"
                                                        />
                                                        <JetInputError
                                                            :message="
                                                                $page.props
                                                                    .errors
                                                                    .ports
                                                            "
                                                            class="mt-2"
                                                        />
                                                    </div>

                                                    <!-- Status -->
                                                    <div
                                                        class="col-span-6 sm:col-span-4 mb-4 w-32"
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
                                                                form.status
                                                            "
                                                            :options="[
                                                                'Active',
                                                                'Inactive',
                                                            ]"
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
                                                                $page.props
                                                                    .errors
                                                                    .status
                                                            "
                                                            class="mt-2"
                                                        />
                                                    </div>

                                                    <!-- Health Status -->
                                                    <div
                                                        class="col-span-6 sm:col-span-4 mb-4 w-32"
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
                                                                form.health_status
                                                            "
                                                            :options="[
                                                                'Up',
                                                                'Down',
                                                            ]"
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
                                                                $page.props
                                                                    .errors
                                                                    .health_status
                                                            "
                                                            class="mt-2"
                                                        />
                                                    </div>
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
                                                            errors
                                                                .server_id
                                                        "
                                                        class="mt-2"
                                                    />
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
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetInput from "@/Jetstream/Input.vue";
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
    },

    props: ["servers"],

    data() {
        return {
            form: {
                name: null,
                domain: null,
                v_tech: [
                    {
                        name: null,
                        config_file: null,
                    },
                ],
                description: null,
                version: null,
                ports: null,
                status: null,
                health_status: null,
                server: null,
            },
            server_name: this.servers,
        };
    },

    methods: {
        createUser(form) {
            Inertia.post(route("applications.store", form));
        },

        add() {
            this.form.v_tech.push({});
        },
        remove(index) {
            this.form.v_tech.splice(index, 1);
        },
    },
};
</script>
