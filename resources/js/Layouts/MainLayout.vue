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
                    <div class="text-sm text-gray-500">
                        {{ user.name }}
                    </div>
                    <Link :href="route('listing.create')" class="bg-indigo-600 hover:bg-indigo-500 text-white p-2 cursor-pointer font-medium rounded-md">+ New Listing</Link>
                    <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                </div>
                <div v-else>
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
