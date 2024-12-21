<?php

namespace App\Http\Controllers;

use App\Enums\LicenseStatus;
use App\Http\Requests\LicenseRequest;
use App\Models\License;
use App\Models\Product;
use App\Models\User;
use App\Services\LicenseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use ZipArchive;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = License::query()->with('user')->paginate();

        return view('licenses.index', [
            'title' => 'Licenses',
            'licenses' => $licenses,
        ]);
    }

    public function create()
    {
        $users = User::query()->latest()->get();

        return view('licenses.create', [
            'title' => 'Create License',
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(LicenseRequest $request)
    {
        $license = License::create([
            'user_id' => $request->user_id,
            'license_key' =>  generateLicenseKey(),
            'type' => $request->type,
            'issued_at' => now()->toDateString(),
            'expires_at' => now()->addDays(30)->toDateString(),
            'allowed_domain' => $request->allowed_domain,
        ]);


        // Load the private key
        $privateKeyPath = Storage::disk('local')->path('private.pem');
        $privateKey = file_get_contents($privateKeyPath);

        if (!$privateKey) {
            throw new Exception('Private key not found.');
        }

        // Sign the license key
        openssl_sign($license->license_key, $signature, $privateKey, OPENSSL_ALGO_SHA256);

        // Save the signature alongside the license
        $license->update([
            'signature' => base64_encode($signature)
        ]);

        return response()->json([
            'license_key' => $license->license_key,
            'signature' => base64_encode($signature),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $license = License::query()->findOrFail($id);

        return view('licenses.show', [
            'title' => 'License Details',
            'license' => $license,
        ]);
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


    /**
     * @throws Exception
     */
    public function verify(Request $request)
    {

        $request->validate([
            'license_key' => ['required', 'string'],
            'signature' => ['required', 'string'],
        ]);

        $licenseKey = $request->input('license_key');
        $signature = base64_decode($request->input('signature'));

        // Fetch license record from the database
        $license = License::query()->where('license_key', $licenseKey)->firstOrFail();


        // Load the public key
        $publicKey = file_get_contents(Storage::disk('local')->path('public.pem'));

        if (!$publicKey) {
            throw new Exception('Public key not found.');
        }

        // Verify the license key's signature
        $isValid = openssl_verify($licenseKey, $signature, $publicKey, OPENSSL_ALGO_SHA256);

        if (!$isValid) {
            return response()->json([
                'valid' => false,
                'status' => 'invalid',
                'message' => 'Invalid license signature.',
            ]);
        }

        if ($license->expires_at < now()) {
            return response()->json([
                'valid' => false,
                'status' => 'expired',
                'message' => 'Your license has expired. Please renew your license to continue using the application & for more information.',
            ]);
        }

        if ($request->header('Origin') !== $license->allowed_domain) {
            return response()->json([
                'success' => false,
                'message' => 'The domain you are trying to access is not allowed. If you believe this is a mistake or need access, please contact our support team.',
            ], Response::HTTP_FORBIDDEN);
        }

        if ($license->revoked) {
            return response()->json([
                'valid' => false,
                'status' => 'revoked',
                'message' => 'Your license has been revoked. Please contact support for more information. (+880) 1911-742233',
            ]);
        }

        return response()->json([
            'valid' => true,
            'status' => 'active',
            'signature' => $license->signature,
        ]);
    }

}
