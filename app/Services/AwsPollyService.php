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

    public function synthesizeSpeech(string $text): string
    {
        $result = $this->client->synthesizeSpeech([
            'Engine' => config('services.aws.polly.engine'),
            'OutputFormat' => config('services.aws.polly.output_format'),
            'VoiceId' => config('services.aws.polly.voice_id'),
            'TextType' => config('services.aws.polly.text_type'),
            'LanguageCode' => config('services.aws.polly.language_code'),
            'Text' => $text,
        ]);

        $audioFile = config('services.aws.polly.audio_file');
        $audioPath = resource_path($audioFile);

        File::ensureDirectoryExists(dirname($audioPath));
        File::put($audioPath, $result['AudioStream']->getContents());

        return 'resources/'.$audioFile;
    }
}
