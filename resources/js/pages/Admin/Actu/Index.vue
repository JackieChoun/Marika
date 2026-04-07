<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: dashboard() },
    { title: 'Actualités', href: '/admin/actu' },
];
</script>
<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="wrapper w-full py-10">
            <section class="mb-8 flex items-center justify-between">
                <h1 class="text-4xl font-semibold">
                    Actualités et Masterclass
                </h1>
                <Link
                    href="/admin/actu/create"
                    class="rounded-full bg-red-900 px-5 py-3 text-sm font-bold text-white hover:bg-red-700"
                >
                    Nouvelle Actualité
                </Link>
            </section>
        </div>
    </AppLayout>
</template>
