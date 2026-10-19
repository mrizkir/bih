<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicatorRequest;
use App\Models\IndicatorRecord;
use App\Support\Indicators;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class IndicatorController extends Controller
{
    public function index(string $indicator): Response
    {
        return Inertia::render('Admin/Indicator/Index', $this->page($indicator));
    }

    public function print(string $indicator): Response
    {
        return Inertia::render('Admin/Indicator/Print', $this->page($indicator));
    }

    public function store(IndicatorRequest $request, string $indicator): RedirectResponse
    {
        $definition = Indicators::find($indicator);

        IndicatorRecord::forIndicator($definition)->newQuery()->create($request->payload());

        return redirect()
            ->route('indikator.index', $indicator)
            ->with('success', 'Data berhasil disimpan.');
    }

    public function update(IndicatorRequest $request, string $indicator, string $record): RedirectResponse
    {
        $definition = Indicators::find($indicator);
        $payload = collect($request->payload())
            ->except($definition['primary'])
            ->all();

        $records = Indicators::constrain(
            IndicatorRecord::forIndicator($definition)->newQuery(),
            $definition,
            $record
        );

        abort_unless((clone $records)->exists(), 404);

        if ($payload !== []) {
            $records->update($payload);
        }

        return redirect()
            ->route('indikator.index', $indicator)
            ->with('success', 'Data berhasil diubah.');
    }

    public function destroy(string $indicator, string $record): RedirectResponse
    {
        $definition = Indicators::find($indicator);

        $deleted = Indicators::constrain(
            IndicatorRecord::forIndicator($definition)->newQuery(),
            $definition,
            $record
        )->delete();

        abort_unless($deleted, 404);

        return redirect()
            ->route('indikator.index', $indicator)
            ->with('success', 'Data berhasil dihapus.');
    }

    private function page(string $key): array
    {
        $indicator = Indicators::find($key);

        return [
            'indicator' => [
                'key' => $indicator['key'],
                'title' => $indicator['title'],
                'sumber' => $indicator['sumber'],
                'group' => $indicator['group'],
                'primary' => $indicator['primary'],
                'fields' => Indicators::fields($indicator),
            ],
            'rows' => Indicators::rows($indicator),
        ];
    }
}
