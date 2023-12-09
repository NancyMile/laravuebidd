<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps({
        message: String
        })
</script>

<template>
        <Link href="/show">
            Show
        </Link>
        {{ message }}
</template>

<script>
    import MainLayout from '../Layouts/MainLayout.vue';
    export default {
        layout: MainLayout
    }
</script>
