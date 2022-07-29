<template>
    <div class="col-span-6 sm:col-span-4 mb-4">
        <JetLabel class="font-bold" for="storage" value="Storage" />
        <table class="min-w-full border-separate">
            <thead>
                <tr>
                    <th
                        class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                    >
                        Partition
                    </th>
                    <th
                        class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                    >
                        Allocated Size
                    </th>
                    <th
                        class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                    >
                        Unit
                    </th>
                    <th
                        class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                    >
                        Remarks
                    </th>
                    <th
                        class="truncate text-xs text-gray-500 mt-1 text-left font-light"
                    >
                        Storage Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(storage, index) in storages" :key="index">
                    <!-- storage partition -->
                    <td>
                        <JetInput
                            id="storage"
                            v-model="storage.partition"
                            type="text"
                            class="block w-full"
                            autocomplete="storage"
                        />
                    </td>

                    <!-- storage allocated size -->
                    <td>
                        <JetInput
                            id="storage"
                            v-model="storage.allocated_size"
                            type="number"
                            class="block w-full"
                            autocomplete="storage"
                        />
                    </td>

                    <!-- storage unit -->
                    <td class="w-32">
                        <Multiselect
                            id="storage"
                            mode="single"
                            v-model="storage.unit"
                            :options="['KB', 'MB', 'GB', 'TB']"
                            :searchable="false"
                            :classes="{
                                container:
                                    'relative w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                containerActive:
                                    'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                optionSelected: 'text-white bg-gray-800',
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
                            v-model="storage.remarks"
                            type="text"
                            class="block w-full"
                            autocomplete="storage"
                        />
                    </td>

                    <!-- storage status -->
                    <td class="w-40">
                        <Multiselect
                            id="storage"
                            mode="single"
                            v-model="storage.status"
                            :options="['Active', 'Inactive']"
                            :searchable="false"
                            :classes="{
                                container:
                                    'relative w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm block w-full',
                                containerActive:
                                    'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
                                optionSelected: 'text-white bg-gray-800',
                                optionSelectedPointed:
                                    'text-white bg-gray-800 opacity-90',
                                spacer: 'h-10 box-content',
                            }"
                        />
                    </td>
                    <td v-show="index != 0">
                        <button
                            type="button"
                            class="inline-block px-2.5 py-2 bg-red-600 text-white font-medium leading-tight uppercase rounded-md shadow-md hover:bg-red-900 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                            @click="removeStorage(index)"
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
            @click="addStorage()"
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

        <JetInputError :message="errors.storage" class="mt-2" />
    </div>
</template>

<script>
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
import Multiselect from "@vueform/multiselect";

export default {
    components: {
        JetInput,
        JetInputError,
        JetLabel,
        Multiselect,
    },

    data() {
        return {
            storages: [
                {
                    partition: "",
                    allocated_size: "",
                    unit: "",
                    remarks: "",
                    status: "",
                },
            ],
        };
    },

    methods: {
        addStorage() {
            this.storages.push({
                partition: "",
                allocated_size: "",
                unit: "",
                remarks: "",
                status: "",
            });
        },
        removeStorage(index) {
            this.storages.splice(index, 1);
        },
    },
};
</script>
