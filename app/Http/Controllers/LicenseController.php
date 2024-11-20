<?php

namespace App\Http\Controllers;

use App\Http\Resources\LicenseResource;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = License::query()->with('user')->paginate();
        return LicenseResource::collection($licenses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        License::query()->create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'allowed_domain' => $request->allowed_domain,
            'expiration_date' => $request->expiration_date ? $request->expiration_date : Carbon::now()->addDays(365),
            'license_key' => Str::uuid(),
            'status' => $request->active ? $request->active : 'active',
        ]);
        return response()->json(['message' => 'License Created Successfully!']);
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



    public function licenseValidate(Request $request)
    {
        $request->validate([
            'license_key' => ['required', 'string', 'uuid'],
            'allowed_domain' => ['required', 'string'],
        ]);

        // Find the license by domain and key
        $license = License::query()->where('license_key', $request->license_key)->where('status', 'active')->first();

        // Check if the license key not found!
        if (!$license){
            return response()->json([
                'status' => false,
                'message' => 'Invalid license key or lincese source.',
            ], 404);
        }

        // Check if the license key, domain, and expiry date are valid
        if ($license->expire_at === $request->allowed_domain){
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired license key.',
            ], 403);
        }

        $license->tokens()->where('name', $request->allowed_domain)->delete();

        if ($license->allowed_domain === $request->allowed_domain) {
            return LicenseResource::make($license);
        }

        return response()->json([
            'status' => false,
            'message' => 'This Domain is not allowed. Please contact the license provider.',
        ], 403);

    }

}
