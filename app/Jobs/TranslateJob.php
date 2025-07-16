<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Job;
use App\Services\AI; // Add this line if AI exists in App\Services

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger()->info('TranslateJob started', [
            'job_id' => $this->jobListing->id,
            'title' => $this->jobListing->title,
            'description_length' => strlen($this->jobListing->description),
        ]);

        $translated = AI::translate($this->jobListing->description, 'en', 'fr');

        // Çeviri sonucunu kaydet
        $this->jobListing->translated_description = $translated;
        $this->jobListing->save();

        logger()->info('TranslateJob completed', [
            'job_id' => $this->jobListing->id,
            'title' => $this->jobListing->title,
            'original_description' => $this->jobListing->description,
            'translated_description' => $translated,
            'translation_success' => !str_contains($translated, 'Translation failed'),
        ]);
    }
}
