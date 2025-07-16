<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Starting AI translation test...\n";

try {
    $result1 = App\Services\AI::translate('Hello world', 'en', 'fr');
    echo 'Testing dummy translation: ' . $result1 . PHP_EOL;

    $result2 = App\Services\AI::translate('Job description', 'en', 'fr');
    echo 'Testing job description: ' . $result2 . PHP_EOL;

    $result3 = App\Services\AI::translate('This is a long job description that needs to be translated', 'en', 'fr');
    echo 'Testing long text: ' . $result3 . PHP_EOL;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    echo "Stack trace: " . $e->getTraceAsString() . PHP_EOL;
}

echo "Test completed.\n";
