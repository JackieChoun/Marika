<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { ChessQueen } from 'lucide-vue-next';

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
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <p class="text-center text-4xl">
                Bienvenue Administrateur {{ user?.name }}
            </p>
            <a
                href="https://www.chess.com/"
                target="_blank"
                class="flex items-center justify-center"
                ><ChessQueen class="h-40 w-40"
            /></a>
        </div>
    </AppLayout>
</template>
