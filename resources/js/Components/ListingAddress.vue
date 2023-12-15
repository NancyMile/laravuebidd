<script setup>
 defineProps({
    listing: Object,
 })
</script>

<template>
    <span>
        {{ listing.street }}  {{ listing.street_number }}, {{ listing.city }} for {{ listing.price }}
    </span>
</template>
