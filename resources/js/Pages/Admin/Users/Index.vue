<script setup>
import { computed, ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import Select from 'primevue/select';
import FileUpload from 'primevue/fileupload';
import { useConfirm } from 'primevue/useconfirm';

const props = defineProps({
    users: { type: Array, required: true },
    roles: { type: Array, required: true },
});

const confirm = useConfirm();
const visible = ref(false);
const editingId = ref(null);
const query = ref('');

const filteredUsers = computed(() => {
    const term = query.value.trim().toLowerCase();

    if (term === '') {
        return props.users;
    }

    return props.users.filter((user) => [user.name, user.username, user.email, user.nomor_hp, user.default_role]
        .some((value) => String(value ?? '').toLowerCase().includes(term)));
});

const form = useForm({
    name: '',
    username: '',
    email: '',
    nomor_hp: '',
    password: '',
    default_role: null,
    foto: null,
});

function openCreate() {
    editingId.value = null;
    form.reset();
    form.clearErrors();
    visible.value = true;
}

function openEdit(user) {
    editingId.value = user.id;
    form.defaults({
        name: user.name,
        username: user.username,
        email: user.email,
        nomor_hp: user.nomor_hp,
        password: '',
        default_role: user.default_role,
        foto: null,
    });
    form.reset();
    form.clearErrors();
    visible.value = true;
}

function onFile(event) {
    form.foto = event.files?.[0] ?? null;
}

function save() {
    const options = {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            visible.value = false;
        },
    };

    if (editingId.value) {
        form.post(route('pengguna.update', editingId.value), options);
        return;
    }

    form.post(route('pengguna.store'), options);
}

function remove(user) {
    confirm.require({
        message: `Hapus pengguna ${user.username}?`,
        header: 'Hapus pengguna',
        icon: 'pi pi-exclamation-triangle',
        acceptLabel: 'Hapus',
        rejectLabel: 'Batal',
        acceptClass: 'p-button-danger',
        accept: () => router.delete(route('pengguna.destroy', user.id), { preserveScroll: true }),
    });
}
</script>

<template>
    <div>
        <div class="page-heading">
            <div>
                <h1>Manajemen User</h1>
                <p>Akun admin Bintan In Hand</p>
            </div>
            <Button label="Tambah Pengguna" icon="pi pi-plus" @click="openCreate" />
        </div>

        <div class="table-toolbar">
            <IconField class="search-field">
                <InputIcon class="pi pi-search" />
                <InputText v-model="query" placeholder="Cari pengguna" />
            </IconField>
        </div>

        <DataTable :value="filteredUsers" striped-rows>
            <template #empty>
                {{ query.trim() ? 'Tidak ada pengguna yang cocok.' : 'Belum ada pengguna.' }}
            </template>
            <Column header="Foto" style="width: 5rem">
                <template #body="{ data }">
                    <img v-if="data.foto_url" :src="data.foto_url" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 999px">
                </template>
            </Column>
            <Column field="name" header="Nama" />
            <Column field="username" header="Username" />
            <Column field="email" header="Email" />
            <Column field="nomor_hp" header="Nomor HP" />
            <Column field="default_role" header="Peran" />
            <Column header="Aksi" style="width: 9rem">
                <template #body="{ data }">
                    <Button icon="pi pi-pencil" text @click="openEdit(data)" />
                    <Button icon="pi pi-trash" text severity="danger" @click="remove(data)" />
                </template>
            </Column>
        </DataTable>

        <Dialog v-model:visible="visible" modal :header="editingId ? 'Ubah Pengguna' : 'Tambah Pengguna'" :style="{ width: '36rem' }">
            <form class="form-grid" @submit.prevent="save">
                <div class="field">
                    <label for="name">Nama</label>
                    <InputText id="name" v-model="form.name" fluid />
                    <div v-if="form.errors.name" class="field-error">{{ form.errors.name }}</div>
                </div>
                <div class="field">
                    <label for="username">Username</label>
                    <InputText id="username" v-model="form.username" fluid />
                    <div v-if="form.errors.username" class="field-error">{{ form.errors.username }}</div>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <InputText id="email" v-model="form.email" fluid />
                    <div v-if="form.errors.email" class="field-error">{{ form.errors.email }}</div>
                </div>
                <div class="field">
                    <label for="nomor_hp">Nomor HP</label>
                    <InputText id="nomor_hp" v-model="form.nomor_hp" fluid />
                    <div v-if="form.errors.nomor_hp" class="field-error">{{ form.errors.nomor_hp }}</div>
                </div>
                <div class="field">
                    <label for="default_role">Peran</label>
                    <Select input-id="default_role" v-model="form.default_role" :options="props.roles" placeholder="Pilih peran" fluid />
                    <div v-if="form.errors.default_role" class="field-error">{{ form.errors.default_role }}</div>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <Password input-id="password" v-model="form.password" fluid :feedback="false" toggle-mask />
                    <div v-if="form.errors.password" class="field-error">{{ form.errors.password }}</div>
                </div>
                <div class="field">
                    <label>Foto</label>
                    <FileUpload mode="basic" accept="image/*" custom-upload choose-label="Pilih foto" @select="onFile" />
                    <div v-if="form.errors.foto" class="field-error">{{ form.errors.foto }}</div>
                </div>
                <div class="actions">
                    <Button type="button" label="Batal" severity="secondary" text @click="visible = false" />
                    <Button type="submit" label="Simpan" icon="pi pi-check" :loading="form.processing" />
                </div>
            </form>
        </Dialog>
    </div>
</template>
