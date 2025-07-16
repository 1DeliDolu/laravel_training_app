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
            // Temporary: Check if we should use dummy mode due to quota issues
            if (env('OPENAI_USE_DUMMY', false)) {
                logger()->info('Using dummy translation mode');
                return self::getDummyTranslation($text, $from, $to);
            }

            // Check if OpenAI API key is configured
            if (!config('openai.api_key')) {
                logger()->warning('OpenAI API key not configured, returning dummy translation');
                return self::getDummyTranslation($text, $from, $to) . " (API key not configured)";
            }

            $prompt = "Please translate the following text from {$from} to {$to}. Return only the translation without any additional text:\n\n{$text}";

            $response = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a professional translator. Translate the given text accurately and return only the translation.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => 1000,
                'temperature' => 0.3,
            ]);

            $translatedText = trim($response->choices[0]->message->content ?? '');

            if (empty($translatedText)) {
                logger()->warning('Empty translation response from OpenAI');
                return "[{$to}] " . $text . " (Translation failed - empty response)";
            }

            return $translatedText;
        } catch (\Throwable $e) {
            logger()->error('AI translate error: ' . $e->getMessage(), [
                'text' => $text,
                'from' => $from,
                'to' => $to,
                'error' => $e->getTraceAsString(),
            ]);

            // If quota exceeded, return dummy translation
            if (str_contains($e->getMessage(), 'insufficient_quota')) {
                return "[{$to}] " . self::getDummyTranslation($text, $from, $to) . " (Quota exceeded)";
            }

            return "[{$to}] " . $text . " (Translation failed - " . $e->getMessage() . ")";
        }
    }

    /**
     * Get a dummy translation for testing purposes.
     */
    private static function getDummyTranslation(string $text, string $from, string $to): string
    {
        $dummyTranslations = [
            'Hello world' => 'Bonjour le monde',
            'Good morning' => 'Bonjour',
            'Thank you' => 'Merci',
            'How are you?' => 'Comment allez-vous?',
            'Job description' => 'Description du poste',
            'Company' => 'Entreprise',
            'Salary' => 'Salaire',
        ];

        // If we have a predefined translation, use it
        if (isset($dummyTranslations[$text])) {
            return $dummyTranslations[$text];
        }

        // Otherwise, return a dummy translation
        return "Traduction simulée de: " . $text;
    }
}
