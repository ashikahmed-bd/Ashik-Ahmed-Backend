<?php

namespace App\Http\Controllers;

use App\Enums\LicenseType;
use App\Http\Requests\LicenseRequest;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = License::query()->with('user')->paginate();
        return $licenses;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenseRequest $request)
    {

        if ($request->type !== (LicenseType::LIFETIME)->value) {
            $expiresAt = now()->addDays(30);
        }

        $license = License::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'license_key' =>  $this->generateLicenseKey(),
            'type' => $request->type,
            'issued_at' => now(),
            'expires_at' => $expiresAt,
            'allowed_domain' => $request->allowed_domain,
            'active' => true,
        ]);

        return response()->json(['license' => $license, 'message' => 'License issued successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function generateLicenseKey(): string
    {
        return strtoupper(Str::random('5').'-'.Str::random('5').'-'.Str::random('5').'-'.Str::random('5').'-'.Str::random('5'));
    }

    public function verify(Request $request)
    {
        $licenseKey = $request->header('X-License-Key');

        if (!$licenseKey) {
            return response()->json([
                'success' => false,
                'message' => 'License key and domain are required.'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Check for valid license
        $license = License::query()
            ->where('license_key', $licenseKey)
            ->where('allowed_domain', $request->getHost())
            ->where('active', true)
            ->first();

        if (!$license) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid license or domain not allowed.'
            ], Response::HTTP_FORBIDDEN);
        }

        if ($license->expires_at && now()->greaterThan($license->expires_at)) {
            $license->update(['active' => false]);

            return response()->json([
                'success' => false,
                'message' => 'License has expired.'
            ], Response::HTTP_FORBIDDEN);
        }

        return response()->json([
            'success' => true,
            'license' => $license,
            'message' => 'License is valid.'
        ], Response::HTTP_OK);
    }

}
