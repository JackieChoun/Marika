<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    paintings: Object,
});
</script>

<template>
    <SiteLayout>
        <h1 class="pt-4 pb-6 text-center text-5xl font-extralight lg:text-7xl">
            Œuvres
        </h1>

        <section class="py-10">
            <!-- GRID -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="painting in paintings.data"
                    :key="painting.id"
                    class=""
                >
                    <img
                        v-if="painting.image_path"
                        :src="`/storage/${painting.image_path}`"
                        :alt="painting.title"
                        class="h-auto w-full object-cover transition hover:scale-105"
                    />
                    <div class="flex items-center justify-center gap-2">
                        <h3 class="text-xl font-light">
                            {{ painting.title }}
                        </h3>

                        <p class="text-sm text-gray-500">
                            {{ painting.height }} / {{ painting.width }} cm
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ painting.technique }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="mt-10 flex justify-center gap-2">
                <Link
                    v-for="link in paintings.links"
                    :key="link.label"
                    :href="link.url ?? ''"
                    v-html="link.label"
                    class="border px-3 py-1 text-sm"
                    :class="{
                        'bg-black text-white': link.active,
                        'pointer-events-none opacity-50': !link.url,
                    }"
                />
            </div>
        </section>
    </SiteLayout>
</template>
