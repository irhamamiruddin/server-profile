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
                                    <div
                                        class="overflow-x-auto sm:-mx-6 lg:-mx-8"
                                    >
                                        <div
                                            class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                                        >
                                            <div class="overflow-x-auto">
                                                <inertia-link
                                                    :href="route('users.index')"
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

                                                        <!-- Username -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="username"
                                                                value="Username"
                                                            />
                                                            <JetInput
                                                                id="username"
                                                                v-model="
                                                                    form.username
                                                                "
                                                                type="text"
                                                                class="mt-1 block w-full"
                                                                autocomplete="username"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .username
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Email -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="email"
                                                                value="Email"
                                                            />
                                                            <JetInput
                                                                id="email"
                                                                v-model="
                                                                    form.email
                                                                "
                                                                type="email"
                                                                class="mt-1 block w-full"
                                                                autocomplete="email"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .email
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Password -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="password"
                                                                value="Password"
                                                            />
                                                            <JetInput
                                                                id="password"
                                                                v-model="
                                                                    form.password
                                                                "
                                                                type="password"
                                                                class="mt-1 block w-full"
                                                                required
                                                                autocomplete="new-password"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .password
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <!-- Confirm Password -->
                                                        <div
                                                            class="col-span-6 sm:col-span-4 mb-4"
                                                        >
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="confirm_password"
                                                                value="Confirm Password"
                                                            />
                                                            <JetInput
                                                                id="confirm_password"
                                                                v-model="
                                                                    form.confirm_password
                                                                "
                                                                type="password"
                                                                class="mt-1 block w-full"
                                                                required
                                                                autocomplete="new-password"
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .confirm_password
                                                                "
                                                                class="mt-2"
                                                            />
                                                        </div>

                                                        <div>
                                                            <JetLabel
                                                                class="font-bold"
                                                                for="roles"
                                                                value="Roles"
                                                            />
                                                            <Multiselect
                                                                v-model="
                                                                    form.roles
                                                                "
                                                                mode="tags"
                                                                :multiple="true"
                                                                :close-on-select="
                                                                    false
                                                                "
                                                                :options="
                                                                    options
                                                                "
                                                            />
                                                            <JetInputError
                                                                :message="
                                                                    $page.props
                                                                        .errors
                                                                        .roles
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
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetActionMessage from "@/Jetstream/ActionMessage.vue";
import Multiselect from "@vueform/multiselect";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
        JetActionMessage,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        Multiselect,
    },

    props: ["roles"],

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                confirm_password: null,
                roles: [],
            },

            options: this.roles,
        };
    },

    methods: {
        createUser(form) {
            Inertia.post(route("users.store", form));
        },
    },
};
</script>
