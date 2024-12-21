<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;

class LicenseService
{
    /**
     * @throws Exception
     */
    public static function generateLicense($data)
    {
        // Load the private key
        $privateKey = file_get_contents(storage_path('app/private.pem'));

        if (!$privateKey) {
            throw new Exception('Private key not found.');
        }

        // Sign the license data
        openssl_sign(json_encode($data), $signature, $privateKey, OPENSSL_ALGO_SHA256);

        // Add the signature to the license data
        $data['signature'] = base64_encode($signature);

        Storage::put("{$data['license_key']}.json", json_encode($data, JSON_PRETTY_PRINT));

        return response()->json(['success' => 'License Created successfully.']);
    }
}
