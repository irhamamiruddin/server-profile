<template>
    <AppLayout title="Dashboard">
        <template #header>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <div class="m-5 flex">
                                    <div class="rounded-md bg-white border border-gray-200 p-5 w-3/4">
                                        <div class="accordion" id="accordionExample5">
                                        <div class="accordion-item bg-white border border-gray-200">
                                            <h2 class="accordion-header mb-0" id="headingOne5">
                                            <button class="
                                                accordion-button
                                                relative
                                                flex
                                                items-center
                                                w-full
                                                py-4
                                                px-5
                                                text-base text-gray-800 text-left
                                                bg-white
                                                border-0
                                                rounded-none
                                                transition
                                                focus:outline-none
                                            " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true"
                                                aria-controls="collapseOne5">
                                                My TNT Server (https://my.tnt.com)
                                            </button>
                                            </h2>
                                            <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5">
                                            <div class="accordion-body py-4 px-5">
                                                <div class="m-2 grid grid-cols-6">
                                                    <p>Environment</p>
                                                    <p class="col-span-3">TNT</p>
                                                    <p>Credentials</p>
                                                    <img src=""/>
                                                </div>
                                                <div class="m-2 grid grid-cols-6">
                                                    <p>IP Address</p>
                                                    <p class="col-span-5">127.20.56.61</p>
                                                </div>
                                                <div class="m-2 grid grid-cols-6">
                                                    <p>Port</p>
                                                    <p class="col-span-5">63</p>
                                                </div>
                                                <div class="m-2 grid grid-cols-6">
                                                    <p>DNS</p>
                                                    <p class="col-span-5">8.8.8.8</p>
                                                </div>
                                                <div class="m-2 grid grid-cols-6">
                                                    <p>OS</p>
                                                    <p class="col-span-5">Linux 3.10.0-1160.el7.x86_64</p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item bg-white border border-gray-200">
                                            <h2 class="accordion-header mb-0" id="headingTwo5">
                                            <button class="
                                                accordion-button
                                                collapsed
                                                relative
                                                flex
                                                items-center
                                                w-full
                                                py-4
                                                px-5
                                                text-base text-gray-800 text-left
                                                bg-white
                                                border-0
                                                rounded-none
                                                transition
                                                focus:outline-none
                                            " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false"
                                                aria-controls="collapseTwo5">
                                                Hardware Specifications
                                            </button>
                                            </h2>
                                            <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5">
                                            <div class="accordion-body py-4 px-5">
                                                <div class="m-2 grid grid-cols-4">
                                                    <p>vCPUs</p>
                                                    <p class="col-span-3">2</p>
                                                </div>
                                                <div class="m-2 grid grid-cols-4">
                                                    <p>Storage</p>
                                                    <div class="col-span-3">
                                                        <p>C:/ 50 GB (OS) / 200 GB</p>
                                                        <p>D:/ 500 GB</p>
                                                    </div>
                                                </div>
                                                <div class="m-2 grid grid-cols-4">
                                                    <p>Memory</p>
                                                    <p class="col-span-3">8 GB</p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item bg-white border border-gray-200">
                                            <h2 class="accordion-header mb-0" id="headingThree5">
                                            <button class="
                                                accordion-button
                                                collapsed
                                                relative
                                                flex
                                                items-center
                                                w-full
                                                py-4
                                                px-5
                                                text-base text-gray-800 text-left
                                                bg-white
                                                border-0
                                                rounded-none
                                                transition
                                                focus:outline-none
                                            " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="false"
                                                aria-controls="collapseThree5">
                                                Documentation
                                            </button>
                                            </h2>
                                            <div id="collapseThree5" class="accordion-collapse collapse" aria-labelledby="headingThree5">
                                            <div class="accordion-body py-4 px-5">
                                                <div class="m-2 grid grid-cols-6">
                                                    <p class="col-span-5">System Architecture Document</p>
                                                    <JetButton>View</JetButton>
                                                </div>
                                                <div class="m-2 grid grid-cols-6">
                                                    <p class="col-span-5">API Documentation</p>
                                                    <JetButton>View</JetButton>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="mx-3 w-1/4">
                                        <div class="p-5 rounded-md bg-white border border-gray-200 mb-3">
                                            <p class="text-lg">Activity</p>
                                            <div class="my-5">
                                                <div class="grid grid-flow-col-dense m-2 p-0">
                                                    <span class="w-14 p-1 place-content-center">
                                                        <img src="/img/user.png" alt="Activity"/>
                                                    </span>
                                                    <div class="grid place-content-center">
                                                        <p class="italic text-gray-500 text-xs mb-1">18/05/2022 12:10 pm</p>
                                                        <p class="text-sm">Updated API Documentation</p>
                                                    </div>
                                                </div>
                                                <div class="grid grid-flow-col-dense m-2 p-0">
                                                    <span class="w-14 p-1 place-content-center">
                                                        <img src="/img/user.png" alt="Activity"/>
                                                    </span>
                                                    <div class="grid place-content-center">
                                                        <p class="italic text-gray-500 text-xs mb-1">18/05/2022 12:10 pm</p>
                                                        <p class="text-sm">Updated API Documentation</p>
                                                    </div>
                                                </div>
                                                <div class="grid grid-flow-col-dense m-2 p-0">
                                                    <span class="w-14 p-1 place-content-center">
                                                        <img src="/img/user.png" alt="Activity"/>
                                                    </span>
                                                    <div class="grid place-content-center">
                                                        <p class="italic text-gray-500 text-xs mb-1">18/05/2022 12:10 pm</p>
                                                        <p class="text-sm">Updated API Documentation</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm text-center">Show more...</p>
                                            </div>
                                        </div>

                                        <div class="p-5 rounded-md bg-white border border-gray-200">
                                            <p class="text-lg">Useful Links</p>
                                            <div class="mx-3 my-5 grid grid-cols-3 gap-3">
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">GitLab</p>
                                                </div>
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">Taiga</p>
                                                </div>
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">Wiki</p>
                                                </div>
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">dCrown</p>
                                                </div>
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">RFC</p>
                                                </div>
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">SainsERP</p>
                                                </div>
                                                <div>
                                                    <div class="m-1 p-2 h-16 border border-gray-500 rounded-md grid place-content-center">
                                                        <img src="/img/gear.png" alt="Link"/>
                                                    </div>
                                                    <p class="text-sm text-center">dSanCloud</p>
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
    import { InertiaLink } from '@inertiajs/inertia-vue3';
    import { Inertia } from '@inertiajs/inertia';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import JetButton from '@/Jetstream/Button.vue';

    export default{
        components:
        {
            AppLayout,
            JetButton,
            InertiaLink,
        },

    };
</script>
