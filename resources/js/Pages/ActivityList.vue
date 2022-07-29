<template>
    <div
        class="rounded-md bg-white border border-gray-200 flex flex-col px-6 py-4"
    >
        <p class="text-lg">Activity</p>
        <div class="my-5">
            <div
                v-if="!activities.data.length"
                class="p-4 text-center text-gray-900"
            >
                No Activity
            </div>
            <div
                v-for="activity in activities.data"
                :key="activity"
                class="flex flex-nowrap my-3"
            >
                <div>
                    <img
                        class="h-10 w-10 rounded-full object-cover"
                        :src="activity.user.profile_photo_url"
                        :alt="activity.user.name"
                        :title="activity.user.name"
                    />
                </div>
                <div class="lg:w-60 px-3 grid content-center">
                    <div class="italic text-gray-500 text-xs">
                        {{ activity.created_at }}
                    </div>
                    <div class="text-sm">
                        {{ activity.type.description }}
                    </div>
                </div>
            </div>
        </div>
        <div class="text-sm text-center text-blue-600 hover:text-gray-600">
            <inertia-link
                v-if="hasAnyPermission(['activity-list'])"
                :href="route('activities.index')"
                title="Activity"
            >
                Show More...
            </inertia-link>
        </div>
    </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    components: {
        InertiaLink,
    },

    props: ["activities"],
};
</script>
