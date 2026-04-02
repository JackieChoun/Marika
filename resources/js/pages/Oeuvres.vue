<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { CircleChevronLeft, CircleChevronRight } from 'lucide-vue-next';
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';

const props = defineProps({
    paintings: Object,
    periods: Array,
    techniques: Array,
    filters: Object,
});

// FILTRE
const updateFilters = (newFilters) => {
    router.get(
        '/oeuvres',
        {
            ...props.filters,
            ...newFilters,
        },
        {
            preserveScroll: true,
            preserveState: true,
        },
    );
};
const filterByPeriod = (periodId) => {
    updateFilters({ period: periodId });
};

// MODAL / CAROUSEL
const showModal = ref(false);
const currentPaintingIndex = ref(0);

const openModal = (index) => {
    currentPaintingIndex.value = index;
    showModal.value = true;
};

const nextPainting = () => {
    if (currentPaintingIndex.value < props.paintings.data.length - 1)
        currentPaintingIndex.value++;
};

const prevPainting = () => {
    if (currentPaintingIndex.value > 0) currentPaintingIndex.value--;
};
</script>

<template>
    <SiteLayout>
        <h1 class="pt-4 pb-6 text-center text-5xl font-extralight lg:text-7xl">
            Œuvres
        </h1>

        <!-- Filtre -->
        <section class="flex gap-4 pb-4">
            <!-- Périodes -->
            <Menu as="div">
                <MenuButton
                    class="cursor-pointer rounded-3xl border px-4 py-2 hover:underline"
                >
                    Périodes
                </MenuButton>

                <MenuItems
                    class="absolute z-10 mt-2 border bg-white p-2 shadow"
                >
                    <!-- Toutes -->
                    <MenuItem v-slot="{ active }">
                        <button
                            @click="filterByPeriod(null)"
                            :class="[
                                'block w-full px-4 py-2 text-left text-sm',
                                active ? 'bg-gray-100' : '',
                            ]"
                        >
                            Toutes
                        </button>
                    </MenuItem>

                    <!-- Liste des périodes -->
                    <MenuItem
                        v-for="period in periods"
                        :key="period.id"
                        v-slot="{ active }"
                    >
                        <button
                            @click="filterByPeriod(period.id)"
                            :class="[
                                'block w-full px-4 py-2 text-left text-sm',
                                active ? 'bg-gray-100' : '',
                            ]"
                        >
                            {{ period.name }}
                        </button>
                    </MenuItem>
                </MenuItems>
            </Menu>
            <Menu as="div">
                <MenuButton
                    class="cursor-pointer rounded-3xl border px-4 py-2 hover:underline"
                >
                    Techniques
                </MenuButton>

                <MenuItems
                    class="absolute z-10 mt-2 w-56 border bg-white shadow"
                >
                    <!-- Toutes -->
                    <MenuItem v-slot="{ active }">
                        <button
                            @click="updateFilters({ technique: null })"
                            :class="[
                                'block w-full px-4 py-2 text-left',
                                active && 'bg-gray-100',
                            ]"
                        >
                            Toutes
                        </button>
                    </MenuItem>

                    <!-- Liste dynamique -->
                    <MenuItem
                        v-for="tech in techniques"
                        :key="tech"
                        v-slot="{ active }"
                    >
                        <button
                            @click="updateFilters({ technique: tech })"
                            :class="[
                                'block w-full px-4 py-2 text-left',
                                active && 'bg-gray-100',
                            ]"
                        >
                            {{ tech }}
                        </button>
                    </MenuItem>
                </MenuItems>
            </Menu>
        </section>
        <p v-if="paintings.data.length === 0" class="text-sm text-gray-500">
            Aucune oeuvre pour l'instant.
        </p>

        <!-- GRID -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div
                v-for="(painting, index) in paintings.data"
                :key="painting.id"
                class="cursor-pointer"
                @click="openModal(index)"
            >
                <img
                    v-if="painting.image_path"
                    :src="`/storage/${painting.image_path}`"
                    :alt="painting.title"
                    class="h-auto w-full object-cover transition hover:scale-105"
                />
                <div class="mt-2 flex items-center justify-center gap-2">
                    <h3 class="text-lg font-light">{{ painting.title }}</h3>

                    <p v-if="painting.technique" class="text-sm text-gray-500">
                        {{ painting.technique }}
                    </p>
                    <p
                        v-if="painting.height && painting.width"
                        class="text-sm text-gray-500"
                    >
                        {{ painting.height }} × {{ painting.width }} cm
                    </p>
                    <p v-if="painting.date" class="text-sm text-gray-500">
                        {{ new Date(painting.date).getFullYear() }}
                    </p>
                    <p
                        v-if="painting.is_available"
                        class="text-sm text-green-600"
                    >
                        Disponible
                    </p>
                </div>
            </div>
        </div>

        <!-- PAGINATION -->
        <div class="my-10 flex justify-center gap-2">
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

        <!-- MODAL LIGHTBOX -->
        <div
            v-if="showModal"
            class="wrapper fixed inset-0 z-50 flex items-center justify-center bg-white/90 backdrop-blur-sm"
            @click.self="showModal = false"
        >
            <button
                @click="prevPainting"
                class="cursor-pointer text-black hover:scale-105"
                :disabled="currentPaintingIndex === 0"
            >
                <CircleChevronLeft class="size-15 stroke-1" />
            </button>
            <div
                class="relative flex h-full w-full items-center justify-center"
            >
                <!-- IMAGE -->
                <img
                    :src="`/storage/${paintings.data[currentPaintingIndex].image_path}`"
                    :alt="paintings.data[currentPaintingIndex].title"
                    class="max-h-[98vh] w-full object-contain"
                    @click.self.stop="showModal = false"
                />
                <!-- INFOS -->
                <div class="absolute inset-0 w-35 gap-2 p-2 text-gray-700">
                    <h2 class="text-xl font-semibold">
                        {{ paintings.data[currentPaintingIndex].title }}
                    </h2>
                    <p v-if="paintings.data[currentPaintingIndex].date">
                        {{
                            new Intl.DateTimeFormat('fr-FR').format(
                                new Date(
                                    paintings.data[currentPaintingIndex].date,
                                ),
                            )
                        }}
                    </p>
                    <p v-if="paintings.data[currentPaintingIndex].technique">
                        {{ paintings.data[currentPaintingIndex].technique }}
                    </p>
                    <p
                        v-if="
                            paintings.data[currentPaintingIndex].height &&
                            paintings.data[currentPaintingIndex].width
                        "
                    >
                        {{ paintings.data[currentPaintingIndex].height }} ×
                        {{ paintings.data[currentPaintingIndex].width }} cm
                    </p>

                    <p v-if="paintings.data[currentPaintingIndex].description">
                        {{ paintings.data[currentPaintingIndex].description }}
                    </p>
                    <p v-if="paintings.data[currentPaintingIndex].price">
                        Prix :
                        {{ paintings.data[currentPaintingIndex].price }} €
                    </p>
                </div>
            </div>
            <button
                @click="nextPainting"
                class="cursor-pointer text-black hover:scale-105"
                :disabled="currentPaintingIndex === paintings.data.length - 1"
            >
                <CircleChevronRight class="size-15 stroke-1" />
            </button>
        </div>
    </SiteLayout>
</template>
