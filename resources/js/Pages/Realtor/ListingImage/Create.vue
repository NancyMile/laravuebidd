<script setup>
defineProps({
    listing: Object
})
</script>

<template>
 <form :action="route('realtor.listing.image.store', {listing: listing.id})" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <button type="submit" class="btn-outline">Upload</button>
 </form>
</template>
