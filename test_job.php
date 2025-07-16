<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testing TranslateJob with real job data...\n";

try {
    // Get first job
    $job = App\Models\Job::first();

    if (!$job) {
        echo "No jobs found in database.\n";
        exit;
    }

    echo "Job found: " . $job->title . "\n";
    echo "Description: " . substr($job->description, 0, 100) . "...\n";

    // Test translation
    $translated = App\Services\AI::translate($job->description, 'en', 'fr');
    echo "Translated: " . $translated . "\n";

    // Test TranslateJob dispatch
    echo "Dispatching TranslateJob...\n";
    App\Jobs\TranslateJob::dispatch($job);
    echo "TranslateJob dispatched successfully!\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    echo "Stack trace: " . $e->getTraceAsString() . PHP_EOL;
}

echo "Test completed.\n";
