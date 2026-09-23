<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Google Gemini API
    |--------------------------------------------------------------------------
    |
    | The API key is read from the environment and never exposed to the
    | frontend. All Gemini traffic goes through app/Services/GeminiService.
    |
    */

    'api_key' => env('GEMINI_API_KEY'),

    'model' => env('GEMINI_MODEL', 'gemini-2.0-flash'),

    'endpoint' => env('GEMINI_ENDPOINT', 'https://generativelanguage.googleapis.com/v1beta/models'),

    'timeout' => (int) env('GEMINI_TIMEOUT', 30),

];
