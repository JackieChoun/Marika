<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import { Link } from '@inertiajs/vue3';

const modules = [Autoplay, Pagination];

defineProps({
    paintings: Array,
});
</script>

<template>
    <section class="h-full w-full">
        <Swiper
            direction="horizontal"
            :loop="true"
            :slides-per-view="1"
            :space-between="0"
            :autoplay="{ delay: 5000, disableOnInteraction: false }"
            :pagination="{ clickable: true }"
            :modules="modules"
            :centered-slides="true"
            :round-lengths="true"
            class="h-full w-full overflow-hidden"
        >
            <SwiperSlide
                v-for="painting in paintings"
                :key="painting.id"
                class="w-full shrink-0"
            >
                <Link :href="`/oeuvres`">
                    <img
                        :src="`/storage/${painting.image_path}`"
                        :alt="painting.title"
                        loading="lazy"
                    />
                </Link>
                <div class="flex gap-2 pt-4 text-sm">
                    <p class="font-semibold">{{ painting.title }}</p>
                    <p class="text-gray-500">{{ painting.technique }}</p>
                    <p
                        v-if="painting.height && painting.width"
                        class="text-gray-500"
                    >
                        {{ painting.height }} × {{ painting.width }} cm
                    </p>
                    <p v-if="painting.date" class="text-gray-500">
                        {{ new Date(painting.date).getFullYear() }}
                    </p>
                </div>
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<style>
@media (max-width: 768px) {
    .swiper {
        overflow: hidden;
    }

    .swiper-wrapper {
        width: 100%;
        display: flex;
    }

    .swiper-slide {
        min-width: 100%;
        flex-shrink: 0;
    }
    .swiper-slide img {
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
