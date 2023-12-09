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
