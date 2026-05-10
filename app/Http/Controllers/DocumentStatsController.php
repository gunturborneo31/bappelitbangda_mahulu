<?php

namespace App\Http\Controllers;

use App\Models\DocumentStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DocumentStatsController extends Controller
{
    public function view(Request $request)
    {
        $validated = $request->validate([
            'key' => ['required', 'string'],
            'type' => ['nullable', 'string'],
            'category' => ['nullable', 'string'],
            'url' => ['required', 'url'],
        ]);

        $this->increment($validated['key'], $validated['type'] ?? null, $validated['category'] ?? null, 'views');

        return redirect()->away($validated['url']);
    }

    public function download(Request $request)
    {
        $validated = $request->validate([
            'key' => ['required', 'string'],
            'type' => ['nullable', 'string'],
            'category' => ['nullable', 'string'],
            'url' => ['required', 'url'],
        ]);

        $this->increment($validated['key'], $validated['type'] ?? null, $validated['category'] ?? null, 'downloads');

        return redirect()->away($validated['url']);
    }

    public function stats(Request $request)
    {
        $validated = $request->validate([
            'keys' => ['nullable', 'array'],
            'keys.*' => ['string'],
            'key' => ['nullable', 'string'],
        ]);

        $keys = collect($validated['keys'] ?? [])->push($validated['key'] ?? null)->filter()->values();

        if ($keys->isEmpty() || ! $this->statsTableExists()) {
            return response()->json([]);
        }

        return response()->json(
            DocumentStat::query()
                ->whereIn('doc_key', $keys)
                ->get()
                ->mapWithKeys(fn (DocumentStat $stat) => [
                    $stat->doc_key => [
                        'views' => $stat->views,
                        'downloads' => $stat->downloads,
                    ],
                ])
        );
    }

    public function batch(Request $request)
    {
        $validated = $request->validate([
            'keys' => ['required', 'array'],
            'keys.*' => ['string'],
        ]);

        if (! $this->statsTableExists()) {
            return response()->json([]);
        }

        return response()->json(
            DocumentStat::query()
                ->whereIn('doc_key', $validated['keys'])
                ->get()
                ->mapWithKeys(fn (DocumentStat $stat) => [
                    $stat->doc_key => [
                        'views' => $stat->views,
                        'downloads' => $stat->downloads,
                    ],
                ])
        );
    }

    private function increment(string $key, ?string $type, ?string $category, string $metric): void
    {
        if (! $this->statsTableExists()) {
            return;
        }

        $stat = DocumentStat::query()->firstOrCreate(
            ['doc_key' => $key],
            [
                'type' => $type,
                'category' => $category,
                'views' => 0,
                'downloads' => 0,
            ]
        );

        $stat->increment($metric);

        $stat->forceFill([
            'type' => $type ?: $stat->type,
            'category' => $category ?: $stat->category,
            $metric === 'views' ? 'last_viewed_at' : 'last_downloaded_at' => now(),
        ])->save();
    }

    private function statsTableExists(): bool
    {
        return Schema::hasTable('document_stats');
    }
}