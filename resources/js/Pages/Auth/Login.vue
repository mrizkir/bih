<script setup>
import { useForm } from '@inertiajs/vue3';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import Button from 'primevue/button';

defineOptions({ layout: null });

const form = useForm({
    username: '',
    password: '',
    remember: false,
});

function submit() {
    form.post(route('login.store'), {
        onFinish: () => form.reset('password'),
    });
}
</script>

<template>
    <div class="login-page">
        <Card class="login-card">
            <template #title>Bintan In Hand</template>
            <template #subtitle>Masuk ke panel admin</template>
            <template #content>
                <form class="form-grid" @submit.prevent="submit">
                    <div class="field">
                        <label for="username">Username</label>
                        <InputText id="username" v-model="form.username" fluid autocomplete="username" />
                        <div v-if="form.errors.username" class="field-error">{{ form.errors.username }}</div>
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <Password
                            id="password"
                            v-model="form.password"
                            fluid
                            :feedback="false"
                            toggle-mask
                            input-id="password"
                            autocomplete="current-password"
                        />
                        <div v-if="form.errors.password" class="field-error">{{ form.errors.password }}</div>
                    </div>
                    <Button type="submit" label="Masuk" icon="pi pi-sign-in" :loading="form.processing" />
                </form>
            </template>
        </Card>
    </div>
</template>
