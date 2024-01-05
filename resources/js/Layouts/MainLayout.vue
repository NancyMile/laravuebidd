<script setup>
import  {Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';
 //page.props.flash.success
 const page = usePage()
 const flashSuccess =  computed(
    () => page.props.flash.success,
 )
const user = computed(() => page.props.user)

 const login = () => form.post(route('login.store'))

 //maximum number of notification displayed on bell 9
 const notificationCount = computed (() => Math.min(page.props.user.notificationCount,9))
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
                <div class="flex items-center gap-4" v-if="user">
                    <Link :href="route('notification.index')" class="text-gray-500 relative pr-2 pb-2 text-lg" >
                        🔔
                        <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 rounded-full text-xs  text-center text-white font-medium border border-white">
                            {{ notificationCount }}
                        </div>
                    </Link>
                    <Link :href="route('realtor.listing.index')" class="text-sm text-gray-500">
                        {{ user.name }}
                    </Link>
                    <Link :href="route('realtor.listing.create')" class="bg-indigo-600 hover:bg-indigo-500 text-white p-2 cursor-pointer font-medium rounded-md">+ New Listing</Link>
                    <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                </div>
                <div v-else class=" flex items-center gap-4">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Login</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="primary-btn">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>
