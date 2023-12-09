<script setup>
    import { Link } from '@inertiajs/vue3';
    import MainLayout from '../Layouts/MainLayout.vue';
    defineProps({
        message: String
        })
</script>

<template>
    <MainLayout>
        <Link href="/show">
            Show
        </Link>
        {{ message }}
    </MainLayout>
</template>

