<script setup>
import { Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    email: null,
    password: null,
    name: null,
    password_confirmation: null,
})

const register = () => form.post(route('user-account.store'))
</script>
<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="name" class="label">Name</label>
                <input class="input" type="text" id="name" v-model="form.name"/>
                <div class="input-error" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div>
                <label for="email" class="label">Email</label>
                <input class="input" type="text" id="email" v-model="form.email"/>
                <div class="input-error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input class="input" type="password" id="password" v-model="form.password"/>
                <div class="input-error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="label">Password Confirmation</label>
                <input class="input" type="password" id="password_confirmation" v-model="form.password_confirmation"/>
            </div>
            <div class="mt-4">
                <button class="primary-btn w-full" type="submit">Register</button>
                <div class="mt-4 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-500"> Already have account?</Link>
                </div>
            </div>
        </div>
    </form>
</template>
