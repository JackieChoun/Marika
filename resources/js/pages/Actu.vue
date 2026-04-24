<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    events: Array,
});

// séparation
const expositions = computed(() =>
    props.events.filter((e) => e.type === 'exposition'),
);

const stages = computed(() => props.events.filter((e) => e.type === 'stage'));

// date
const formatDate = (date) => {
    return new Intl.DateTimeFormat('fr-FR', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    }).format(new Date(date));
};
</script>

<template>
    <SiteLayout>
        <h1
            class="pt-4 pb-6 text-center text-5xl font-extralight lg:py-5 lg:text-7xl"
        >
            Actualités et Masterclass
        </h1>

        <section class="space-y-16 pb-16">
            <!-- EXPOSITIONS -->
            <div v-if="expositions.length > 0">
                <h2 class="mb-6 text-2xl font-semibold">Expositions</h2>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <Link
                        v-for="event in expositions"
                        :key="event.id"
                        class="flex w-full cursor-pointer flex-col rounded-sm shadow-2xl transition-transform duration-300 ease-in-out hover:scale-102 hover:shadow-2xl/50"
                        :href="`/events/${event.id}`"
                    >
                        <img
                            v-if="event.image_path"
                            :src="`/storage/${event.image_path}`"
                            :alt="event.title"
                            class="h-56 w-full rounded-t-sm object-cover object-center"
                        />

                        <div class="flex flex-col gap-2 px-4 pt-4 pb-6">
                            <h3 class="text-lg font-medium">
                                {{ event.title }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ formatDate(event.date_start) }}
                                <span v-if="event.date_end">
                                    → {{ formatDate(event.date_end) }}
                                </span>
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ event.location }}
                            </p>

                            <p
                                v-if="event.description"
                                class="line-clamp-3 text-sm text-gray-700"
                            >
                                {{ event.description }}
                            </p>
                            <a
                                v-if="event.external_link"
                                :href="event.external_link"
                                target="_blank"
                                @click.stop
                                class="text-sm text-red-900 hover:underline"
                            >
                                Voir le stage
                            </a>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- MASTERCLASS -->
            <div v-if="stages.length > 0">
                <h2 class="mb-6 text-2xl font-semibold">Masterclass</h2>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <Link
                        v-for="event in stages"
                        :key="event.id"
                        class="flex w-full cursor-pointer flex-col rounded-sm shadow-2xl transition-transform duration-300 ease-in-out hover:scale-102 hover:shadow-2xl/50"
                        :href="`/events/${event.id}`"
                    >
                        <img
                            v-if="event.image_path"
                            :src="`/storage/${event.image_path}`"
                            :alt="event.title"
                            class="h-56 w-full rounded-t-sm object-cover object-center"
                        />

                        <div class="flex flex-col gap-2 px-4 pt-4 pb-6">
                            <h3 class="text-lg font-semibold">
                                {{ event.title }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ formatDate(event.date_start) }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ event.location }}
                            </p>

                            <p
                                v-if="event.description"
                                class="line-clamp-3 text-sm text-gray-700"
                            >
                                {{ event.description }}
                            </p>

                            <a
                                v-if="event.external_link"
                                :href="event.external_link"
                                target="_blank"
                                @click.stop
                                class="text-sm text-red-900 hover:underline"
                            >
                                Voir le stage
                            </a>
                        </div>
                    </Link>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>
