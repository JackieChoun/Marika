<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';

defineProps({
    actualites: Array,
});
</script>

<template>
    <SiteLayout>
        <h1
            class="pt-4 pb-6 text-center text-5xl font-extralight lg:py-5 lg:text-7xl"
        >
            Actualités et Masterclass
        </h1>

        <section>
            <h2>Liste des Actualités</h2>
            <div v-for="actu in actualites" :key="actu.id" class="actu-item">
                <h3>{{ actu.titre }}</h3>
                <p>{{ actu.description }}</p>
                <small>{{ actu.date }}</small>
            </div>
        </section>
        <section class="masterclass">
            <h2>Masterclass</h2>
            <p>Contenu de la masterclass à venir...</p>
        </section>
    </SiteLayout>
</template>
