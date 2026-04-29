<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import CarouselSection from '@/components/CarouselSection.vue';
import CarouselSectionMobile from '@/components/CarouselSectionMobile.vue';

defineProps({
    latestPaintings: Array,
});
</script>

<template>
    <SiteLayout>
        <h1
            class="pt-4 pb-8 text-center text-5xl font-extralight lg:py-5 lg:text-7xl"
        >
            Marika Perros
        </h1>
        <section
            class="flex h-[calc(80dvh-6rem)] flex-col overflow-hidden md:h-[calc(100dvh-8rem)] lg:h-[calc(96dvh-10rem)]"
        >
            <CarouselSection
                class="hidden md:block"
                :paintings="latestPaintings"
            />
            <CarouselSectionMobile
                class="md:hidden"
                :paintings="latestPaintings"
            />
        </section>
        <section class="gap-5 py-6 lg:py-10">
            <h2
                class="pb-3 text-center text-2xl font-light lg:pb-5 lg:text-left lg:text-4xl"
            >
                Faire peindre la matière
            </h2>
            <p
                class="text-center text-sm leading-relaxed md:text-justify lg:text-lg"
            >
                Peindre, c’est jouer ! Jouer avec la matière, être l’alchimiste
                d’un monde qui se crée.<br />
                Depuis une quarantaine d’années, j’explore la figuration
                suggérée, avec des périodes diverses ayant toujours un lien
                entre elles. C’est un maillage étroit entre pensées et formes,
                hasard, matière, mouvement, figure, abstraction, vitesse,
                lenteur, rythme, respiration.
            </p>
        </section>
    </SiteLayout>
</template>
