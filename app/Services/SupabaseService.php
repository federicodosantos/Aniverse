<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

const SECONDS_IN_DAY = 86400;

class SupabaseService
{
  private $supabaseUrl;
  private $apiKey;
  private $bucketName;

  public function __construct()
  {
    $this->supabaseUrl = env('SUPABASE_URL');
    $this->apiKey = env('SUPABASE_APIKEY');
    $this->bucketName = env('SUPABASE_BUCKET');
  }

  public function uploadImage($file)
  {
    Log::info("uploading file to supabase: {$file}");
    $filepath = $file->getClientOriginalName();

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . $this->apiKey,
    ])
      ->get(
        "{$this->supabaseUrl}/storage/v1/object/{$this->bucketName}/{$filepath}"
      );

    if ($response->successful()) {
      $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $this->apiKey,
      ])
        ->delete("{$this->supabaseUrl}/storage/v1/object/{$this->bucketName}/{$filepath}");

      if (!$response->successful()) {
        throw new \Exception('Failed to delete image from Supabase: ' . $response->body());
      }

      $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $this->apiKey,
      ])
        ->attach('file', $file->get(), $file->getClientOriginalName())
        ->post(
          "{$this->supabaseUrl}/storage/v1/object/{$this->bucketName}/{$filepath}"
        );

      if ($response->successful()) {
        return $response;
      } else {
        // Handle the case where the upload was not successful
        throw new \Exception('Failed to upload image to Supabase: ' . $response->body());
      }
    }
  }

  public function getSignedUrl($file)
  {
    $fileName = $file->getClientOriginalName();
    $encodedFile = $this->convertToQueryString($fileName);
    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . $this->apiKey,
    ])
      ->post("{$this->supabaseUrl}/storage/v1/object/sign/{$this->bucketName}/{$encodedFile}", [
        "expiresIn" => 999 * SECONDS_IN_DAY,
        "transform" => [
          "height" => 100,
          "width" => 100,
          "resize" => "cover",
          "format" => "origin",
          "quality" => 100
        ]
      ]);

    if ($response->successful()) {
    $url = "{$this->supabaseUrl}/storage/v1/object/public/{$this->bucketName}/{$encodedFile}";
      return $url;
    } else {
      // Handle the case where the request was not successful
      throw new \Exception('Failed to retrieve signed URL from Supabase: ' . $response->body());
    }
  }

  private function convertToQueryString($fileName) {
    $encoded = rawurlencode($fileName);

    return $encoded;
  }
}
