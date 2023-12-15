<script setup>
import { Link } from '@inertiajs/vue3';
    defineProps({
        listings: Array,
    })
</script>

<template>
    <div v-for=" listing in listings" :key="listing.id">
        <Link :href="`/listing/${listing.id}`">
            {{ listing.street }}  {{ listing.street_number }}, {{ listing.city }} for {{ listing.price }}
        </Link>
    </div>
</template>
