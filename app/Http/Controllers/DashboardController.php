<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        $groups = collect(config('indicators.groups'));
        $counts = collect(config('indicators.items'))
            ->countBy('group')
            ->map(fn (int $count, string $key) => [
                'key' => $key,
                'label' => $groups[$key] ?? $key,
                'count' => $count,
            ])
            ->values();

        return Inertia::render('Dashboard', [
            'groups' => $counts,
        ]);
    }
}
