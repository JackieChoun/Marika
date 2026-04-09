<script setup lang="ts">
import { ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: dashboard() },
    { title: 'Œuvres', href: '/admin/paintings' },
];

defineProps<{
    periods: Array<{
        id: number;
        name: string;
        paintings: Array<{
            id: number;
            title: string;
            image_path: string;
            technique: string;
            date: string;
        }>;
    }>;
}>();

const openPeriods = ref<number[]>([]);

const togglePeriod = (id: number) => {
    if (openPeriods.value.includes(id)) {
        openPeriods.value = openPeriods.value.filter((p) => p !== id);
    } else {
        openPeriods.value.push(id);
    }
};

const deleteOeuvre = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette oeuvre ?')) {
        router.delete(`/admin/paintings/${id}`);
    }
};

const flash = usePage().props.flash as { success?: string };
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper w-full py-10">
            <section class="mb-8 flex items-center justify-between">
                <h1 class="text-4xl font-semibold">Œuvres</h1>
                <Link
                    href="/admin/paintings/create"
                    class="rounded-full bg-red-900 px-5 py-3 text-sm font-bold text-white hover:bg-red-700"
                >
                    Nouvelle Œuvre
                </Link>
            </section>

            <!-- Message flash -->
            <p
                v-if="flash?.success"
                class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-sm text-green-800"
            >
                {{ flash.success }}
            </p>

            <!-- Liste par périodes -->
            <ul class="flex flex-col divide-y divide-gray-200">
                <li v-for="period in periods" :key="period.id">
                    <!-- En-tête période cliquable -->
                    <button
                        @click="togglePeriod(period.id)"
                        class="flex w-full items-center justify-between py-4 text-left"
                    >
                        <span class="font-semibold">{{ period.name }}</span>
                        <span class="text-sm text-gray-500">
                            {{ period.paintings.length }} oeuvre{{
                                period.paintings.length > 1 ? 's' : ''
                            }}
                            {{ openPeriods.includes(period.id) ? '▲' : '▼' }}
                        </span>
                    </button>

                    <!-- paintings de la période -->
                    <ul
                        v-if="openPeriods.includes(period.id)"
                        class="mb-4 flex flex-col gap-3 pl-4"
                    >
                        <li
                            v-for="painting in period.paintings"
                            :key="painting.id"
                            class="flex items-center justify-between gap-4 rounded-lg border border-gray-100 p-3"
                        >
                            <div class="flex items-center gap-4">
                                <img
                                    v-if="painting.image_path"
                                    :src="`/storage/${painting.image_path}`"
                                    :alt="painting.title"
                                    class="h-12 w-12 shrink-0 rounded object-cover"
                                />
                                <div>
                                    <p class="font-semibold">
                                        {{ painting.title }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ painting.technique }} —
                                        {{ painting.date }}
                                    </p>
                                </div>
                            </div>
                            <button
                                @click="deleteOeuvre(painting.id)"
                                class="cursor-pointer text-sm font-semibold text-red-600 hover:underline"
                            >
                                Supprimer
                            </button>
                        </li>

                        <li
                            v-if="period.paintings.length === 0"
                            class="text-sm text-gray-400"
                        >
                            Aucune oeuvre dans cette période.
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
