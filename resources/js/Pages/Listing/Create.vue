<script setup>
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    beds:0,
    baths:0,
    area:0,
    city:null,
    code:null,
    street:null,
    street_number:null,
    price:0,
})

const create = () => form.post(route('listing.store'))

</script>

<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="block mb-1 font-medium">Beds</label>
                <input type="text" v-model="form.beds" class="block w-full p-2 rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.beds">
                    {{ form.errors.beds }}
                </div>
            </div>
        <div class="col-span-2">
            <label class="block mb-1 font-medium">Baths</label>
                <input type="text" v-model="form.baths" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.baths">
                    {{ form.errors.baths }}
                </div>
        </div>
        <div class="col-span-2">
            <label class="block mb-1 font-medium">Area</label>
                <input type="text" v-model="form.area" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.area">
                    {{ form.errors.area }}
                </div>
        </div>
        <div class="col-span-4">
            <label class="block mb-1 font-medium">City</label>
                <input type="text" v-model="form.city" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.city">
                    {{ form.errors.city }}
                </div>
        </div>
        <div class="col-span-2">
            <label class="block mb-1 font-medium">Post Code</label>
                <input type="text" v-model="form.code" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.code">
                    {{ form.errors.code }}
                </div>
        </div>
        <div class="col-span-4">
            <label class="block mb-1 font-medium">Street</label>
                <input type="text" v-model="form.street" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.street">
                    {{ form.errors.street }}
                </div>
        </div>
        <div class="col-span-2">
            <label class="block mb-1 font-medium">Street Number</label>
                <input type="text" v-model="form.street_number" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.street_number">
                    {{ form.errors.street_number }}
                </div>
        </div>
        <div class="col-span-6">
            <label class="block mb-1 font-medium">Price</label>
                <input type="text" v-model="form.price" class="block w-full rounded-md shadow-sm border-gray-300 text-gray-500"/>
                <div v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
        </div>
        <div class="col-span-6">
            <button type="submit">Create</button>
        </div>
        </div>
    </form>
</template>

<style scoped>
    label {
        margin-right: 2em;
    }

    div {
        padding: 2px
    }
</style>
