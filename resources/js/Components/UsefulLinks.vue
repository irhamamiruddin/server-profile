<template>
    <div class="ml-3 relative">
        <JetDropdown align="right" width="72">
            <template #trigger>
                <button
                    class="flex text-sm border-2 border-transparent rounded-md focus:outline-none focus:border-gray-300 transition"
                >
                    <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="far"
                        data-icon="arrow-alt-circle-up"
                        class="w-8 h-8 fill-gray-500"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                    >
                        <path
                            d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"
                        />
                    </svg>
                </button>
            </template>

            <template #content>
                <div class="block px-4 py-2 text-base border-b-2 text-gray-500">
                    Useful Links
                </div>

                <div class="px-2 py-5">
                    <div
                        class="grid md:grid-cols-1 lg:grid-cols-3 gap-1 justify-items-center"
                    >
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">GitLab</p>
                        </JetDropdownLink>
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">Taiga</p>
                        </JetDropdownLink>
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">Wiki</p>
                        </JetDropdownLink>
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">dCrown</p>
                        </JetDropdownLink>
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">RFC</p>
                        </JetDropdownLink>
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">SainsERP</p>
                        </JetDropdownLink>
                        <JetDropdownLink
                            :href="route('profile.show')"
                            class="grid justify-items-center"
                        >
                            <div
                                class="w-16 h-16 p-2 border shadow-md rounded-md grid place-content-center"
                            >
                                <img src="/img/gear.png" alt="Link" />
                            </div>
                            <p class="mt-1 text-sm text-center">dSanCloud</p>
                        </JetDropdownLink>
                    </div>
                </div>
            </template>
        </JetDropdown>
    </div>
</template>

<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";

export default {
    components: {
        JetDropdown,
        JetDropdownLink,
    },
};
</script>
