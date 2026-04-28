<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { ChessQueen, Newspaper, Palette, CalendarHeart } from 'lucide-vue-next';

const page = usePage();
const user = page.props.auth?.user;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="h-full p-4">
            <p class="text-center text-4xl">
                Bienvenue Administrateur {{ user?.name }}
            </p>
            <div class="grid h-full grid-cols-2 gap-10 pt-15">
                <Link
                    href="admin/periods"
                    class="flex flex-col items-center justify-center text-2xl"
                >
                    <CalendarHeart class="h-40 w-40" />
                    Periodes
                </Link>
                <Link
                    href="admin/paintings"
                    class="flex flex-col items-center justify-center text-2xl"
                >
                    <Palette class="h-40 w-40" />
                    Oeuvres
                </Link>
                <Link
                    href="admin/events"
                    class="flex flex-col items-center justify-center text-2xl"
                >
                    <Newspaper class="h-40 w-40" />
                    Actualités
                </Link>
                <a
                    href="https://www.chess.com/"
                    target="_blank"
                    class="flex flex-col items-center justify-center text-2xl"
                    ><ChessQueen class="h-40 w-40" />Echec</a
                >
            </div>
        </div>
    </AppLayout>
</template>
