<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class AI
{
    /**
     * Translate the given text using OpenAI API.
     */
    public static function translate(string $text, string $from, string $to): string
    {
        try {
            $prompt = "Translate the following text from {$from} to {$to}:\n\n{$text}";

            $response = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
                'max_tokens' => 1000,
                'temperature' => 0.3,
            ]);

            return trim($response['choices'][0]['text'] ?? '');
        } catch (\Throwable $e) {
            logger()->error('AI translate error: ' . $e->getMessage(), [
                'text' => $text,
                'from' => $from,
                'to' => $to,
            ]);
            return '[ERROR] ' . $text;
        }
    }
}
