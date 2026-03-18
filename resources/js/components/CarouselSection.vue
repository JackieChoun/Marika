<!-- <script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, EffectCoverflow, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';
import 'swiper/css/pagination';

const modules = [Autoplay, EffectCoverflow, Pagination];
</script>

<template>
    <section class="h-full">
        <Swiper
            :modules="modules"
            effect="coverflow"
            :grab-cursor="true"
            :centered-slides="true"
            :slides-per-view="'auto'"
            :coverflow-effect="{
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            }"
            :loop="true"
            :autoplay="{ delay: 2000, disableOnInteraction: false }"
            :pagination="{ clickable: true }"
        >
            <SwiperSlide>
                <img src="images/paintings/Foret.png" alt="Forêt" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Douceur.png" alt="Douceur" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Vagues.png" alt="Vagues" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Volcano.png" alt="Volcano" />
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<style>
.swiper {
    width: auto;
    height: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
}

.swiper-slide {
    width: auto;
    height: 100%;
}

.swiper-slide img {
    width: auto;
    height: 100%;
}
</style> -->

<!-- <script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, FreeMode, Navigation, Thumbs } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';

const modules = [Autoplay, FreeMode, Navigation, Thumbs];
const thumbsSwiper = ref(null);
const setThumbsSwiper = (swiper) => {
    thumbsSwiper.value = swiper;
};
</script>

<template>
    <section class="flex h-full flex-col">
        <Swiper
            :style="{
                '--swiper-navigation-color': '#fff',
                '--swiper-pagination-color': '#fff',
            }"
            :loop="true"
            :space-between="10"
            :navigation="true"
            :thumbs="{ swiper: thumbsSwiper }"
            :modules="modules"
            :autoplay="{ delay: 5000, disableOnInteraction: false }"
            class="mySwiper2 w-full"
        >
            <SwiperSlide>
                <img src="images/paintings/Foret.png" alt="Forêt" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Douceur.png" alt="Douceur" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Vagues.png" alt="Vagues" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Volcano.png" alt="Volcano" />
            </SwiperSlide>
        </Swiper>
        <Swiper
            @swiper="setThumbsSwiper"
            :loop="true"
            :space-between="10"
            :slides-per-view="4"
            :free-mode="true"
            :watch-slides-progress="true"
            :modules="modules"
            class="mySwiper w-full"
        >
            <SwiperSlide>
                <img src="images/paintings/Foret.png" alt="Forêt" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Douceur.png" alt="Douceur" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Vagues.png" alt="Vagues" />
            </SwiperSlide>
            <SwiperSlide>
                <img src="images/paintings/Volcano.png" alt="Volcano" />
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<style>
.mySwiper2 {
    height: 80%;
}
.mySwiper {
    height: 20%;
    box-sizing: border-box;
    padding: 10px 0;
}
.mySwiper .swiper-slide {
    width: 25%;
    height: 100%;
    opacity: 0.4;
    cursor: pointer;
}
.mySwiper .swiper-slide-thumb-active {
    opacity: 1;
}

.mySwiper2 .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.mySwiper .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style> -->

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
    <section class="h-full">
        <Swiper
            direction="vertical"
            :loop="true"
            :space-between="50"
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
                <div
                    class="absolute h-auto w-34 text-sm md:right-10 md:bottom-30"
                >
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
                <img
                    :src="painting.image"
                    :alt="painting.title"
                    loading="lazy"
                />
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<style>
.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.swiper-pagination-bullet {
    background: black;
    opacity: 0.4;
    border-radius: 0;
    width: 20px;
    height: 20px;
    transition: all 0.3s ease;
}

.swiper-pagination-bullet-active {
    background: #8b0f0f;
    opacity: 1;
    height: 40px;
}
</style>
