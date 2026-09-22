<?php

namespace App\Services;

use App\Contracts\PollyServiceInterface;
use Aws\Polly\PollyClient;
use Illuminate\Support\Facades\File;

class AwsPollyService implements PollyServiceInterface
{
    private PollyClient $client;

    public function __construct()
    {
        $this->client = new PollyClient([
            'version' => 'latest',
            'region' => config('services.aws.region'),
        ]);
    }

    public function synthesizeSpeech(string $text): void
    {
        $result = $this->client->synthesizeSpeech([
            'Engine' => 'neural',
            'OutputFormat' => 'mp3',
            'VoiceId' => 'Camila',
            'TextType' => 'text',
            'LanguageCode' => 'pt-BR',
            'Text' => $text,
        ]);

        File::ensureDirectoryExists(resource_path('audio'));
        File::put(
            resource_path('audio/datadog.mp3'),
            $result['AudioStream']->getContents()
        );
    }
}
