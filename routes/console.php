<?php

use App\Services\LegacyWebsiteImportService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('legacy:import-content {--base-url=https://bappelitbangdamahulu.com} {--news-limit=0} {--download-media=1}', function (LegacyWebsiteImportService $importer) {
    $downloadMedia = filter_var($this->option('download-media'), FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
    $downloadMedia ??= true;

    $summary = $importer->import(
        (string) $this->option('base-url'),
        max(0, (int) $this->option('news-limit')),
        $downloadMedia,
        fn (string $message) => $this->line($message),
    );

    $this->newLine();
    $this->info('Legacy import summary');

    foreach ($summary as $key => $value) {
        $this->line(sprintf('- %s: %s', str_replace('_', ' ', $key), $value));
    }
})->purpose('Import public data from the legacy Bappelitbangda Mahulu website into the current project');
