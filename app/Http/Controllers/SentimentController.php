<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Contracts\ComprehendServiceInterface;

class SentimentController extends Controller
{
    public function __construct(
        private readonly ComprehendServiceInterface $comprehend
    ) {
    }

    public function analyze(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'text' => ['required', 'string', 'max:5000'],
        ]);

        $result = $this->comprehend->analyzeSentiment(
            $validated['text']
        );

        return response()->json($result);
    }
}