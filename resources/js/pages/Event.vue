<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';

const props = defineProps({
    event: Object,
});

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
        <h1 class="pt-4 pb-6 text-center text-5xl font-extralight lg:text-7xl">
            {{ event.title }}
        </h1>

        <section class="mx-auto max-w-4xl space-y-6 pb-6 text-center">
            <!-- IMAGE -->
            <img
                v-if="event.image_path"
                :src="`/storage/${event.image_path}`"
                :alt="event.title"
                class="h-auto w-auto"
            />

            <!-- DATE ET LIEU -->
            <div class="space-y-2 text-center">
                <p class="text-gray-500">
                    Du {{ formatDate(event.date_start) }}
                    <span v-if="event.date_end">
                        au {{ formatDate(event.date_end) }}
                    </span>
                </p>

                <p class="text-xl font-light">
                    {{ event.location }}
                </p>
            </div>

            <!-- DESCRIPTION -->
            <p
                v-if="event.description"
                class="text-justify text-lg leading-relaxed"
            >
                {{ event.description }}
            </p>

            <!-- LIEN EXTERNE -->
            <div v-if="event.external_link" class="text-center">
                <a
                    :href="event.external_link"
                    target="_blank"
                    class="text-red-900 hover:underline"
                >
                    Voir plus d’informations
                </a>
            </div>
        </section>
    </SiteLayout>
</template>
