<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper/modules';
import { Link } from '@inertiajs/vue3';
import 'swiper/css';
import 'swiper/css/pagination';

const modules = [Autoplay, Pagination];

defineProps({
    paintings: Array,
});
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
                :key="painting.id"
                class="relative"
            >
                <div
                    class="absolute h-auto w-34 text-sm md:right-10 md:bottom-30"
                >
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
                <div class="flex h-full w-full items-center justify-center">
                    <Link
                        :href="`/oeuvres`"
                        class="inline-block h-full max-w-full"
                    >
                        <img
                            :src="`/storage/${painting.image_path}`"
                            :alt="painting.title"
                            loading="lazy"
                            class="h-full max-w-full object-contain"
                            decoding="async"
                        />
                    </Link>
                </div>
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<style>
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
