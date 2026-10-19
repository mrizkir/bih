<script setup>
import { computed, watch } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import PanelMenu from 'primevue/panelmenu';
import Button from 'primevue/button';
import Toast from 'primevue/toast';
import ConfirmDialog from 'primevue/confirmdialog';
import { useToast } from 'primevue/usetoast';

const page = usePage();
const toast = useToast();

const menuModel = computed(() => (page.props.menu ?? []).map((group) => ({
    key: group.key,
    label: group.label,
    items: group.items.map((item) => ({
        label: item.label,
        class: page.url.startsWith(new URL(item.url, window.location.origin).pathname) ? 'menu-active' : '',
        command: () => router.visit(item.url),
    })),
})));

watch(() => page.props.flash?.success, (message) => {
    if (message) {
        toast.add({ severity: 'success', summary: message, life: 3000 });
    }
}, { immediate: true });

watch(() => page.props.flash?.error, (message) => {
    if (message) {
        toast.add({ severity: 'error', summary: message, life: 4000 });
    }
}, { immediate: true });

function logout() {
    router.post(route('logout'));
}
</script>

<template>
    <div class="shell">
        <aside class="sidebar">
            <a class="brand" :href="route('dashboard')">BIH</a>
            <PanelMenu :model="menuModel" multiple />
        </aside>
        <div class="main">
            <header class="topbar">
                <span>Selamat datang, <strong>{{ page.props.auth.user?.username }}</strong></span>
                <Button label="Keluar" icon="pi pi-sign-out" severity="secondary" text @click="logout" />
            </header>
            <main class="content">
                <slot />
            </main>
        </div>
        <Toast />
        <ConfirmDialog />
    </div>
</template>
