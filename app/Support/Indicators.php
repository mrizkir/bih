<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Indicators
{
    public static function find(string $key): array
    {
        $indicator = collect(config('indicators.items'))->firstWhere('key', $key);

        abort_unless($indicator, 404);

        return $indicator;
    }

    public static function fields(array $indicator): array
    {
        return collect($indicator['fields'])->map(function (array $field) {
            if (is_string($field['options'] ?? null)) {
                $field['options'] = self::options($field['options']);
            }

            return $field;
        })->all();
    }

    public static function options(string $source): array
    {
        return match ($source) {
            'series' => [
                ['value' => 1, 'label' => 'Data Sementara'],
                ['value' => 2, 'label' => 'Data Tetap'],
                ['value' => 3, 'label' => 'Data Estimasi'],
            ],
            'uraian' => DB::table('m_uraian_pdrb')
                ->orderBy('id')
                ->get()
                ->map(fn ($row) => [
                    'value' => (int) $row->id,
                    'label' => $row->kategori.'. '.$row->uraian,
                ])
                ->all(),
            'umur' => DB::table('m_tingkat')
                ->orderBy('id')
                ->get()
                ->map(fn ($row) => [
                    'value' => (int) $row->id,
                    'label' => $row->tingkat.' Tahun',
                ])
                ->all(),
            default => [],
        };
    }

    public static function rows(array $indicator): array
    {
        $query = \App\Models\IndicatorRecord::forIndicator($indicator)->newQuery();

        if (collect($indicator['fields'])->contains(fn ($field) => $field['name'] === 'tahun')) {
            $query->orderByDesc('tahun');
        }

        foreach ($indicator['primary'] as $column) {
            if ($column !== 'tahun') {
                $query->orderBy($column);
            }
        }

        return $query->get()->map(function ($row) use ($indicator) {
            $values = $row->toArray();

            foreach ($indicator['fields'] as $field) {
                if (! isset($values[$field['name']]) || ! is_numeric($values[$field['name']])) {
                    continue;
                }

                if ($field['type'] === 'number' || in_array($field['name'], ['status_data', 'uraian', 'kelompok_umur'], true)) {
                    $values[$field['name']] += 0;
                }
            }

            return [
                'key' => self::recordKey($values, $indicator['primary']),
                'values' => $values,
            ];
        })->all();
    }

    public static function recordKey(array $values, array $primary): string
    {
        return implode('~', array_map(
            fn (string $column) => (string) ($values[$column] ?? ''),
            $primary
        ));
    }

    public static function constrain(Builder $query, array $indicator, string $record): Builder
    {
        $parts = explode('~', $record);
        abort_unless(count($parts) === count($indicator['primary']), 404);

        foreach ($indicator['primary'] as $index => $column) {
            $query->where($column, $parts[$index]);
        }

        return $query;
    }

    public static function menu(bool $includeUsers): array
    {
        $grouped = collect(config('indicators.items'))->groupBy('group');

        $menu = collect(config('indicators.groups'))
            ->map(function (string $label, string $key) use ($grouped) {
                return [
                    'key' => $key,
                    'label' => $label,
                    'items' => $grouped->get($key, collect())->map(fn (array $item) => [
                        'key' => $item['key'],
                        'label' => $item['title'],
                        'url' => route('indikator.index', $item['key']),
                    ])->values()->all(),
                ];
            })
            ->filter(fn (array $group) => $group['items'] !== [])
            ->values()
            ->all();

        if ($includeUsers) {
            $menu[] = [
                'key' => 'pengguna',
                'label' => 'Manajemen User',
                'items' => [[
                    'key' => 'pengguna',
                    'label' => 'Daftar Pengguna',
                    'url' => route('pengguna.index'),
                ]],
            ];
        }

        return $menu;
    }
}
