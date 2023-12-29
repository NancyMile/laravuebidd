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

const create = () => form.post(route('realtor.listing.store'))

</script>

<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input type="text" v-model="form.beds" class="input"/>
                <div v-if="form.errors.beds" class="input-error">
                    {{ form.errors.beds }}
                </div>
            </div>
        <div class="col-span-2">
            <label class="label">Baths</label>
                <input type="text" v-model="form.baths" class="input"/>
                <div v-if="form.errors.baths" class="input-error">
                    {{ form.errors.baths }}
                </div>
        </div>
        <div class="col-span-2">
            <label class="label">Area</label>
                <input type="text" v-model="form.area" class="input"/>
                <div v-if="form.errors.area" class="input-error">
                    {{ form.errors.area }}
                </div>
        </div>
        <div class="col-span-4">
            <label class="label">City</label>
                <input type="text" v-model="form.city" class="input"/>
                <div v-if="form.errors.city" class="input-error">
                    {{ form.errors.city }}
                </div>
        </div>
        <div class="col-span-2">
            <label class="label">Post Code</label>
                <input type="text" v-model="form.code" class="input"/>
                <div v-if="form.errors.code" class="input-error">
                    {{ form.errors.code }}
                </div>
        </div>
        <div class="col-span-4">
            <label class="label">Street</label>
                <input type="text" v-model="form.street" class="input"/>
                <div v-if="form.errors.street" class="input-error">
                    {{ form.errors.street }}
                </div>
        </div>
        <div class="col-span-2">
            <label class="label">Street Number</label>
                <input type="text" v-model="form.street_number" class="input"/>
                <div v-if="form.errors.street_number" class="input-error">
                    {{ form.errors.street_number }}
                </div>
        </div>
        <div class="col-span-6">
            <label class="label">Price</label>
                <input type="text" v-model="form.price" class="input"/>
                <div v-if="form.errors.price" class="input-error">
                    {{ form.errors.price }}
                </div>
        </div>
        <div class="col-span-6">
            <button type="submit" class="primary-btn">Create</button>
        </div>
        </div>
    </form>
</template>
