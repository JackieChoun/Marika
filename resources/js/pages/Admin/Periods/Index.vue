<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, router, usePage } from '@inertiajs/vue3';

const breadcrumbs = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Périodes', href: '/admin/periods' },
];

defineProps({
    periods: Array,
});

const deletePeriod = (id) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette période ?')) {
        router.delete(`/admin/periods/${id}`);
    }
};

const flash = usePage().props.flash;
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper w-full py-10">
            <section class="mb-8 flex w-full items-center justify-between">
                <h1 class="text-4xl font-semibold">Périodes</h1>
                <Link
                    href="/admin/periods/create"
                    class="rounded-full bg-red-900 px-5 py-3 text-sm font-bold text-white hover:bg-red-700"
                >
                    Nouvelle période
                </Link>
            </section>

            <!-- Message flash -->
            <p
                v-if="flash?.success"
                class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-sm text-green-800"
            >
                {{ flash.success }}
            </p>

            <!-- Liste des périodes -->
            <ul class="divide-y divide-gray-200">
                <li
                    v-for="period in periods"
                    :key="period.id"
                    class="flex items-center justify-between py-4"
                >
                    <div>
                        <p class="font-semibold">{{ period.name }}</p>
                        <p class="text-sm text-gray-500">
                            {{ period.start_date }} —
                            {{ period.end_date ?? 'en cours' }}
                        </p>
                    </div>
                    <img
                        v-if="period.image_path"
                        :src="`/storage/${period.image_path}`"
                        :alt="period.name"
                        class="h-20 w-20 shrink-0 rounded-full object-cover"
                    />
                    <div
                        v-else
                        class="h-20 w-20 shrink-0 rounded-full bg-gray-200"
                    ></div>
                    <div class="flex gap-3">
                        <Link
                            :href="`/admin/periods/${period.id}/edit`"
                            class="text-sm font-semibold text-blue-600 hover:underline"
                        >
                            Modifier
                        </Link>
                        <button
                            @click="deletePeriod(period.id)"
                            class="cursor-pointer text-sm font-semibold text-red-600 hover:underline"
                        >
                            Supprimer
                        </button>
                    </div>
                </li>
            </ul>

            <p v-if="periods.length === 0" class="text-sm text-gray-500">
                Aucune période pour l'instant.
            </p>
        </div>
    </AppLayout>
</template>
