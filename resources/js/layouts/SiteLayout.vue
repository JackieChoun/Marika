<script setup>
import Footer from '@/layouts/Footer.vue';
import Header from '@/layouts/Header.vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <Head>
        <title>{{ page.props.seo?.title }}</title>

        <meta name="description" :content="page.props.seo?.description ?? ''" />

        <meta property="og:title" :content="page.props.seo?.title ?? ''" />
        <meta
            property="og:description"
            :content="page.props.seo?.description ?? ''"
        />
    </Head>

    <Header />

    <main class="wrapper">
        <slot />
    </main>

    <Footer />
</template>
