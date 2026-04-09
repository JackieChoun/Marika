<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { Link, router } from '@inertiajs/vue3';

const props = defineProps<{
    events: Array<any>;
    filters: {
        type: string | null;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: dashboard() },
    { title: 'Événements', href: '/admin/events' },
];

// filtre
const filterByType = (type: string | null) => {
    router.get('/admin/events', type ? { type } : {}, {
        preserveScroll: true,
    });
};

// delete
const deleteEvent = (id: number) => {
    if (confirm('Supprimer cet élément ?')) {
        router.delete(`/admin/events/${id}`);
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper w-full py-10">
            <!-- HEADER -->
            <section class="mb-8 flex items-center justify-between">
                <h1 class="text-4xl font-semibold">Événements</h1>

                <Link
                    href="/admin/events/create"
                    class="rounded-full bg-red-900 px-5 py-3 text-sm font-bold text-white hover:bg-red-700"
                >
                    Nouvel événement
                </Link>
            </section>

            <!-- FILTRES -->
            <div class="mb-6 flex gap-2">
                <button
                    @click="filterByType(null)"
                    class="rounded-full border px-4 py-2 text-sm"
                    :class="{ 'bg-black text-white': !filters.type }"
                >
                    Tous
                </button>

                <button
                    @click="filterByType('exposition')"
                    class="rounded-full border px-4 py-2 text-sm"
                    :class="{
                        'bg-black text-white': filters.type === 'exposition',
                    }"
                >
                    Actualités
                </button>

                <button
                    @click="filterByType('stage')"
                    class="rounded-full border px-4 py-2 text-sm"
                    :class="{ 'bg-black text-white': filters.type === 'stage' }"
                >
                    Masterclass
                </button>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full border text-sm">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="p-3">Titre</th>
                            <th class="p-3">Type</th>
                            <th class="p-3">Date</th>
                            <th class="p-3">Lieu</th>
                            <th class="p-3 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr
                            v-for="event in events"
                            :key="event.id"
                            class="border-t hover:bg-gray-50"
                        >
                            <!-- TITRE -->
                            <td class="p-3 font-medium">
                                {{ event.title }}
                            </td>

                            <!-- TYPE -->
                            <td class="p-3">
                                <span
                                    class="rounded-full px-3 py-1 text-xs font-semibold"
                                    :class="{
                                        'bg-blue-100 text-blue-700':
                                            event.type === 'exposition',
                                        'bg-green-100 text-green-700':
                                            event.type === 'stage',
                                    }"
                                >
                                    {{
                                        event.type === 'exposition'
                                            ? 'Actualité'
                                            : 'Masterclass'
                                    }}
                                </span>
                            </td>

                            <!-- DATE -->
                            <td class="p-3">
                                {{
                                    new Date(
                                        event.date_start,
                                    ).toLocaleDateString('fr-FR')
                                }}
                            </td>

                            <!-- LIEU -->
                            <td class="p-3 text-gray-600">
                                {{ event.location }}
                            </td>

                            <!-- ACTIONS -->
                            <td class="p-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <Link
                                        :href="`/admin/events/${event.id}/edit`"
                                        class="text-sm font-semibold text-blue-600 hover:underline"
                                    >
                                        Modifier
                                    </Link>

                                    <button
                                        @click="deleteEvent(event.id)"
                                        class="cursor-pointer text-sm font-semibold text-red-600 hover:underline"
                                    >
                                        Supprimer
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- EMPTY -->
                        <tr v-if="events.length === 0">
                            <td
                                colspan="5"
                                class="p-6 text-center text-gray-500"
                            >
                                Aucun événement pour l’instant.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
