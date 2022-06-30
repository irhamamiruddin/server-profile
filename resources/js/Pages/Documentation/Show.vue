<template>
    <div>
        <object
            :data="'/files/' + document.url"
            type="application/pdf"
            class="w-screen h-screen"
        >
            <iframe :src="'/files/' + document.url" class="w-screen h-screen">
                <p>This browser does not support PDF!</p>
            </iframe>
        </object>
    </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    props: ["document"],
};
</script>
