<template>
    <AppLayout title="Dashboard">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden m-5">
                            <div
                                class="bg-blue-100 rounded-lg py-5 px-6 mb-4 text-base text-blue-700 mb-3"
                                role="alert"
                            >
                                Required Field - *
                            </div>
                            <div
                                v-if="$page.props.flash.message"
                                class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full"
                                role="alert"
                            >
                                {{ $page.props.flash.message }}
                            </div>
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
                                                        id="serverInfo"
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
                                                                    value="Server Name*"
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
                                                                    value="Server Domain*"
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
                                                                    value="Server Environment*"
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
                                                                    value="Server IP Adress*"
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
                                                                    value="Port*"
                                                                />
                                                                <JetInput
                                                                    id="port"
                                                                    v-model="
                                                                        form.port
                                                                    "
                                                                    type="number"
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

                                                            <!-- Status -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="status"
                                                                    value="Status*"
                                                                />

                                                                <Multiselect
                                                                    mode="single"
                                                                    v-model="
                                                                        form.status
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
                                                                    value="Operating System*"
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
                                                                    value="Number of vCPUs*"
                                                                />
                                                                <JetInput
                                                                    id="vcpu_amount"
                                                                    v-model="
                                                                        form.vcpu_amount
                                                                    "
                                                                    type="number"
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
                                                                    value="Memory Size (RAM) in GB*"
                                                                />
                                                                <JetInput
                                                                    id="memory"
                                                                    v-model="
                                                                        form.memory
                                                                    "
                                                                    type="number"
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

                                                            <!-- Storage -->
                                                            <div
                                                                class="col-span-6 sm:col-span-4 mb-4"
                                                            >
                                                                <JetLabel
                                                                    class="font-bold"
                                                                    for="storage"
                                                                    value="Storage*"
                                                                />

                                                                <JetInputError
                                                                    :message="
                                                                        $page
                                                                            .props
                                                                            .errors
                                                                            .storages
                                                                    "
                                                                    class="mt-2"
                                                                />

                                                                <table
                                                                    class="min-w-full border-separate"
                                                                >
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                                                                            >
                                                                                Partition*
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                                                                            >
                                                                                Allocated
                                                                                Size*
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                                                                            >
                                                                                Unit*
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                                                                            >
                                                                                Remarks
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                                                                            >
                                                                                Storage
                                                                                Status*
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="(
                                                                                storage,
                                                                                index
                                                                            ) in form.storages"
                                                                            :key="
                                                                                index
                                                                            "
                                                                        >
                                                                            <!-- storage partition -->
                                                                            <td>
                                                                                <JetInput
                                                                                    id="storage"
                                                                                    v-model="
                                                                                        storage.partition
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="storage"
                                                                                />
                                                                            </td>

                                                                            <!-- storage allocated size -->
                                                                            <td>
                                                                                <JetInput
                                                                                    id="storage"
                                                                                    v-model="
                                                                                        storage.allocated_size
                                                                                    "
                                                                                    type="number"
                                                                                    class="block w-full"
                                                                                    autocomplete="storage"
                                                                                />
                                                                            </td>

                                                                            <!-- storage unit -->
                                                                            <td
                                                                                class="w-32"
                                                                            >
                                                                                <Multiselect
                                                                                    id="storage"
                                                                                    mode="single"
                                                                                    v-model="
                                                                                        storage.unit
                                                                                    "
                                                                                    :options="[
                                                                                        'KB',
                                                                                        'MB',
                                                                                        'GB',
                                                                                        'TB',
                                                                                    ]"
                                                                                    :searchable="
                                                                                        false
                                                                                    "
                                                                                    :classes="{
                                                                                        container:
                                                                                            'relative w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                                                                        containerActive:
                                                                                            'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                                                                        optionSelected:
                                                                                            'text-white bg-gray-800',
                                                                                        optionSelectedPointed:
                                                                                            'text-white bg-gray-800 opacity-90',
                                                                                        spacer: 'h-10 box-content',
                                                                                    }"
                                                                                />
                                                                            </td>

                                                                            <!-- storage remarks -->
                                                                            <td>
                                                                                <JetInput
                                                                                    id="storage"
                                                                                    v-model="
                                                                                        storage.remarks
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="storage"
                                                                                />
                                                                            </td>

                                                                            <!-- storage status -->
                                                                            <td
                                                                                class="w-40"
                                                                            >
                                                                                <Multiselect
                                                                                    id="storage"
                                                                                    mode="single"
                                                                                    v-model="
                                                                                        storage.status
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
                                                                                            'relative w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                                                                        containerActive:
                                                                                            'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                                                                        optionSelected:
                                                                                            'text-white bg-gray-800',
                                                                                        optionSelectedPointed:
                                                                                            'text-white bg-gray-800 opacity-90',
                                                                                        spacer: 'h-10 box-content',
                                                                                    }"
                                                                                />
                                                                            </td>
                                                                            <td
                                                                                v-show="
                                                                                    index !=
                                                                                    0
                                                                                "
                                                                            >
                                                                                <button
                                                                                    type="button"
                                                                                    class="inline-block px-2.5 py-2 bg-red-600 text-white font-medium leading-tight uppercase rounded-md shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                                    @click="
                                                                                        removeStorage(
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
                                                                    @click="
                                                                        addStorage()
                                                                    "
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
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Documentation -->
                                                <div
                                                    class="accordion-item bg-white border border-gray-200"
                                                >
                                                    <h2
                                                        class="accordion-header mb-0"
                                                        id="documents"
                                                    >
                                                        <button
                                                            class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseDocuments"
                                                            aria-expanded="false"
                                                            aria-controls="collapseDocuments"
                                                        >
                                                            Documentation
                                                        </button>
                                                    </h2>
                                                    <div
                                                        id="collapseDocuments"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="documents"
                                                    >
                                                        <div
                                                            class="accordion-body py-4 px-5"
                                                        >
                                                            <!-- Document Name -->
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
                                                                                Document
                                                                                Name
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                            >
                                                                                File
                                                                                Url
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="(
                                                                                document,
                                                                                index
                                                                            ) in form.documents"
                                                                            :key="
                                                                                index
                                                                            "
                                                                        >
                                                                            <td>
                                                                                <JetInput
                                                                                    id="document_name"
                                                                                    v-model="
                                                                                        document.name
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="document_name"
                                                                                />
                                                                                <JetInputError
                                                                                    :message="
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .document_name
                                                                                    "
                                                                                    class="mt-2"
                                                                                />
                                                                            </td>
                                                                            <td>
                                                                                <JetInput
                                                                                    id="file_url"
                                                                                    v-model="
                                                                                        document.url
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="file_url"
                                                                                />

                                                                                <JetInputError
                                                                                    :message="
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .document_url
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
                                                                                    class="inline-block px-3 py-1.5 w-full bg-red-600 grid place-content-center text-white font-medium leading-tight uppercase rounded-md shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                                    @click="
                                                                                        removeDocument(
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
                                                                    @click="
                                                                        addDocument()
                                                                    "
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
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Team Members -->
                                                <div
                                                    class="accordion-item bg-white border border-gray-200"
                                                >
                                                    <h2
                                                        class="accordion-header mb-0"
                                                        id="members"
                                                    >
                                                        <button
                                                            class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseMembers"
                                                            aria-expanded="false"
                                                            aria-controls="collapseMembers"
                                                        >
                                                            Team Members
                                                        </button>
                                                    </h2>
                                                    <div
                                                        id="collapseMembers"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="members"
                                                    >
                                                        <div
                                                            class="accordion-body py-4 px-5"
                                                        >
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
                                                                                Name
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                            >
                                                                                Status
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="(
                                                                                member,
                                                                                index
                                                                            ) in form.members"
                                                                            :key="
                                                                                index
                                                                            "
                                                                        >
                                                                            <td>
                                                                                <JetInput
                                                                                    id="member_name"
                                                                                    v-model="
                                                                                        member.name
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="member_name"
                                                                                />
                                                                                <JetInputError
                                                                                    :message="
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .members
                                                                                    "
                                                                                    class="mt-2"
                                                                                />
                                                                            </td>
                                                                            <td>
                                                                                <Multiselect
                                                                                    id="member_status"
                                                                                    mode="single"
                                                                                    v-model="
                                                                                        member.status
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
                                                                                            'relative w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
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
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .members
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
                                                                                        removeMember(
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
                                                                    @click="
                                                                        addMember()
                                                                    "
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
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Project Information -->
                                                <div
                                                    class="accordion-item bg-white border border-gray-200"
                                                >
                                                    <h2
                                                        class="accordion-header mb-0"
                                                        id="project"
                                                    >
                                                        <button
                                                            class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseProject"
                                                            aria-expanded="false"
                                                            aria-controls="collapseProject"
                                                        >
                                                            Project
                                                        </button>
                                                    </h2>
                                                    <div
                                                        id="collapseProject"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="project"
                                                    >
                                                        <div
                                                            class="accordion-body py-4 px-5"
                                                        >
                                                            <div
                                                                class="col-span-6 sm:col-span-4 my-2"
                                                            >
                                                                <table
                                                                    class="min-w-full border-separate"
                                                                >
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                            >
                                                                                Project
                                                                                Code
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                            >
                                                                                Project
                                                                                Name
                                                                            </th>
                                                                            <th
                                                                                class="truncate text-sm text-gray-500 mt-1 text-left font-semibold"
                                                                            >
                                                                                Nature
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="(
                                                                                project,
                                                                                index
                                                                            ) in form.projects"
                                                                            :key="
                                                                                index
                                                                            "
                                                                        >
                                                                            <!-- Project Code -->
                                                                            <td>
                                                                                <JetInput
                                                                                    id="project_code"
                                                                                    v-model="
                                                                                        project.code
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="project_code"
                                                                                />
                                                                                <JetInputError
                                                                                    :message="
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .project_code
                                                                                    "
                                                                                    class="mt-2"
                                                                                />
                                                                            </td>

                                                                            <!-- Project Name -->
                                                                            <td>
                                                                                <JetInput
                                                                                    id="project_name"
                                                                                    v-model="
                                                                                        project.name
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="project_name"
                                                                                />
                                                                                <JetInputError
                                                                                    :message="
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .project_name
                                                                                    "
                                                                                    class="mt-2"
                                                                                />
                                                                            </td>

                                                                            <!-- Project Nature -->
                                                                            <td>
                                                                                <JetInput
                                                                                    id="nature"
                                                                                    v-model="
                                                                                        project.nature
                                                                                    "
                                                                                    type="text"
                                                                                    class="block w-full"
                                                                                    autocomplete="nature"
                                                                                />
                                                                                <JetInputError
                                                                                    :message="
                                                                                        $page
                                                                                            .props
                                                                                            .errors
                                                                                            .project_nature
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
                                                                                        removeProject(
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
                                                                    @click="
                                                                        addProject()
                                                                    "
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
import JetInputError from "@/Jetstream/InputError.vue";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Multiselect from "@vueform/multiselect";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

export default {
    components: {
        AppLayout,
        JetInput,
        JetButton,
        JetLabel,
        InertiaLink,
        JetInputError,
        Multiselect,
        JetValidationErrors,
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
                storages: [
                    {
                        partition: null,
                        allocated_size: null,
                        unit: null,
                        remarks: null,
                        status: null,
                    },
                ],
                members: [
                    {
                        name: null,
                        status: null,
                    },
                ],
                projects: [
                    {
                        code: null,
                        name: null,
                        nature: null,
                    },
                ],
                documents: [
                    {
                        name: null,
                        url: null,
                    },
                ],
            },
        };
    },

    methods: {
        createUser(form) {
            Inertia.post(route("servers.store", form));
        },

        addStorage() {
            this.form.storages.push({
                partition: null,
                allocated_size: null,
                unit: null,
                remarks: null,
                status: null,
            });
        },
        removeStorage(index) {
            this.form.storages.splice(index, 1);
        },

        addMember() {
            this.form.members.push({
                name: null,
                status: null,
            });
        },
        removeMember(index) {
            this.form.members.splice(index, 1);
        },

        addProject() {
            this.form.projects.push({
                code: null,
                name: null,
                nature: null,
            });
        },
        removeProject(index) {
            this.form.projects.splice(index, 1);
        },

        addDocument() {
            this.form.documents.push({
                name: null,
                url: null,
            });
        },
        removeDocument(index) {
            this.form.documents.splice(index, 1);
        },
    },
};
</script>
