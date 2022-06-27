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
                                            <!-- Topic 1 -->
                                            <div
                                                class="accordion-item bg-white border border-gray-200"
                                            >
                                                <h2
                                                    class="flex accordion-header mb-0"
                                                    id="topicOne"
                                                >
                                                    <button
                                                        class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTopicOne"
                                                        aria-expanded="true"
                                                        aria-controls="collapseTopicOne"
                                                    >
                                                        {{ server.name }}
                                                        ({{ server.domain }})
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseTopicOne"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="topicOne"
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
                                                            class="flex flex-col"
                                                        >
                                                            <div
                                                                class="overflow-x-auto sm:-mx-6 lg:-mx-8"
                                                            >
                                                                <div
                                                                    class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                                                                >
                                                                    <div
                                                                        class="overflow-hidden"
                                                                    >
                                                                        <table
                                                                            class="min-w-full"
                                                                        >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-bold text-gray-900"
                                                                                    >
                                                                                        Environment
                                                                                    </td>
                                                                                    <td
                                                                                        class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                                    >
                                                                                        {{
                                                                                            server.environment
                                                                                        }}
                                                                                    </td>
                                                                                    <td
                                                                                        class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap flex gap-1"
                                                                                    >
                                                                                        Credentials
                                                                                        <button
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#staticBackdrop"
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
                                                                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                                                                                />
                                                                                            </svg>
                                                                                        </button>

                                                                                        <!-- Modal -->
                                                                                        <div
                                                                                            class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                                                            id="staticBackdrop"
                                                                                            data-bs-backdrop="static"
                                                                                            data-bs-keyboard="false"
                                                                                            tabindex="-1"
                                                                                            aria-labelledby="staticBackdropLabel"
                                                                                            aria-hidden="true"
                                                                                        >
                                                                                            <div
                                                                                                class="modal-dialog relative w-auto pointer-events-none"
                                                                                            >
                                                                                                <div
                                                                                                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
                                                                                                >
                                                                                                    <div
                                                                                                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md"
                                                                                                    >
                                                                                                        <h5
                                                                                                            class="text-xl font-medium leading-normal text-gray-800"
                                                                                                            id="exampleModalLabel"
                                                                                                        >
                                                                                                            Credentials
                                                                                                        </h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                                                            data-bs-dismiss="modal"
                                                                                                            aria-label="Close"
                                                                                                        ></button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body relative p-4"
                                                                                                    >
                                                                                                        123456
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md"
                                                                                                    >
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                                                            data-bs-dismiss="modal"
                                                                                                        >
                                                                                                            Close
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr
                                                                                    class="bg-white"
                                                                                >
                                                                                    <td
                                                                                        class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-bold text-gray-900"
                                                                                    >
                                                                                        IP
                                                                                        Address
                                                                                    </td>
                                                                                    <td
                                                                                        class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                                    >
                                                                                        {{
                                                                                            server.ip_address
                                                                                        }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr
                                                                                    class="bg-white"
                                                                                >
                                                                                    <td
                                                                                        class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-bold text-gray-900"
                                                                                    >
                                                                                        Port
                                                                                    </td>
                                                                                    <td
                                                                                        colspan="2"
                                                                                        class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                                    >
                                                                                        {{
                                                                                            server.port
                                                                                        }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr
                                                                                    class="bg-white"
                                                                                >
                                                                                    <td
                                                                                        class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-bold text-gray-900"
                                                                                    >
                                                                                        DNS
                                                                                    </td>
                                                                                    <td
                                                                                        colspan="2"
                                                                                        class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                                    >
                                                                                        {{
                                                                                            server.dns
                                                                                        }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Topic 2 -->
                                            <div
                                                class="accordion-item bg-white border border-gray-200"
                                            >
                                                <h2
                                                    class="accordion-header mb-0"
                                                    id="topicTwo"
                                                >
                                                    <button
                                                        class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTopicTwo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTopicTwo"
                                                    >
                                                        Hardware Specifications
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseTopicTwo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="topicTwo"
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
                                                        <div>
                                                            <div
                                                                class="m-1 p-1 grid grid-cols-4"
                                                            >
                                                                <p
                                                                    class="font-bold"
                                                                >
                                                                    OS
                                                                </p>
                                                                <p
                                                                    class="col-span-3 mx-3"
                                                                >
                                                                    {{
                                                                        server
                                                                            .server_details
                                                                            .operating_system
                                                                    }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="m-1 p-1 grid grid-cols-4"
                                                            >
                                                                <p
                                                                    class="font-bold"
                                                                >
                                                                    vCPUs
                                                                </p>
                                                                <p
                                                                    class="col-span-3 mx-3"
                                                                >
                                                                    {{
                                                                        server
                                                                            .server_details
                                                                            .vcpu_amount
                                                                    }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="m-1 p-1 grid grid-cols-4"
                                                            >
                                                                <p
                                                                    class="font-bold"
                                                                >
                                                                    Storage
                                                                </p>
                                                                <div
                                                                    class="col-span-3"
                                                                >
                                                                    <p
                                                                        v-for="storage in storages"
                                                                        :key="
                                                                            storage
                                                                        "
                                                                        class="mx-3"
                                                                    >
                                                                        {{
                                                                            storage.partition
                                                                        }}:/
                                                                        {{
                                                                            storage.allocated_size
                                                                        }}
                                                                        {{
                                                                            storage.unit
                                                                        }}
                                                                        ({{
                                                                            storage.remarks
                                                                        }})
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="m-1 p-1 grid grid-cols-4"
                                                            >
                                                                <p
                                                                    class="font-bold"
                                                                >
                                                                    Memory
                                                                </p>
                                                                <p
                                                                    class="col-span-3 mx-3"
                                                                >
                                                                    {{
                                                                        server
                                                                            .server_details
                                                                            .memory
                                                                    }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Topic 3 -->
                                            <div
                                                class="accordion-item bg-white border border-gray-200"
                                            >
                                                <h2
                                                    class="accordion-header mb-0"
                                                    id="topicThree"
                                                >
                                                    <button
                                                        class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTopicThree"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTopicThree"
                                                    >
                                                        Documentation
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseTopicThree"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="topicThree"
                                                >
                                                    <div
                                                        class="accordion-body py-4 px-5"
                                                    >
                                                        <div class="m-1">
                                                            <table
                                                                class="min-w-full"
                                                            >
                                                                <tbody>
                                                                    <tr
                                                                        v-for="documentation in server.documentations"
                                                                        :key="
                                                                            documentation
                                                                        "
                                                                    >
                                                                        <td
                                                                            class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-light text-gray-900"
                                                                        >
                                                                            {{
                                                                                documentation.name
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            <JetButton
                                                                                class="place-content-center"
                                                                            >
                                                                                View
                                                                            </JetButton>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Topic 4 -->
                                            <div
                                                class="accordion-item bg-white border border-gray-200"
                                            >
                                                <h2
                                                    class="accordion-header mb-0"
                                                    id="topicFour"
                                                >
                                                    <button
                                                        class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTopicFour"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTopicFour"
                                                    >
                                                        Team Members
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseTopicFour"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="topicFour"
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
                                                        <div class="m-1">
                                                            <table
                                                                class="min-w-full"
                                                            >
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            #
                                                                        </th>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Name
                                                                        </th>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Status
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr
                                                                        v-for="(
                                                                            member,
                                                                            i
                                                                        ) in server.members"
                                                                        :key="
                                                                            member
                                                                        "
                                                                    >
                                                                        <td
                                                                            class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-light text-gray-900"
                                                                        >
                                                                            {{
                                                                                i +
                                                                                1
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            {{
                                                                                member.name
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            <span
                                                                                v-if="
                                                                                    member.status ==
                                                                                    'Active'
                                                                                "
                                                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-green-500"
                                                                            >
                                                                                {{
                                                                                    member.status
                                                                                }}
                                                                            </span>
                                                                            <span
                                                                                v-else
                                                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-red-500"
                                                                            >
                                                                                {{
                                                                                    member.status
                                                                                }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Topic 5 -->
                                            <div
                                                class="accordion-item bg-white border border-gray-200"
                                            >
                                                <h2
                                                    class="accordion-header mb-0"
                                                    id="topicFive"
                                                >
                                                    <button
                                                        class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTopicFive"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTopicFive"
                                                    >
                                                        Applications
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseTopicFive"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="topicFive"
                                                >
                                                    <div
                                                        class="accordion-body py-4 px-5"
                                                    >
                                                        <div
                                                            class="flex justify-end"
                                                        >
                                                            <inertia-link
                                                                :href="
                                                                    route(
                                                                        'applications.show',
                                                                        server.id
                                                                    )
                                                                "
                                                                title="Applications"
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
                                                            </inertia-link>
                                                        </div>
                                                        <div class="m-1">
                                                            <table
                                                                class="min-w-full"
                                                            >
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            No
                                                                        </th>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Name
                                                                        </th>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Status
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr
                                                                        v-for="(
                                                                            application,
                                                                            i
                                                                        ) in server.applications"
                                                                        :key="
                                                                            application
                                                                        "
                                                                    >
                                                                        <td
                                                                            class="p-1 whitespace-nowrap sm:text-sm lg:text-base font-light text-gray-900"
                                                                        >
                                                                            {{
                                                                                i +
                                                                                1
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            {{
                                                                                application.name
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            <span
                                                                                v-if="
                                                                                    application.status ==
                                                                                    'Active'
                                                                                "
                                                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-green-500"
                                                                            >
                                                                                {{
                                                                                    application.status
                                                                                }}
                                                                            </span>
                                                                            <span
                                                                                v-else
                                                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded bg-red-500"
                                                                            >
                                                                                {{
                                                                                    application.status
                                                                                }}
                                                                            </span>
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            <JetButton
                                                                                >Details</JetButton
                                                                            >
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Topic 6 -->
                                            <div
                                                class="accordion-item bg-white border border-gray-200"
                                            >
                                                <h2
                                                    class="accordion-header mb-0"
                                                    id="topicSix"
                                                >
                                                    <button
                                                        class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTopicSix"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTopicSix"
                                                    >
                                                        Project Information
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseTopicSix"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="topicSix"
                                                >
                                                    <div
                                                        class="accordion-body py-4 px-5"
                                                    >
                                                        <div class="m-1">
                                                            <table
                                                                class="min-w-full"
                                                            >
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Project
                                                                            Code
                                                                            /
                                                                            SLA
                                                                            No.
                                                                        </th>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Nature
                                                                        </th>
                                                                        <th
                                                                            scope="col"
                                                                            class="sm:text-sm lg:text-base font-bold text-gray-900 p-1 text-left"
                                                                        >
                                                                            Project
                                                                            Name
                                                                            /
                                                                            SLA
                                                                            Name
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr
                                                                        v-for="project in server.projects"
                                                                        :key="
                                                                            project
                                                                        "
                                                                    >
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            {{
                                                                                project.code
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            {{
                                                                                project.nature
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="sm:text-sm lg:text-base text-gray-900 font-light p-1 whitespace-nowrap"
                                                                        >
                                                                            {{
                                                                                project.name
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-3">
                                        <div class="flex flex-col gap-3">
                                            <ActivityList
                                                :activities="activities"
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
    </AppLayout>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import ActivityList from "@/Pages/ActivityList.vue";

export default {
    components: {
        AppLayout,
        JetButton,
        InertiaLink,
        ActivityList,
    },

    props: ["server", "activities", "storages", "filters"],
};
</script>
