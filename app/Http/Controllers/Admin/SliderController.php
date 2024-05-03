<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\Slider;

class SliderController extends CustomController
{
    public function index()
    {
        return view('admin.customize.customize_slider');
    }

    public function patch_image()
    {

        if (request()->method() == 'GET') {
            return $this->get_image();
        }
        try {
            if (request('action') == 2) {
                $this->deleteImg('Slider', request('id'), request('name'));
                $payload = [];
            } else {


                $uuid_name  = $this->generateImageName('file');
                $image_name = '/assets/slider/' . $uuid_name;
                $image      = $image_name;
                $this->uploadImage('file', $uuid_name, 'sliderImage');
                $res     = Slider::create(
                    [
                        'image' => $image,
                    ]
                );
                $data    = [
                    'id'    => $res['id'],
                    'image' => $res['image'],
                    'size'  => number_format(floor(filesize(public_path($res['image']))) / 1025, 1, '.', '') . ' KB',
                ];
                $payload = $data;
            }
            $message = 'success';
            $code    = 200;
        } catch (\Exception $err) {
            $message = 'gagal ' . $err;
            $payload = [];
            $code    = 500;
        }

        return $this->jsonResponse($message, $code, $payload);
    }

    public function get_image()
    {
        try {

            $img  = Slider::all();
            $data = [];
            foreach ($img as $key => $im) {
                $data[$key] = [
                    'id'    => $im['id'],
                    'image' => $im['image'],
                    //                    'size'  => filesize(public_path($im['image'])),
                ];
            }
            $payload = $data;
            $message = 'success';
            $code    = 200;
        } catch (\Exception $err) {
            $message = 'gagal ' . $err;
            $payload = [];
            $code    = 500;
        }

        return $this->jsonResponse($message, $code, $payload);
    }

    public function image_slider()
    {
        return Slider::select(['image'])->get();
    }
}
