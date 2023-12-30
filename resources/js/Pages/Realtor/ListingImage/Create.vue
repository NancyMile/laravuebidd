<script setup>
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const canUpload = computed(() => form.images.length)

const props = defineProps({
    listing: Object
})

const form = useForm({
    images: [],
});

const upload = () => {
    form.post(
        route('realtor.listing.image.store',{listing: props.listing.id}),
        {
            onSuccess: () => form.reset('images'),
        }
    )
}

const addFiles = (event) => {
    for (const image of event.target.files){
        form.images.push(image)
    }
}

const reset = () => form.reset('images')
</script>

<template>
    <Box>
        <template #header>Upload Images</template>
        <form @submit.prevent="upload">
            <section class="flex items-center gap-2 my-2">
                <input type="file" class="border rounded-md file:px-4 file:py-2 border-gray-200 file:text-gray-700 file:border-0 file:bg-gray-100 file:font-medium
                    file:hover:bg-gray-200 file:hover:cursor-pointer file:mr-4" multiple @input="addFiles">
                <button type="submit" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed" :disabled="!canUpload">Upload</button>
                <button type="reset" class="btn-outline" @click="reset">Reset</button>
            </section>
        </form>
    </Box>
</template>
