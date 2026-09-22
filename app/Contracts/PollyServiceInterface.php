<?php

namespace App\Contracts;

interface PollyServiceInterface
{
    public function synthesizeSpeech(string $text): void;
}
