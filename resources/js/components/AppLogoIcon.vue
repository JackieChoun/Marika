<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <rect width="100" height="100" fill="#0a0a0a" rx="12" />

        <!-- M -->
        <path
            fill="#ffffff"
            d="
    M 20 75
    L 20 25
    L 35 55
    L 50 25
    L 50 75
    L 43 75
    L 43 40
    L 35 60
    L 27 40
    L 27 75
    Z
  "
        />

        <!-- P -->
        <path
            fill="#ffffff"
            d="
    M 60 75
    L 60 25
    L 78 25
    C 88 25, 88 45, 78 45
    L 68 45
    L 68 75
    Z

    M 68 35
    L 76 35
    C 80 35, 80 25, 76 25
    L 68 25
    Z
  "
        />
    </svg>
</template>
