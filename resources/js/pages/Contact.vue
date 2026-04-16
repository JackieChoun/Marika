<script setup lang="ts">
import SiteLayout from '@/layouts/SiteLayout.vue';
</script>

<template>
    <SiteLayout>
        <h1 class="pt-4 pb-6 text-center text-5xl font-extralight lg:text-7xl">
            Contact
        </h1>
        <section class="grid-cols-2 gap-4 md:grid">
            <p class="flex items-center text-center md:text-justify lg:text-lg">
                Atelier attribué par la DRAC en 1998, de 70 m2, baie vitrée de
                4/5 m. J’expose aussi régulièrement d’autres artistes dans mon
                atelier conjointement à un spectacle vivant. Ce sont des soirées
                privées, maximum 50 personnes. J’appelle mon atelier pour
                l’occasion L’Atelier A. Rencontres entre les arts et les gens.
                Mon but : créer du lien. Les spectateurs sont de tous âges et de
                toutes conditions sociales. PS : je n’invite que les personnes
                par email, si vous désirez être invité, écrivez moi.
            </p>
            <img
                src="/images/atelier.jpg"
                alt="atelier"
                class="w-full md:pl-10"
            />
        </section>
        <section
            class="justify-around py-10 text-center text-xl md:flex md:text-2xl"
        >
            <address class="not-italic">
                <p
                    class="flex items-center justify-center gap-4 text-changecolor"
                >
                    Par Téléphone
                </p>
                <a href="tel:+33621802660" class="hover:underline">
                    06.21.80.26.60
                </a>
                <p
                    class="flex items-center justify-center gap-4 pt-10 text-changecolor"
                >
                    Par eMail
                </p>
                <a
                    href="mailto:marikaperros1@gmail.com"
                    class="md:hover:underline"
                >
                    marikaperros1@gmail.com
                </a>
                <p
                    class="flex items-center justify-center gap-4 pt-10 text-changecolor"
                >
                    L'Atelier
                </p>
                <p>2 cheminement Christophe Gluck, 31100 Toulouse</p>
            </address>
        </section>
        <div class="relative mx-auto h-[60vh] w-full pt-10 pb-10">
            <iframe
                src="https://www.google.com/maps?q=2+cheminement+Christophe+Gluck,+31100+Toulouse&z=17&hl=fr&maptype=roadmap&output=embed"
                title="Map gps - atelier de création artistique Marika Perros"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="h-full w-full"
            ></iframe>
        </div>
    </SiteLayout>
</template>
