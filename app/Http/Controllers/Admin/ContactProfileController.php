<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactProfilesRequest;
use App\Models\ContactProfile;
use Exception;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\alert;

class ContactProfileController extends Controller
{

    public function getContactProfile()
    {
        $data = ContactProfile::first();

        return $data;
    }

    public function index()
    {
        $data = ContactProfile::first();

        if (request()->method() == 'POST') {
            return $this->patch_data($data);
        }

        return view('admin.customize.customize_contact_profile')->with(['data' => $data]);
    }

    public function patch_data(StoreContactProfilesRequest $request)
    {
        Log::info('patch_data() dipanggil');
        Log::info('Request input:', $request->all());

        try {
            Log::info('Sebelum validasi:', $request->all());

            $validatedData = $request->validated();

            $validatedData['email'] = filter_var($validatedData['email'], FILTER_SANITIZE_EMAIL);
            $validatedData['address'] = strip_tags($validatedData['address']);
            $validatedData['phone'] = filter_var($validatedData['phone'], FILTER_SANITIZE_NUMBER_INT);
            $validatedData['office_hours'] = strip_tags($validatedData['office_hours']);
            $validatedData['location'] = strip_tags($validatedData['location']);
            $validatedData['facebook'] = strip_tags($validatedData['facebook']);
            $validatedData['twitter'] = strip_tags($validatedData['twitter']);
            $validatedData['instagram'] = strip_tags($validatedData['instagram']);
            $validatedData['youtube'] = strip_tags($validatedData['youtube']);

            // Cek apakah sudah ada data contact profile, asumsi kamu hanya punya satu baris
            $contact = \App\Models\ContactProfile::first();

            if ($contact) {
                $contact->update($validatedData);
            } else {
                \App\Models\ContactProfile::create($validatedData);
            }
            Log::error('Gagal update contact profile: ');
            return redirect()->back()->with('success', 'Berhasil merubah data...');
        } catch (Exception $e) {
            // Log error untuk debugging di storage/logs/laravel.log
            Log::error('Gagal update contact profile: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['message' => 'Terjadi kesalahan saat menyimpan data.'])
                ->withInput();
        }
    }
}
