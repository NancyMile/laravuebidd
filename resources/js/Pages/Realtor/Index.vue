<script setup>
import Box from '@/Components/UI/Box.vue'
import Price from '@/Components/Price.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import ListingAddress from  '@/Components/ListingAddress.vue'
import { Link } from '@inertiajs/vue3';
import RealtorFilter from '@/Pages/Realtor/Index/Components/RealtorFilter.vue'
import Pagination from '@/Components/UI/Pagination.vue'

defineProps ({
    listings: Object,
    filters: Object
})
</script>

<template>
<h1 class="text-3xl mb-4">Your Listings</h1>
<RealtorFilter :filters="filters"/>
<section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings.data" :key="listing.id" :class="{'border-dashed': listing.deleted_at}">
        <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
            <div :class="{ 'opacity-25': listing.deleted_at }">
                <div v-if="listing.sold_at != null" class="text-xs font-bold uppercase border border_dashed p-1 border-green-300 text-green-500 inline-block rounded-md mb-2">
                    sold
                </div>
                <div class="xl:flex items-center gap-2">
                    <Price :price="listing.price" class="text-2xl font-medium"/>
                    <ListingSpace :listing="listing"/>
                </div>
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </div>
            <section>
                <div class="flex items-center gap-1">
                    <a class="btn-outline btn-outline text-xs font-medium" :href="route('listing.show', listing.id)" target="_blank" >Preview</a>
                    <Link class="btn-outline btn-outline text-xs font-medium" :href="route('realtor.listing.edit',listing.id)">Edit</Link>
                    <Link  v-if="!listing.deleted_at" class="btn-outline btn-outline text-xs font-medium" :href="route('realtor.listing.destroy',{ listing: listing.id})"  as="button"  method="delete">Delete</Link>
                    <Link v-else class="btn-outline btn-outline text-xs font-medium" :href="route('realtor.listing.restore',{ listing: listing.id})" as="button" method="put">Restore</Link>
                </div>
                <div class="mt-2">
                    <Link :href="route('realtor.listing.image.create', {listing: listing.id})" class="btn-outline block w-full text-xs font-medium text-center">Images ({{ listing.images_count }})</Link>
                </div>
                <div class="mt-2">
                    <Link :href="route('realtor.listing.show', {listing: listing.id})" class="btn-outline block w-full text-xs font-medium text-center">Offers ({{ listing.offers_count }})</Link>
                </div>
            </section>
        </div>
    </Box>
</section>
<section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links"/>
</section>
</template>
