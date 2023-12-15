<script setup>
 defineProps({
    listing: Object,
 })
</script>

<template>
    <div>
        {{ listing.street }}  {{ listing.street_number }}, {{ listing.city }} for {{ listing.price }}
    </div>
</template>
