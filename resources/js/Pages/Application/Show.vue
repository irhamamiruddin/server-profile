<template>
    <AppLayout title="Dashboard">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <div class="m-5 flex flex-wrap gap-3">
                                <!-- Accordian -->
                                <div
                                    class="rounded-md bg-white border border-gray-200 p-5 grow"
                                >
                                    <!-- Parent 1 -->
                                    <div
                                        v-for="detail in details"
                                        :key="detail"
                                        class="accordion-item bg-white border border-gray-200"
                                    >
                                        <h2
                                            class="accordion-header mb-0"
                                            id="parentOne"
                                        >
                                            <button
                                                class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseParentOne"
                                                aria-expanded="true"
                                                aria-controls="collapseParentOne"
                                            >
                                                Applications
                                            </button>
                                        </h2>
                                        <div
                                            id="collapseParentOne"
                                            class="accordion-collapse collapse show"
                                            aria-labelledby="parentOne"
                                        >
                                            <div
                                                class="accordion-body py-4 px-5"
                                            >
                                                <div
                                                    class="clear-right overflow-x-auto"
                                                >
                                                    <div
                                                        class="m-1 p-1 grid grid-cols-4"
                                                    >
                                                        <p
                                                            class="truncate font-bold"
                                                        >
                                                            Virtualization
                                                        </p>
                                                        <p
                                                            v-if="
                                                                detail.v_technology
                                                            "
                                                            class="col-span-3 mx-3"
                                                        >
                                                            Yes
                                                        </p>
                                                        <p
                                                            v-else
                                                            class="col-span-3 mx-3"
                                                        >
                                                            No
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="m-1 p-1 grid grid-cols-4"
                                                    >
                                                        <p
                                                            class="truncate font-bold"
                                                        >
                                                            Virtualization
                                                            Technology
                                                        </p>
                                                        <p
                                                            class="col-span-3 mx-3"
                                                        >
                                                            {{
                                                                detail.v_technology
                                                            }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="m-1 p-1 grid grid-cols-4"
                                                    >
                                                        <p
                                                            class="truncate font-bold"
                                                        >
                                                            Config File
                                                        </p>
                                                        <a
                                                            href="#"
                                                            target="_blank"
                                                            class="truncate flex col-span-3 mx-3 text-blue-600 hover:text-gray-700 transition duration-300 ease-in-out mb-4"
                                                        >
                                                            {{
                                                                detail.config_file
                                                            }}
                                                            &nbsp;
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
                                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                                                />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div
                                                        class="accordion-item bg-white border border-gray-200"
                                                        v-for="application in applications"
                                                        :key="application"
                                                    >
                                                        <h2
                                                            class="accordion-header mb-0"
                                                            :id="
                                                                'child' +
                                                                application.id
                                                            "
                                                        >
                                                            <button
                                                                class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                                type="button"
                                                                data-bs-toggle="collapse"
                                                                :data-bs-target="
                                                                    '#collapseChild' +
                                                                    application.id
                                                                "
                                                                aria-expanded="false"
                                                                :aria-controls="
                                                                    'collapseChild' +
                                                                    application.id
                                                                "
                                                            >
                                                                {{
                                                                    application.name
                                                                }}
                                                            </button>
                                                        </h2>
                                                        <div
                                                            :id="
                                                                'collapseChild' +
                                                                application.id
                                                            "
                                                            class="accordion-collapse collapse"
                                                            :class="{
                                                                show:
                                                                    id ==
                                                                    application.id,
                                                            }"
                                                            :aria-labelledby="
                                                                'child' +
                                                                application.id
                                                            "
                                                        >
                                                            <div
                                                                class="accordion-body py-4 px-5"
                                                            >
                                                                <div
                                                                    class="m-2 grid grid-cols-4"
                                                                >
                                                                    <p>Name</p>
                                                                    <p
                                                                        class="col-span-3"
                                                                    >
                                                                        {{
                                                                            application.description
                                                                        }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="m-2 grid grid-cols-4"
                                                                >
                                                                    <p>
                                                                        Version
                                                                        / Tag
                                                                    </p>
                                                                    <div
                                                                        class="col-span-3"
                                                                    >
                                                                        <p>
                                                                            {{
                                                                                application.version
                                                                            }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="m-2 grid grid-cols-4"
                                                                >
                                                                    <p>
                                                                        Exposed
                                                                        Port(s)
                                                                    </p>
                                                                    <p
                                                                        class="col-span-3"
                                                                    >
                                                                        {{
                                                                            application.ports
                                                                        }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="m-2 grid grid-cols-4"
                                                                >
                                                                    <p>
                                                                        Status
                                                                    </p>
                                                                    <p
                                                                        class="col-span-3"
                                                                    >
                                                                        {{
                                                                            application.status
                                                                        }}
                                                                        ({{
                                                                            application.health_status
                                                                        }}
                                                                        {{
                                                                            application.health_last_checked
                                                                        }})
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

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
    },

    props: ["id", "applications", "details", "filters"],
};
</script>
