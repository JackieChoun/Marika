<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Événements', href: '/admin/events' },
    { title: 'Nouvel événement', href: '/admin/events/create' },
];

const form = useForm({
    title: '',
    type: 'exposition',
    date_start: '',
    date_end: '',
    location: '',
    description: '',
    external_link: '',
    image: null,
});

const previewUrl = ref(null);

const handleImage = (e) => {
    const file = e.target.files[0];
    form.image = file;
    previewUrl.value = URL.createObjectURL(file);
};

const submit = () => {
    form.post('/admin/events', {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper py-10">
            <section class="mb-8">
                <h1 class="text-2xl font-semibold">Nouvel événement</h1>
            </section>

            <form
                @submit.prevent="submit"
                class="flex max-w-2xl flex-col gap-6"
            >
                <!-- Titre -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">Titre</label>
                    <input
                        v-model="form.title"
                        type="text"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                    <p v-if="form.errors.title" class="text-xs text-red-600">
                        {{ form.errors.title }}
                    </p>
                </div>

                <!-- Type -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">Type</label>
                    <select
                        v-model="form.type"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    >
                        <option value="exposition">Exposition</option>
                        <option value="stage">Masterclass / Stage</option>
                    </select>
                </div>

                <!-- Dates -->
                <div class="flex gap-4">
                    <div class="flex flex-1 flex-col gap-1">
                        <label class="text-sm font-semibold">
                            Date début
                        </label>
                        <input
                            v-model="form.date_start"
                            type="date"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                        />
                    </div>

                    <div class="flex flex-1 flex-col gap-1">
                        <label class="text-sm font-semibold">
                            Date fin
                            <span class="font-normal text-gray-400">
                                (optionnelle)
                            </span>
                        </label>
                        <input
                            v-model="form.date_end"
                            type="date"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                        />
                    </div>
                </div>

                <!-- Lieu -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">Lieu</label>
                    <input
                        v-model="form.location"
                        type="text"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                </div>

                <!-- Lien -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">
                        Lien externe
                        <span class="font-normal text-gray-400">
                            (optionnel)
                        </span>
                    </label>
                    <input
                        v-model="form.external_link"
                        type="url"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                </div>

                <!-- Description -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">
                        Description
                        <span class="font-normal text-gray-400">
                            (optionnelle)
                        </span>
                    </label>
                    <textarea
                        v-model="form.description"
                        rows="4"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    ></textarea>
                </div>

                <!-- Image -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">Image</label>
                    <input
                        type="file"
                        accept="image/*"
                        class="text-sm"
                        @change="handleImage"
                    />

                    <img
                        v-if="previewUrl"
                        :src="previewUrl"
                        class="mt-2 h-40 w-40 rounded-lg object-cover"
                    />
                </div>

                <!-- Boutons -->
                <div class="flex gap-4">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-full bg-red-900 px-5 py-3 text-sm font-bold text-white hover:bg-red-700 disabled:opacity-50"
                    >
                        Créer
                    </button>

                    <a
                        href="/admin/events"
                        class="rounded-full border border-gray-300 px-5 py-3 text-sm font-semibold hover:bg-gray-50"
                    >
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
