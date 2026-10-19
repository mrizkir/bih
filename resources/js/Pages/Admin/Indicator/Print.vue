<script setup>
import { onMounted } from 'vue';

defineOptions({ layout: null });

defineProps({
    indicator: { type: Object, required: true },
    rows: { type: Array, required: true },
});

function display(field, value) {
    if (value === null || value === undefined || value === '') {
        return '—';
    }

    const option = (field.options ?? []).find((item) => String(item.value) === String(value));
    const text = option ? option.label : value;

    return field.suffix ? `${text} ${field.suffix}` : text;
}

onMounted(() => {
    window.print();
});
</script>

<template>
    <div class="print-sheet">
        <div class="print-head">
            <img src="/home/images/BIH.png" alt="BIH">
            <div>
                <h1>{{ indicator.title }}</h1>
                <p>Sumber: {{ indicator.sumber }}</p>
            </div>
        </div>
        <p class="no-print">
            <button type="button" @click="window.print()">Cetak</button>
        </p>
        <table style="width: 100%; border-collapse: collapse">
            <thead>
                <tr>
                    <th style="border: 1px solid #cbd5e1; padding: 0.4rem">No</th>
                    <th v-for="field in indicator.fields" :key="field.name" style="border: 1px solid #cbd5e1; padding: 0.4rem; text-align: left">
                        {{ field.label }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in rows" :key="row.key">
                    <td style="border: 1px solid #cbd5e1; padding: 0.4rem">{{ index + 1 }}</td>
                    <td v-for="field in indicator.fields" :key="field.name" style="border: 1px solid #cbd5e1; padding: 0.4rem">
                        {{ display(field, row.values[field.name]) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
