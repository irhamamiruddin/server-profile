<template>
    <div class="p-5 rounded-md bg-white border border-gray-200">
        <p class="text-lg">Activity</p>
        <div class="my-5">
            <div
                v-for="activity in activities"
                :key="activity"
                class="grid grid-flow-col-dense m-2 p-0"
            >
                <span class="w-14 p-1 place-content-center">
                    <img
                        class="h-10 w-10 rounded-full object-cover"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                    />
                </span>
                <div class="grid place-content-center">
                    <p class="italic text-gray-500 text-xs mb-1">
                        {{ activity.created_at }}
                    </p>
                    <p class="text-sm">
                        {{ activity.activity_type_id }}
                    </p>
                </div>
            </div>
        </div>
        <div class="text-sm text-center text-blue-600 hover:text-gray-600">
            <inertia-link :href="route('activities.index')" title="Activity">
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
