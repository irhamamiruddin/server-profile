<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Welcome from '@/Jetstream/Welcome.vue';
</script>

<template>
    <AppLayout title="Navigation">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <JetNavLink :href="route('servers.index')" :active="route().current('servers.*')">
                    Server
                </JetNavLink>
                <JetNavLink :href="route('servers.index')" :active="route().current('servers.*')">
                    Application
                </JetNavLink>
                <JetNavLink :href="route('servers.index')" :active="route().current('servers.*')">
                    Documentation
                </JetNavLink>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
