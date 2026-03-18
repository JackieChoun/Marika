<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

const modules = [Autoplay, Pagination];

const paintings = [
    {
        title: 'Forêt',
        technique: 'Huile sur toile',
        size: '60 x 80 cm',
        year: '2023',
        image: 'images/paintings/Foret.png',
    },
    {
        title: 'Douceur',
        technique: 'Huile sur toile',
        size: '50 x 70 cm',
        year: '2022',
        image: 'images/paintings/Douceur.png',
    },
    {
        title: 'Vagues',
        technique: 'Huile sur toile',
        size: '70 x 90 cm',
        year: '2021',
        image: 'images/paintings/Vagues.png',
    },
    {
        title: 'Volcano',
        technique: 'Huile sur toile',
        size: '60 x 80 cm',
        year: '2023',
        image: 'images/paintings/Volcano.png',
    },
];
</script>

<template>
    <section class="h-full w-full">
        <Swiper
            direction="horizontal"
            :loop="true"
            :autoplay="{ delay: 5000, disableOnInteraction: false }"
            :pagination="{ clickable: true }"
            :modules="modules"
            class="h-full w-full"
        >
            <SwiperSlide
                v-for="painting in paintings"
                :key="
                    painting.image +
                    painting.title +
                    painting.year +
                    painting.technique +
                    painting.size
                "
            >
                <img
                    :src="painting.image"
                    :alt="painting.title"
                    loading="lazy"
                />
                <div class="flex gap-2 pt-4 text-sm">
                    <p class="font-semibold">
                        {{ painting.title }}
                    </p>

                    <p class="text-gray-500">
                        {{ painting.technique }}
                    </p>

                    <p class="text-gray-500">
                        {{ painting.size }}
                    </p>

                    <p class="text-gray-500">
                        {{ painting.year }}
                    </p>
                </div>
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<style>
@media (max-width: 768px) {
    .swiper-slide img {
        display: block;
        width: 100%;
        height: auto;
        object-fit: contain;
    }
    .swiper-pagination-bullet {
        background: black;
        opacity: 0.4;
        border-radius: 0;
        width: 10px;
        height: 10px;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        background: #8b0f0f;
        opacity: 1;
        height: 20px;
    }
}
</style>
