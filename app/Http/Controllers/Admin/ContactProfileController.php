<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactProfile;

class ContactProfileController extends Controller
{

    public function getContactProfile(){
        $data = ContactProfile::first();
        foreach ($data->social_media as $key => $d){
            $data[$key] = $d;
        }
        return $data;
    }

    public function index(){
        $data = $this->getContactProfile();
        if (request()->method() == 'POST'){
            return $this->patch_data($data);
        }

        return view('admin.customize.customize_contact_profile')->with(['data' => $data]);
    }

    public function patch_data($data){
        $field = request()->all();

        $social_media = null;
        if (request('instagram')){
            request()->validate([
                'instagram' => 'url|regex:(instagram.com)',
            ]);
            $social_media['instagram'] = request('instagram');
        }
        if (request('facebook')){
            request()->validate([
                'facebook' => 'url|regex:(facebook.com)',
            ]);
            $social_media['facebook'] = request('facebook');
        }
        if (request('twitter')){
            request()->validate([
                'twitter' => 'url|regex:(twitter.com)',
            ]);
            $social_media['twitter'] = request('twitter');
        }
        if (request('youtube')){
            request()->validate([
                'youtube' => 'url|regex:(youtube.com)'
            ]);
            $social_media['youtube'] = request('youtube');
        }
        if (request('tiktok')){
            request()->validate([
                'tiktok' => 'url|regex:(tiktok.com)',
            ]);
            $social_media['tiktok'] = request('tiktok');
        }

        $field['social_media'] = $social_media;

        if ($data){
            $data->update($field);
        }else{
            $data = new ContactProfile();
            $data->create($field);
        }
        return redirect()->back()->with('success', "berhasil merubah data...");
    }

}
