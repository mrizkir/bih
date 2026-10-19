<script setup>
import { computed, ref, watch } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Select from 'primevue/select';
import { useConfirm } from 'primevue/useconfirm';

const props = defineProps({
    indicator: { type: Object, required: true },
    rows: { type: Array, required: true },
});

const confirm = useConfirm();
const visible = ref(false);
const editing = ref(false);
const recordKey = ref(null);
const query = ref('');
const first = ref(0);
const pageSize = ref(10);
const pageSizeOptions = [10, 20, 30, 50, 100];

function emptyValues() {
    return Object.fromEntries(props.indicator.fields.map((field) => [field.name, null]));
}

const form = useForm(emptyValues());

function display(field, value) {
    if (value === null || value === undefined || value === '') {
        return '—';
    }

    const option = (field.options ?? []).find((item) => String(item.value) === String(value));
    const text = option ? option.label : value;

    return field.suffix ? `${text} ${field.suffix}` : text;
}

const filteredRows = computed(() => {
    const term = query.value.trim().toLowerCase();

    if (term === '') {
        return props.rows;
    }

    return props.rows.filter((row) => props.indicator.fields.some((field) => String(display(field, row.values[field.name])).toLowerCase().includes(term)));
});

watch(query, () => {
    first.value = 0;
});

watch(() => props.indicator.key, () => {
    query.value = '';
    first.value = 0;
});

function openCreate() {
    editing.value = false;
    recordKey.value = null;
    form.defaults(emptyValues());
    form.reset();
    form.clearErrors();
    visible.value = true;
}

function openEdit(row) {
    editing.value = true;
    recordKey.value = row.key;
    form.defaults({ ...emptyValues(), ...row.values });
    form.reset();
    form.clearErrors();
    visible.value = true;
}

function isLocked(field) {
    return editing.value && props.indicator.primary.includes(field.name);
}

function save() {
    const options = {
        preserveScroll: true,
        onSuccess: () => {
            visible.value = false;
            form.transform((data) => data);
        },
    };

    if (editing.value) {
        form.transform((data) => {
            const copy = { ...data };
            props.indicator.primary.forEach((key) => delete copy[key]);
            return copy;
        }).put(route('indikator.update', [props.indicator.key, recordKey.value]), options);
        return;
    }

    form.post(route('indikator.store', props.indicator.key), options);
}

function remove(row) {
    confirm.require({
        message: 'Data ini akan dihapus.',
        header: 'Hapus data',
        icon: 'pi pi-exclamation-triangle',
        acceptLabel: 'Hapus',
        rejectLabel: 'Batal',
        acceptClass: 'p-button-danger',
        accept: () => router.delete(route('indikator.destroy', [props.indicator.key, row.key]), {
            preserveScroll: true,
        }),
    });
}

function printPage() {
    window.open(route('indikator.cetak', props.indicator.key), '_blank');
}
</script>

<template>
    <div>
        <div class="page-heading">
            <div>
                <h1>{{ indicator.title }}</h1>
                <p>Sumber: {{ indicator.sumber }}</p>
            </div>
            <div class="actions">
                <Button label="Tambah Data" icon="pi pi-plus" @click="openCreate" />
                <Button icon="pi pi-print" severity="secondary" @click="printPage" />
            </div>
        </div>

        <div class="table-toolbar">
            <IconField class="search-field">
                <InputIcon class="pi pi-search" />
                <InputText v-model="query" placeholder="Cari data" />
            </IconField>
        </div>

        <DataTable
            v-model:first="first"
            v-model:rows="pageSize"
            :value="filteredRows"
            paginator
            :rows-per-page-options="pageSizeOptions"
            striped-rows
            scrollable
        >
            <template #empty>
                {{ query.trim() ? 'Tidak ada data yang cocok.' : 'Belum ada data.' }}
            </template>
            <Column header="No" style="width: 4rem">
                <template #body="{ index }">{{ index + 1 }}</template>
            </Column>
            <Column v-for="field in indicator.fields" :key="field.name" :header="field.label">
                <template #body="{ data }">{{ display(field, data.values[field.name]) }}</template>
            </Column>
            <Column header="Aksi" style="width: 9rem">
                <template #body="{ data }">
                    <Button icon="pi pi-pencil" text @click="openEdit(data)" />
                    <Button icon="pi pi-trash" text severity="danger" @click="remove(data)" />
                </template>
            </Column>
        </DataTable>

        <Dialog v-model:visible="visible" modal :header="editing ? 'Ubah Data' : 'Tambah Data'" :style="{ width: '40rem' }">
            <form class="form-grid" @submit.prevent="save">
                <div v-for="field in indicator.fields" :key="field.name" class="field">
                    <label :for="field.name">{{ field.label }}</label>
                    <Select
                        v-if="field.type === 'select'"
                        :input-id="field.name"
                        v-model="form[field.name]"
                        :options="field.options"
                        option-label="label"
                        option-value="value"
                        placeholder="Pilih"
                        fluid
                        :disabled="isLocked(field)"
                    />
                    <InputNumber
                        v-else-if="field.type === 'number'"
                        :input-id="field.name"
                        v-model="form[field.name]"
                        fluid
                        :use-grouping="false"
                        :max-fraction-digits="4"
                        :disabled="isLocked(field)"
                    />
                    <InputText
                        v-else
                        :id="field.name"
                        v-model="form[field.name]"
                        fluid
                        :disabled="isLocked(field)"
                    />
                    <div v-if="form.errors[field.name]" class="field-error">{{ form.errors[field.name] }}</div>
                </div>
                <div class="actions">
                    <Button type="button" label="Batal" severity="secondary" text @click="visible = false" />
                    <Button type="submit" label="Simpan" icon="pi pi-check" :loading="form.processing" />
                </div>
            </form>
        </Dialog>
    </div>
</template>
