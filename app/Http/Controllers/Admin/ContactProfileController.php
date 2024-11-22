<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactProfilesRequest;
use App\Models\ContactProfile;

class ContactProfileController extends Controller
{

    public function getContactProfile()
    {
        $data = ContactProfile::first();
        if ($data) {
            foreach ($data->social_media as $key => $d) {
                $data[$key] = $d;
            }
        }

        return $data;
    }

    public function index()
    {
        $data = ContactProfile::first();

        if (request()->method() == 'POST') {
            return $this->patch_data($data);
        }

        if ($data) {
            foreach ($data->social_media as $key => $d) {
                $data[$key] = $d;
            }
        }

        return view('admin.customize.customize_contact_profile')->with(['data' => $data]);
    }

    public function patch_data(StoreContactProfilesRequest $data)
    {

        $validatedData = $data->validated();

        $validatedData['email'] = filter_var($validatedData['email'], FILTER_SANITIZE_EMAIL);
        $validatedData['address'] = strip_tags($validatedData['address']);
        $validatedData['phone'] = filter_var($validatedData['phone'], FILTER_SANITIZE_NUMBER_INT);
        $validatedData['office_hours'] = strip_tags($validatedData['office_hours']);
        $validatedData['location'] = strip_tags($validatedData['location']);


        if ($data) {
            $data->update($validatedData);
        } else {
            $data = new ContactProfile();
            $data->create($validatedData);
        }




        // $field = request()->validate(
        //     [
        //         'email'        => 'required',
        //         'address'      => 'required',
        //         'phone'        => 'required',
        //         'office_hours' => 'required',
        //         'location'     => 'required',
        //     ]
        // );

        // $social_media = null;
        // if (request('instagram')) {
        //     request()->validate(
        //         [
        //             'instagram' => 'url|regex:(instagram.com)',
        //         ]
        //     );
        //     $social_media['instagram'] = request('instagram');
        // }
        // if (request('facebook')) {
        //     request()->validate(
        //         [
        //             'facebook' => 'url|regex:(facebook.com)',
        //         ]
        //     );
        //     $social_media['facebook'] = request('facebook');
        // }
        // if (request('twitter')) {
        //     request()->validate(
        //         [
        //             'twitter' => 'url|regex:(twitter.com)',
        //         ]
        //     );
        //     $social_media['twitter'] = request('twitter');
        // }
        // if (request('youtube')) {
        //     request()->validate(
        //         [
        //             'youtube' => 'url|regex:(youtube.com)',
        //         ]
        //     );
        //     $social_media['youtube'] = request('youtube');
        // }
        // if (request('tiktok')) {
        //     request()->validate(
        //         [
        //             'tiktok' => 'url|regex:(tiktok.com)',
        //         ]
        //     );
        //     $social_media['tiktok'] = request('tiktok');
        // }

        // $field['social_media'] = $social_media;

        return redirect()->back()->with('success', "berhasil merubah data...");
    }
}
