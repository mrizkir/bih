<script setup>
import { router, usePage } from '@inertiajs/vue3';
import Card from 'primevue/card';
import Button from 'primevue/button';

defineProps({
    groups: {
        type: Array,
        required: true,
    },
});

const page = usePage();

function openGroup(key) {
    const group = (page.props.menu ?? []).find((item) => item.key === key);
    if (group?.items?.[0]) {
        router.visit(group.items[0].url);
    }
}
</script>

<template>
    <div>
        <div class="page-heading">
            <div>
                <h1>Dashboard</h1>
                <p>Indikator Kabupaten Bintan</p>
            </div>
        </div>
        <div class="cards">
            <Card v-for="group in groups" :key="group.key">
                <template #title>{{ group.label }}</template>
                <template #content>
                    <p>{{ group.count }} indikator</p>
                    <Button label="Buka" icon="pi pi-arrow-right" text @click="openGroup(group.key)" />
                </template>
            </Card>
        </div>
    </div>
</template>
