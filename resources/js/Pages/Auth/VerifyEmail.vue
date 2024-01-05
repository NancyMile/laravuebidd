<script setup>
import { Link } from '@inertiajs/vue3';


</script>
<template>
    <div>You need to be verify first to see this!!</div>
    <div>
        <Link :href="route('verification.send')" as="button" method="post" class="text-indigo-600">Resend verification email</Link>
    </div>
</template>
