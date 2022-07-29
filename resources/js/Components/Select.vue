<template>
    <Multiselect
        mode="mode"
        v-model="model"
        :options="options"
        :searchable="searchable"
        :classes="{
            container:
                'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug outline-none shadow-sm',
            containerActive:
                'ring ring-indigo-200 ring-opacity-50 border-indigo-300',
            optionSelected: 'text-white bg-gray-800',
            optionSelectedPointed: 'text-white bg-gray-800 opacity-90',
            spacer: 'h-10 py-px box-content',
        }"
    />
</template>

<script>
import Multiselect from "@vueform/multiselect";

export default {
    components: {
        Multiselect,
    },

    props: ["options", "mode", "searchable", "model"],
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
