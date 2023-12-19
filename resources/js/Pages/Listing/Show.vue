<script setup>
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue';

defineProps({
    listing: Object,
})
</script>

<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full font-medium text-gray-500">
            <div class="w-full text-center">
                No Images
            </div>
        </Box>
        <div class=" md:col-span-5 flex flex-col gap-3">
            <Box>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray" />
            </Box>
            <Box>
                Making an offer
            </Box>
        </div>
    </div>
</template>
