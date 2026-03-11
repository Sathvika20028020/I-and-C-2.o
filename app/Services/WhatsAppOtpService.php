<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppOtpService
{
  public function sendOtp($mobileNumber, $otp)
{
    $apiKey = env('API_WA_KEY');
    $url = 'https://backend.api-wa.co/campaign/mcware/api/v2';

    $otp = (string) $otp;

    $payload = [
        "apiKey" => $apiKey,
        "campaignName" => "I&C- HR module",
        "destination" => $mobileNumber,
        "userName" => "McWare",
        "templateParams" => [ $otp ],
        "source" => "otp-verification",
        "media" => new \stdClass(),
         "buttons" => [
            [
                "type" => "button",
                "sub_type" => "url",
                "index" => 0,
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => "TESTCODE20" // or dynamic value
                    ]
                ]
            ]
        ],
        "carouselCards" => [],
        "location" => new \stdClass(),
        "attributes" => new \stdClass(),
        "paramsFallbackValue" => new \stdClass()
    ];

    Log::info('WhatsApp OTP Payload:', $payload);

    try {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->successful()) {
            Log::info("OTP sent via WhatsApp to $mobileNumber: $otp");
            return $response->json();
        } else {
            Log::error("Failed to send WhatsApp OTP: " . $response->body());
            return false;
        }
    } catch (\Exception $e) {
        Log::error("WhatsApp OTP Exception: " . $e->getMessage());
        return false;
    }
}

}
