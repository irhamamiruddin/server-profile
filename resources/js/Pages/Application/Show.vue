<template>
    <AppLayout title="Dashboard">
        <template #header> </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                        >
                            <div class="overflow-hidden">
                                <div class="m-5 flex flex-wrap gap-3">
                                    <!-- Accordian -->
                                    <div
                                        class="rounded-md bg-white border border-gray-200 p-5 grow"
                                    >
                                        <div
                                            class="accordion"
                                            id="accordionExample5"
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
                                                        <div class="m-2 p-2">
                                                            <div
                                                                class="m-2 grid grid-cols-4"
                                                            >
                                                                <p>
                                                                    Virtualization
                                                                </p>
                                                                <p
                                                                    v-if="
                                                                        detail
                                                                            .application_detail
                                                                            .v_technology
                                                                    "
                                                                    class="col-span-3"
                                                                >
                                                                    Yes
                                                                </p>
                                                                <p
                                                                    v-else
                                                                    class="col-span-3"
                                                                >
                                                                    No
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="m-2 grid grid-cols-4"
                                                            >
                                                                <p>
                                                                    Virtualization
                                                                    Technology
                                                                </p>
                                                                <div
                                                                    class="col-span-3"
                                                                >
                                                                    <p>
                                                                        {{
                                                                            detail
                                                                                .application_detail
                                                                                .v_technology
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="m-2 grid grid-cols-4"
                                                            >
                                                                <p>
                                                                    Config File
                                                                </p>
                                                                <p
                                                                    class="col-span-3 flex flex-wrap gap-1"
                                                                >
                                                                    {{
                                                                        detail
                                                                            .application_detail
                                                                            .config_file
                                                                    }}
                                                                    <button>
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
                                                                    </button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div
                                                                class="accordion-item bg-white border border-gray-200"
                                                                v-for="application in applications"
                                                                :key="
                                                                    application
                                                                "
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
                                                                    :aria-labelledby="
                                                                        'child' +
                                                                        application.id
                                                                    "
                                                                >
                                                                    <div
                                                                        class="accordion-body py-4 px-5"
                                                                    >
                                                                        <div
                                                                            class="flex justify-end"
                                                                        >
                                                                            <button
                                                                                class="p-2"
                                                                                type="button"
                                                                                title="Open"
                                                                            >
                                                                                <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    class="h-6 w-6 text-gray-500"
                                                                                    fill="none"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                >
                                                                                    <path
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"
                                                                                    />
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                        <div
                                                                            class="m-2 grid grid-cols-4"
                                                                        >
                                                                            <p>
                                                                                Name
                                                                            </p>
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
                                                                                /
                                                                                Tag
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

    props: ["applications", "details"],
};
</script>
