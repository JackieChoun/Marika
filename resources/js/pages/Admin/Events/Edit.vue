<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Événements', href: '/admin/events' },
    { title: 'Modification événement', href: '/admin/events/edit' },
];

const props = defineProps({
    event: Object,
});

const form = useForm({
    title: props.event.title,
    type: props.event.type,
    date_start: props.event.date_start,
    date_end: props.event.date_end,
    location: props.event.location,
    description: props.event.description,
    external_link: props.event.external_link,
    image: null,
});

const previewUrl = ref(
    props.event.image_path ? `/storage/${props.event.image_path}` : null,
);

const handleImage = (e) => {
    const file = e.target.files[0];
    form.image = file;
    previewUrl.value = URL.createObjectURL(file);
};

const submit = () => {
    form.put(`/admin/events/${props.event.id}`, {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper py-10">
            <h1 class="mb-6 text-2xl font-semibold">Modifier l’événement</h1>

            <form
                @submit.prevent="submit"
                class="flex max-w-2xl flex-col gap-6"
            >
                <!-- Titre -->
                <input v-model="form.title" type="text" class="border p-2" />

                <!-- Type -->
                <select v-model="form.type" class="border p-2">
                    <option value="exposition">Exposition</option>
                    <option value="stage">Masterclass</option>
                </select>

                <!-- Dates -->
                <input
                    v-model="form.date_start"
                    type="date"
                    class="border p-2"
                />
                <input v-model="form.date_end" type="date" class="border p-2" />

                <!-- Lieu -->
                <input
                    v-model="form.location"
                    type="text"
                    class="border p-2"
                    placeholder="Lieu"
                />

                <!-- Lien -->
                <input
                    v-model="form.external_link"
                    type="text"
                    class="border p-2"
                    placeholder="https://lien.com"
                />

                <!-- Description -->
                <textarea
                    v-model="form.description"
                    class="border p-2"
                    placeholder="Description"
                ></textarea>

                <!-- Image -->
                <input type="file" @change="handleImage" />
                <img
                    v-if="previewUrl"
                    :src="previewUrl"
                    class="h-40 object-cover"
                />

                <!-- Bouton -->
                <button
                    type="submit"
                    class="cursor-pointer rounded bg-red-900 px-4 py-2 text-white hover:bg-red-700"
                >
                    Mettre à jour
                </button>
            </form>
        </div>
    </AppLayout>
</template>
