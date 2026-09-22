<?php

namespace App\Contracts;

interface ComprehendServiceInterface
{
    public function analyzeSentiment(string $text): array;
}
