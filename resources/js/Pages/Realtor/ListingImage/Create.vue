<script setup>
defineProps({
    listing: Object
})
</script>

<template>
 <form :action="route('realtor.listing.image.store', {listing: listing.id})" method="post" >
    <input type="file" name="files" multiple>
    <button type="submit" class="btn-outline">Upload</button>
 </form>
</template>
