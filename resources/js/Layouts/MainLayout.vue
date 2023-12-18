<script setup>
import  {Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';
 //page.props.flash.success
 const page = usePage()
 const flashSuccess =  computed(
    () => page.props.flash.success,
 )
//const timer = ref(0);

//setInterval(() => timer.value++, 1000)
</script>

<template>
    <Link href="/">Home!</Link>
    <Link href="show">Show!</Link>
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot>Default</slot>
</template>

<style scoped>
    .success {
        background-color: green;
        color: white;
    }

</style>
