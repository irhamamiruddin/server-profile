<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="mr-0 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border"
                    v-html="link.label"
                />
                <inertia-link
                    v-else
                    class="mr-0 mb-1 px-4 py-3 text-sm leading-4 border hover:bg-white hover:text-black focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-slate-600 text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    components: {
        InertiaLink,
    },

    props: {
        links: Array,
    },
};
</script>
