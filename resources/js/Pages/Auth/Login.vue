<script setup>
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    email: null,
    password: null
})

const login = () => form.post(route('login.store'))
</script>
<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="email" class="label">Email</label>
                <input class="input" type="text" id="email" v-model="form.email"/>
                <div class="input-error">
                    Potential errors
                </div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input class="input" type="password" id="password" v-model="form.password"/>
            </div>
            <div class="mt-4">
                <button class="primary-btn w-full" type="submit">Login</button>
            </div>
        </div>
    </form>
</template>
