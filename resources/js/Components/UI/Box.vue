<script setup>

</script>

<template>
    <div class="border border-gray-200 rounded-md p-4 shadow-sm text-gray-400">
        <div class="text-gray-500 font-medium">
            <slot name="header" />
        </div>
        <slot/>
    </div>
</template>
