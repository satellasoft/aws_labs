<?php

namespace App\Http\Controllers;

use App\Contracts\PollyServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PollyController extends Controller
{
    public function __construct(
        private readonly PollyServiceInterface $polly
    ) {}

    public function synthesize(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'text' => ['required', 'string'],
        ]);

        $audioFile = $this->polly->synthesizeSpeech($validated['text']);

        return response()->json([
            'success' => true,
            'file' => $audioFile,
        ]);
    }
}
