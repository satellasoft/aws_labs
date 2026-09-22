<?php

namespace App\Services;

use App\Contracts\ComprehendServiceInterface;
use Aws\Comprehend\ComprehendClient;

class AwsComprehendService implements ComprehendServiceInterface
{
    private ComprehendClient $client;

    public function __construct()
    {
        $this->client = new ComprehendClient([
            'version' => 'latest',
            'region' => config('services.aws.region'),
        ]);
    }

    public function analyzeSentiment(string $text): array
    {
        $result = $this->client->detectSentiment([
            'LanguageCode' => 'pt',
            'Text' => $text,
        ]);

        return [
            'sentiment' => $result['Sentiment'],
            'scores' => [
                'positive' => $result['SentimentScore']['Positive'],
                'negative' => $result['SentimentScore']['Negative'],
                'neutral' => $result['SentimentScore']['Neutral'],
                'mixed' => $result['SentimentScore']['Mixed'],
            ],
        ];
    }
}
