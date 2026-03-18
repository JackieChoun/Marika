<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import CarouselSection from '@/components/CarouselSection.vue';
import CarouselSectionMobile from '@/components/CarouselSectionMobile.vue';
</script>

<template>
    <SiteLayout>
        <div
            class="flex flex-col overflow-hidden"
            style="height: calc(100dvh - 5rem)"
        >
            <h1
                class="pt-4 pb-20 text-center text-5xl font-extralight lg:py-5 lg:text-7xl"
            >
                Marika Perros
            </h1>
            <CarouselSection class="hidden md:block" />
            <CarouselSectionMobile class="md:hidden" />
        </div>
        <section class="gap-5 py-6 lg:py-10">
            <h2
                class="pb-2 text-center text-2xl font-light lg:pb-5 lg:text-left lg:text-4xl"
            >
                Artiste peintre et art contemporain
            </h2>
            <p
                class="px-5 text-center leading-relaxed md:text-justify lg:text-lg"
            >
                Je suis une artiste peintre passionnée, spécialisée dans la
                création de paysages et de scènes inspirées de la nature. Mon
                travail explore les émotions et les atmosphères à travers des
                couleurs vibrantes et des compositions dynamiques. Chaque
                tableau est une invitation à plonger dans un univers visuel
                unique, où la beauté de la nature rencontre l'expression
                artistique.
            </p>
        </section>
    </SiteLayout>
</template>
