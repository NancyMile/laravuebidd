<script setup>
    import Price from '@/Components/Price.vue';
    import { computed } from 'vue';
    import Box from '@/Components/UI/Box.vue'
    import { Link } from '@inertiajs/vue3';


    const props = defineProps({
        offer: Object,
        listingPrice: Number,
        isSold: Boolean,
    })

    const difference = computed(() => props.offer.amount - props.listingPrice)

    const madeOn = computed(() => new Date(props.offer.created_at).toDateString())
</script>
<template>
    <Box>
        <template #header>Offer {{ offer.id }}<span v-if="offer.accepted_at" class="bg-green-200 text-green-900 p-1 rounded-md uppercase ml-2">Accepted</span></template>
        <section class="flex  items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl"/>
                <div class="text-gray-500">
                    Difference <Price :price="difference"/>
                </div>
                <div class="text-gray-500 text-sm">
                    made by {{ offer.bidder.name }}
                </div>
                <div class="text-gray-500 text-sm">
                    Mede on {{ madeOn }}
                </div>
            </div>
            <Link v-if="!isSold" :href="route('realtor.offer.accept',{offer: offer.id})" method="put" class="btn-outline text-xs font-medium" as="button">Accept</Link>
        </section>
    </Box>
</template>
