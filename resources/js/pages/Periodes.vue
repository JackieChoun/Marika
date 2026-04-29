<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    periods: Array,
});

const getYear = (date) => (date ? new Date(date).getFullYear() : null);
</script>

<template>
    <SiteLayout>
        <h1
            class="pt-4 pb-8 text-center text-5xl font-extralight lg:py-5 lg:text-7xl"
        >
            Périodes
        </h1>

        <section class="py-10">
            <ul class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <li v-for="period in periods" :key="period.id">
                    <Link
                        :href="`/oeuvres?period=${period.id}`"
                        class="flex flex-col items-center gap-3"
                    >
                        <h2 class="text-2xl font-light">{{ period.name }}</h2>
                        <img
                            v-if="period.image_path"
                            :src="`/storage/${period.image_path}`"
                            :alt="period.name"
                            class="h-80 w-full object-cover transition hover:scale-105"
                        />
                        <p class="text-sm text-gray-500">
                            {{ getYear(period.start_date) }} —
                            {{ getYear(period.end_date) ?? 'en cours' }}
                        </p>
                        <p
                            v-if="period.description"
                            class="text-sm leading-relaxed text-gray-700"
                        >
                            {{ period.description }}
                        </p>
                    </Link>
                </li>
            </ul>
            <p v-if="periods.length === 0" class="text-sm text-gray-500">
                Aucune période pour l'instant.
            </p>
        </section>
    </SiteLayout>
</template>
