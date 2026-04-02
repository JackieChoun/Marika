<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const currentPath = computed(() => page.url);

const isOpen = ref(false);

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};
</script>

<template>
    <header
        class="sticky top-0 z-50 flex h-18 items-center bg-white shadow-md shadow-[rgba(0,0,0,0.1)] lg:relative lg:shadow-none"
        :class="{ 'shadow-none': isOpen }"
    >
        <div class="wrapper flex h-full w-full items-center justify-between">
            <Link href="/">
                <p class="text-xl font-medium lg:text-3xl">Marika Perros</p>
            </Link>
            <nav
                class="fixed top-0 right-0 left-0 z-50 mx-auto mt-3 hidden w-fit rounded-full bg-white/40 p-5 text-sm font-semibold backdrop-blur-lg lg:block"
            >
                <ul class="flex gap-7">
                    <li>
                        <Link
                            href="/biographie"
                            :class="{
                                'underline underline-offset-2':
                                    currentPath.startsWith('/biographie'),
                            }"
                            >Biographie</Link
                        >
                    </li>
                    <li>
                        <Link
                            href="/oeuvres"
                            :class="{
                                'underline underline-offset-2':
                                    currentPath.startsWith('/oeuvres'),
                            }"
                            >Oeuvres</Link
                        >
                    </li>
                    <li>
                        <Link
                            href="/periodes"
                            :class="{
                                'underline underline-offset-2':
                                    currentPath.startsWith('/periodes'),
                            }"
                            >Périodes</Link
                        >
                    </li>
                    <li>
                        <Link
                            href="/actu"
                            :class="{
                                'underline underline-offset-2':
                                    currentPath.startsWith('/actu'),
                            }"
                            >Actu & Masterclass</Link
                        >
                    </li>
                </ul>
            </nav>
            <button
                class="bg-changecolor hidden cursor-pointer rounded-full px-5 py-3 text-sm font-bold text-white hover:bg-red-700 lg:block"
            >
                Contact
            </button>
            <!-- Mobile burger button -->
            <button
                @click="toggleMenu"
                class="relative z-50 flex h-8 w-8 flex-col items-center justify-center gap-2 lg:hidden"
                aria-label="Menu"
            >
                <span
                    class="block h-0.5 w-7.5 origin-center bg-black transition-transform duration-300"
                    :class="{ 'translate-y-2.5 rotate-50': isOpen }"
                ></span>
                <span
                    class="block h-0.5 w-6 bg-black transition-opacity duration-300"
                    :class="{ 'opacity-0': isOpen }"
                ></span>
                <span
                    class="block h-0.5 w-7.5 origin-center bg-black transition-transform duration-300"
                    :class="{ '-translate-y-2.5 -rotate-50': isOpen }"
                ></span>
            </button>
        </div>
    </header>
    <!-- Mobile navigation menu -->
    <nav
        class="fixed z-50 w-full overflow-hidden bg-white transition-[max-height] duration-500 ease-in-out lg:hidden"
        :style="{ maxHeight: isOpen ? '500px' : '0px' }"
    >
        <ul
            class="wrapper flex flex-col divide-y divide-gray-200 py-6 text-sm font-semibold"
        >
            <li>
                <Link
                    href="/biographie"
                    :class="{
                        'underline underline-offset-2':
                            currentPath.startsWith('/biographie'),
                    }"
                    class="block py-8"
                    >Biographie</Link
                >
            </li>
            <li>
                <Link
                    href="/oeuvres"
                    :class="{
                        'underline underline-offset-2':
                            currentPath.startsWith('/oeuvres'),
                    }"
                    class="block py-8"
                    >Oeuvres</Link
                >
            </li>
            <li>
                <Link
                    href="/periods"
                    :class="{
                        'underline underline-offset-2':
                            currentPath.startsWith('/periods'),
                    }"
                    class="block py-8"
                    >Périodes</Link
                >
            </li>

            <li>
                <Link
                    href="/actu"
                    :class="{
                        'underline underline-offset-2':
                            currentPath.startsWith('/actu'),
                    }"
                    class="block py-8"
                    >Actu & Masterclass</Link
                >
            </li>
            <li class="mt-6 flex justify-center">
                <Link
                    href="/contact"
                    :class="{
                        'underline underline-offset-2':
                            currentPath.startsWith('/contact'),
                    }"
                    class="rounded-full bg-red-900 px-5 py-4 text-sm font-bold text-white"
                    >Contact</Link
                >
            </li>
        </ul>
    </nav>
</template>
