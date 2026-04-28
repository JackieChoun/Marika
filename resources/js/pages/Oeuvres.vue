<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { CircleChevronLeft, CircleChevronRight } from 'lucide-vue-next';
import { Menu, MenuButton, MenuItems } from '@headlessui/vue';

const props = defineProps({
    paintings: Object,
    periods: Array,
    techniques: Array,
    filters: Object,
});

// STATE FILTRES
const periodMap = computed(() =>
    Object.fromEntries(props.periods.map((p) => [p.id, p.name])),
);

const filtersState = ref({
    period: props.filters.period
        ? Array.isArray(props.filters.period)
            ? props.filters.period
            : [props.filters.period]
        : [],
    technique: props.filters.technique
        ? Array.isArray(props.filters.technique)
            ? props.filters.technique
            : [props.filters.technique]
        : [],
    available: props.filters.available ?? null,
});

// UPDATE
const updateFilters = () => {
    const cleanFilters = Object.fromEntries(
        Object.entries(filtersState.value).filter(
            ([_, v]) => v !== null && v.length !== 0,
        ),
    );

    router.get('/oeuvres', cleanFilters, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
};

// MODAL
const showModal = ref(false);
const currentPaintingIndex = ref(0);

// APRÈS
const handleKeydown = (e) => {
    if (e.key === 'Escape') closeModal();
    if (e.key === 'ArrowRight') nextPainting();
    if (e.key === 'ArrowLeft') prevPainting();
};

const openModal = (index) => {
    currentPaintingIndex.value = index;
    showModal.value = true;
    window.addEventListener('keydown', handleKeydown);
};

const closeModal = () => {
    showModal.value = false;
    window.removeEventListener('keydown', handleKeydown);
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

        <!-- FILTRES -->
        <section class="flex flex-wrap gap-4 pb-6">
            <!-- PÉRIODES -->
            <Menu as="div" class="relative">
                <MenuButton
                    class="cursor-pointer rounded-3xl border px-4 py-2 hover:bg-gray-100 hover:underline"
                >
                    Périodes
                </MenuButton>

                <MenuItems
                    class="absolute z-10 mt-2 w-64 border bg-white p-3 shadow"
                >
                    <!-- Toutes -->
                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            :checked="filtersState.period.length === 0"
                            @change="
                                filtersState.period = [];
                                updateFilters();
                            "
                            class="accent-black"
                        />
                        Toutes
                    </label>

                    <!-- Liste -->
                    <label
                        v-for="period in periods"
                        :key="period.id"
                        class="flex items-center gap-2"
                    >
                        <input
                            type="checkbox"
                            :value="period.id"
                            v-model="filtersState.period"
                            @change="updateFilters"
                            class="accent-black"
                        />
                        {{ period.name }}
                    </label>
                </MenuItems>
            </Menu>

            <!-- TECHNIQUES -->
            <Menu as="div" class="relative">
                <MenuButton
                    class="cursor-pointer rounded-3xl border px-4 py-2 hover:bg-gray-100 hover:underline"
                >
                    Techniques
                </MenuButton>

                <MenuItems
                    class="absolute z-10 mt-2 w-64 border bg-white p-3 shadow"
                >
                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            :checked="filtersState.technique.length === 0"
                            @change="
                                filtersState.technique = [];
                                updateFilters();
                            "
                            class="accent-black"
                        />
                        Toutes
                    </label>

                    <label
                        v-for="tech in techniques"
                        :key="tech"
                        class="flex items-center gap-2"
                    >
                        <input
                            type="checkbox"
                            :value="tech"
                            v-model="filtersState.technique"
                            @change="updateFilters"
                            class="accent-black"
                        />
                        {{ tech }}
                    </label>
                </MenuItems>
            </Menu>

            <!-- DISPONIBILITÉ -->
            <Menu as="div" class="relative">
                <MenuButton
                    class="cursor-pointer rounded-3xl border px-4 py-2 hover:bg-gray-100 hover:underline"
                >
                    Disponibilité
                </MenuButton>

                <MenuItems
                    class="absolute z-10 mt-2 w-56 border bg-white p-3 shadow"
                >
                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="available"
                            :checked="filtersState.available === null"
                            @change="
                                filtersState.available = null;
                                updateFilters();
                            "
                            class="accent-black"
                        />
                        Toutes
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            value="1"
                            v-model="filtersState.available"
                            @change="updateFilters"
                            class="accent-black"
                        />
                        En vente
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            value="0"
                            v-model="filtersState.available"
                            @change="updateFilters"
                            class="accent-black"
                        />
                        Indisponible
                    </label>
                </MenuItems>
            </Menu>
        </section>

        <!-- FILTRES ACTIFS -->
        <div class="mb-4 flex flex-wrap gap-2">
            <span
                v-for="tech in filtersState.technique"
                :key="tech"
                class="rounded bg-gray-200 px-2 py-1 text-xs"
            >
                {{ tech }}
                <button
                    @click="
                        filtersState.technique = filtersState.technique.filter(
                            (t) => t !== tech,
                        );
                        updateFilters();
                    "
                    class="ml-1 text-xs"
                >
                    ✕
                </button>
            </span>

            <span
                v-for="p in filtersState.period"
                :key="p"
                class="rounded bg-gray-200 px-2 py-1 text-xs"
            >
                {{ periodMap[p] }}
                <button
                    @click="
                        filtersState.period = filtersState.period.filter(
                            (id) => id !== p,
                        );
                        updateFilters();
                    "
                    class="ml-1 text-xs"
                >
                    ✕
                </button>
            </span>
        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div
                v-for="(painting, index) in paintings.data"
                :key="painting.id"
                v-motion
                :initial="{ opacity: 0, x: index % 3 === 0 ? -60 : 60 }"
                :visible-once="{ opacity: 1, x: 0 }"
                :transition="{ delay: index * 120, duration: 1200 }"
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
            @click.self="closeModal"
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
                    @click.self.stop="closeModal"
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
