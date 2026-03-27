<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const breadcrumbs = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Périodes', href: '/admin/periods' },
    { title: 'Modification période', href: '/admin/periods/edit' },
];

const props = defineProps({
    period: Object,
});

const form = useForm({
    name: props.period.name,
    start_date: props.period.start_date,
    end_date: props.period.end_date ?? '',
    description: props.period.description ?? '',
    image: null,
});

const previewUrl = ref(null);

const handleImage = (e) => {
    const file = e.target.files[0];
    form.image = file;
    previewUrl.value = URL.createObjectURL(file);
};

const submit = () => {
    form.post(`/admin/periods/${props.period.id}?_method=PUT`, {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper py-10">
            <header class="mb-8 flex items-center justify-between">
                <h1 class="text-2xl font-semibold">Modifier la période</h1>
            </header>

            <form
                @submit.prevent="submit"
                class="flex max-w-2xl flex-col gap-6"
            >
                <!-- Nom -->
                <div class="flex flex-col gap-1">
                    <label for="name" class="text-sm font-semibold">Nom</label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                    <p v-if="form.errors.name" class="text-xs text-red-600">
                        {{ form.errors.name }}
                    </p>
                </div>

                <!-- Date de début -->
                <div class="flex flex-col gap-1">
                    <label for="start_date" class="text-sm font-semibold"
                        >Date de début</label
                    >
                    <input
                        id="start_date"
                        v-model="form.start_date"
                        type="date"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                    <p
                        v-if="form.errors.start_date"
                        class="text-xs text-red-600"
                    >
                        {{ form.errors.start_date }}
                    </p>
                </div>

                <!-- Date de fin -->
                <div class="flex flex-col gap-1">
                    <label for="end_date" class="text-sm font-semibold"
                        >Date de fin
                        <span class="font-normal text-gray-400"
                            >(optionnelle)</span
                        ></label
                    >
                    <input
                        id="end_date"
                        v-model="form.end_date"
                        type="date"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm"
                    />
                    <p v-if="form.errors.end_date" class="text-xs text-red-600">
                        {{ form.errors.end_date }}
                    </p>
                </div>

                <!-- Description -->
                <div class="flex flex-col gap-1">
                    <label for="description" class="text-sm font-semibold"
                        >Description
                        <span class="font-normal text-gray-400"
                            >(optionnelle)</span
                        ></label
                    >
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

                <!-- Image actuelle ou prévisualisation -->
                <div class="flex flex-col gap-1">
                    <p class="text-sm font-semibold">
                        {{ previewUrl ? 'Nouvelle image' : 'Image actuelle' }}
                    </p>
                    <img
                        v-if="previewUrl || period.image_path"
                        :src="previewUrl ?? `/storage/${period.image_path}`"
                        :alt="period.name"
                        class="h-32 w-32 rounded-lg object-cover"
                    />
                </div>

                <!-- Nouvelle image -->
                <div class="flex flex-col gap-1">
                    <label for="image" class="text-sm font-semibold">
                        {{ period.image_path ? "Remplacer l'image" : 'Image' }}
                        <span class="font-normal text-gray-400"
                            >(optionnelle)</span
                        >
                    </label>
                    <input
                        id="image"
                        type="file"
                        accept="image/*"
                        class="text-sm"
                        @change="handleImage"
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
                        Enregistrer
                    </button>
                    <a
                        href="/admin/periods"
                        class="rounded-full border border-gray-300 px-5 py-3 text-sm font-semibold hover:bg-gray-50"
                    >
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
