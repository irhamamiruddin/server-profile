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
                                                        :message="errors.name"
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
                                                            errors.description
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
                                                            errors.server_id
                                                        "
                                                        class="mt-2"
                                                    />
                                                </div>

                                                <JetButton
                                                    :type="'button'"
                                                    class="float-right bg-blue-500 hover:bg-blue-600 active:bg-blue-700 mt-3"
                                                    @click="update(form)"
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

    props: ["servers", "server", "application"],

    data() {
        return {
            form: {
                name: this.application.name,
                description: this.application.description,
                version: this.application.version,
                ports: this.application.ports,
                status: this.application.status,
                health_status: this.application.health_status,
                server: this.server.name,
            },
            server_name: this.servers,
        };
    },

    methods: {
        update(form) {
            Inertia.patch(
                route("applications.update", this.application.id),
                form
            );
        },
    },
};
</script>
