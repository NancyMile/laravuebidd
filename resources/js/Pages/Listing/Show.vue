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
                <template 	#header>
                    Description
                </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray" />
            </Box>
            <Box>
                <template 	#header>
                    Monthly Payment
                </template>
                <div>
                    <label class="label">Interest rate (2.5%)</label>
                    <input type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer"/>
                    <label class="label">Duration (25 years)</label>
                    <input type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer"/>
                    <div class="text-gray-600" mt-5>
                        <div class="text-gray-400">Your Monthly Payment</div>
                        <Price :price="500" class="text-3xl"/>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>
