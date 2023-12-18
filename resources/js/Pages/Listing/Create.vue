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

const create = () => form.post('/listing')

</script>

<template>
    <form @submit.prevent="create">
        <div>
            <div>
                <label>Beds</label>
                <input type="text" v-model="form.beds" />
                <div v-if="form.errors.beds">
                    {{ form.errors.beds }}
                </div>
            </div>
        <div>
            <label>Baths</label>
                <input type="text" v-model="form.baths"/>
                <div v-if="form.errors.baths">
                    {{ form.errors.baths }}
                </div>
        </div>
        <div>
            <label>Area</label>
                <input type="text" v-model="form.area" />
                <div v-if="form.errors.area">
                    {{ form.errors.area }}
                </div>
        </div>
        <div>
            <label>City</label>
                <input type="text" v-model="form.city" />
                <div v-if="form.errors.city">
                    {{ form.errors.city }}
                </div>
        </div>
        <div>
            <label>Post Code</label>
                <input type="text" v-model="form.code" />
                <div v-if="form.errors.code">
                    {{ form.errors.code }}
                </div>
        </div>
        <div>
            <label>Street</label>
                <input type="text" v-model="form.street"/>
                <div v-if="form.errors.street">
                    {{ form.errors.street }}
                </div>
        </div>
        <div>
            <label>Street Number</label>
                <input type="text" v-model="form.street_number"/>
                <div v-if="form.errors.street_number">
                    {{ form.errors.street_number }}
                </div>
        </div>
        <div>
            <label>Price</label>
                <input type="text" v-model="form.price" />
                <div v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
        </div>
        <div>
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
