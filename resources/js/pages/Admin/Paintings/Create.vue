<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Œuvres', href: '/admin/paintings' },
    { title: 'Création œuvre', href: '/admin/paintings/create' },
];

defineProps({
    periods: Array,
});

const form = useForm({
    title: '',
    date: '',
    description: '',
    height: '',
    width: '',
    price: '',
    is_available: true,
    technique: '',
    period_id: '',
    image: null,
});

const previewUrl = ref(null);

const handleImage = (e) => {
    const file = e.target.files[0];
    form.image = file;
    previewUrl.value = URL.createObjectURL(file);
};

const submit = () => {
    form.post('/admin/paintings', {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper py-10">
            <section class="mb-8 flex items-center justify-between">
                <h1 class="text-2xl font-semibold">Nouvelle œuvre</h1>
            </section>

            <form
                @submit.prevent="submit"
                class="flex max-w-2xl flex-col gap-6"
            >
                <!-- Titre -->
                <div class="flex flex-col gap-1">
                    <label for="title" class="text-sm font-semibold"
                        >Titre</label
                    >
                    <input
                        id="title"
                        v-model="form.title"
                        type="text"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                        placeholder="Ex: La naissance de Vénus"
                    />
                    <p v-if="form.errors.title" class="text-xs text-red-600">
                        {{ form.errors.title }}
                    </p>
                </div>

                <!-- Technique -->
                <div class="flex flex-col gap-1">
                    <label for="technique" class="text-sm font-semibold"
                        >Technique</label
                    >
                    <input
                        id="technique"
                        v-model="form.technique"
                        type="text"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                        placeholder="Ex: Huile sur toile"
                    />
                    <p
                        v-if="form.errors.technique"
                        class="text-xs text-red-600"
                    >
                        {{ form.errors.technique }}
                    </p>
                </div>

                <!-- Date -->
                <div class="flex flex-col gap-1">
                    <label for="date" class="text-sm font-semibold">
                        Date
                        <span class="font-normal text-gray-400"
                            >(optionnelle)</span
                        >
                    </label>
                    <input
                        id="date"
                        v-model="form.date"
                        type="date"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                    <p v-if="form.errors.date" class="text-xs text-red-600">
                        {{ form.errors.date }}
                    </p>
                </div>

                <!-- Dimensions -->
                <div class="flex gap-4">
                    <div class="flex flex-1 flex-col gap-1">
                        <label for="height" class="text-sm font-semibold">
                            Hauteur (cm)
                            <span class="font-normal text-gray-400"
                                >(optionnelle)</span
                            >
                        </label>
                        <input
                            id="height"
                            v-model="form.height"
                            type="number"
                            step="1"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                            placeholder="Ex: 60"
                        />
                        <p
                            v-if="form.errors.height"
                            class="text-xs text-red-600"
                        >
                            {{ form.errors.height }}
                        </p>
                    </div>
                    <div class="flex flex-1 flex-col gap-1">
                        <label for="width" class="text-sm font-semibold">
                            Largeur (cm)
                            <span class="font-normal text-gray-400"
                                >(optionnelle)</span
                            >
                        </label>
                        <input
                            id="width"
                            v-model="form.width"
                            type="number"
                            step="0.01"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                            placeholder="Ex: 80"
                        />
                        <p
                            v-if="form.errors.width"
                            class="text-xs text-red-600"
                        >
                            {{ form.errors.width }}
                        </p>
                    </div>
                </div>

                <!-- Prix -->
                <div class="flex flex-col gap-1">
                    <label for="price" class="text-sm font-semibold">
                        Prix (€)
                        <span class="font-normal text-gray-400"
                            >(optionnel)</span
                        >
                    </label>
                    <input
                        id="price"
                        v-model="form.price"
                        type="number"
                        step="0.01"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                        placeholder="Ex: 1200"
                    />
                    <p v-if="form.errors.price" class="text-xs text-red-600">
                        {{ form.errors.price }}
                    </p>
                </div>

                <!-- Disponibilité -->
                <div class="flex items-center gap-3">
                    <input
                        id="is_available"
                        v-model="form.is_available"
                        type="checkbox"
                        class="h-4 w-4"
                    />
                    <label for="is_available" class="text-sm font-semibold"
                        >Disponible à la vente</label
                    >
                </div>

                <!-- Période -->
                <div class="flex flex-col gap-1">
                    <label for="period_id" class="text-sm font-semibold">
                        Période
                        <span class="font-normal text-gray-400"
                            >(optionnelle)</span
                        >
                    </label>
                    <select
                        id="period_id"
                        v-model="form.period_id"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    >
                        <option value="">— Aucune période —</option>
                        <option
                            v-for="period in periods"
                            :key="period.id"
                            :value="period.id"
                        >
                            {{ period.name }}
                        </option>
                    </select>
                    <p
                        v-if="form.errors.period_id"
                        class="text-xs text-red-600"
                    >
                        {{ form.errors.period_id }}
                    </p>
                </div>

                <!-- Description -->
                <div class="flex flex-col gap-1">
                    <label for="description" class="text-sm font-semibold">
                        Description
                        <span class="font-normal text-gray-400"
                            >(optionnelle)</span
                        >
                    </label>
                    <textarea
                        id="description"
                        v-model="form.description"
                        rows="4"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    ></textarea>
                    <p
                        v-if="form.errors.description"
                        class="text-xs text-red-600"
                    >
                        {{ form.errors.description }}
                    </p>
                </div>

                <!-- Image -->
                <div class="flex flex-col gap-1">
                    <label for="image" class="text-sm font-semibold"
                        >Image</label
                    >
                    <input
                        id="image"
                        type="file"
                        accept="image/*"
                        class="text-sm"
                        @change="handleImage"
                    />
                    <img
                        v-if="previewUrl"
                        :src="previewUrl"
                        alt="Prévisualisation"
                        class="mt-2 h-40 w-40 rounded-lg object-cover"
                    />
                    <p v-if="form.errors.image" class="text-xs text-red-600">
                        {{ form.errors.image }}
                    </p>
                </div>

                <!-- Boutons -->
                <div class="flex gap-4">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-full bg-red-900 px-5 py-3 text-sm font-bold text-white hover:bg-red-700 disabled:opacity-50"
                    >
                        Créer l'œuvre
                    </button>
                    <a
                        href="/admin/paintings"
                        class="rounded-full border border-gray-300 px-5 py-3 text-sm font-semibold hover:bg-gray-50"
                    >
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
