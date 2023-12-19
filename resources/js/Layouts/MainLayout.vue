<script setup>
import  {Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';
 //page.props.flash.success
 const page = usePage()
 const flashSuccess =  computed(
    () => page.props.flash.success,
 )
</script>

<template>
    <header class="w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listing</Link>
                </div>
                <div class="text-xl text-indigo-600">
                    <Link :href="route('listing.index')">Laravue</Link>
                </div>
                <div>
                    <Link :href="route('listing.create')" class="bg-indigo-600 hover:bg-indigo-500 text-white p-2 cursor-pointer font-medium rounded-md">+ New Listing</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 bg-green-300 text-center text-white font-bold p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>
