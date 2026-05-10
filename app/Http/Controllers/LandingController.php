<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\LeaderProfile;
use App\Models\Post;
use App\Models\Service;
use App\Models\Slider;
use App\Models\WebsiteIdentity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        $site = WebsiteIdentity::query()->latest('id')->first();
        $leader = LeaderProfile::query()
            ->where('status', true)
            ->with('histories')
            ->orderBy('order')
            ->first();

        $posts = Post::query()
            ->with(['category', 'file'])
            ->where('status', 1)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        $featuredNewsItems = $posts->take(4)
            ->map(fn (Post $post) => [
                'title' => $post->title,
                'category' => $post->category?->name ?? 'Berita',
                'date' => optional($post->published_at)->translatedFormat('d F Y') ?? optional($post->created_at)->translatedFormat('d F Y'),
                'image' => $this->resolveMediaUrl($post->file?->storage_path ?? $post->file?->path, asset('images/desamahakamulu.jpg')),
                'excerpt' => Str::limit(trim(strip_tags($post->content ?? '')), 160),
                'slug' => $post->slug,
            ])
            ->values();

        $pengumumanItems = Slider::query()
            ->with('file')
            ->where('status', 1)
            ->orderByDesc('is_pinned')
            ->orderByDesc('updated_at')
            ->take(5)
            ->get()
            ->map(fn (Slider $slider) => [
                'title' => $slider->caption ?: 'Pengumuman',
                'description' => $slider->description,
                'image' => $this->resolveMediaUrl($slider->file?->storage_path ?? $slider->file?->path, asset('images/desamahakamulu.jpg')),
                'link' => $slider->link,
            ])
            ->values();

        $agendaItems = Agenda::query()
            ->orderBy('schedule')
            ->take(8)
            ->get()
            ->map(function (Agenda $agenda) {
                $schedule = $agenda->schedule ? Carbon::parse($agenda->schedule) : null;

                return [
                    'title' => $agenda->caption,
                    'description' => $agenda->description,
                    'date' => $schedule?->translatedFormat('d F Y') ?? '-',
                    'time' => $schedule?->translatedFormat('H:i') ?? '-',
                    'location' => $agenda->location ?? 'Mahakam Ulu',
                ];
            })
            ->values();

        $allLinks = Service::query()
            ->with('file')
            ->where('status', true)
            ->orderBy('name')
            ->get()
            ->map(fn (Service $service) => [
                'name' => $service->name,
                'desc' => $service->description,
                'link' => $service->link ?: '#',
                'logo' => $this->resolveMediaUrl($service->file?->storage_path ?? $service->file?->path, asset('images/Mahakam_Ulu.webp')),
            ])
            ->values();

        return view('landing', [
            'site' => $site,
            'leader' => $leader,
            'featuredNewsItems' => $featuredNewsItems,
            'pengumumanItems' => $pengumumanItems,
            'agendaItems' => $agendaItems,
            'allLinks' => $allLinks,
        ]);
    }

    private function resolveMediaUrl(?string $path, string $fallback): string
    {
        if (blank($path)) {
            return $fallback;
        }

        if (Str::startsWith($path, ['http://', 'https://', '/storage/', 'storage/'])) {
            return Str::startsWith($path, ['http://', 'https://']) ? $path : asset(ltrim($path, '/'));
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}