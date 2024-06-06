<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */
    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],
        'homeImage' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/home',
            'url' => env('APP_URL') . '/public',
        ],
        'structureImage' => [
            'driver' => 'local',
            'root' => public_path('assets/structure'),
            'url' => env('APP_URL') . '/public',
        ],
        'publicAgency' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/agency',
            'url' => env('APP_URL') . '/public',
        ],
        'publicInformation' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/information',
            'url' => env('APP_URL') . '/public',
        ],
        'articleImage' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/article',
            'url' => env('APP_URL') . '/public',
        ],
        'sectorImage' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/sector',
            'url' => env('APP_URL') . '/public',
        ],
        'applicationImage' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/application',
            'url' => env('APP_URL') . '/public',
        ],
        'sliderImage' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/slider',
            'url' => env('APP_URL') . '/public',
        ],
        'serviceImage' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/service',
            'url' => env('APP_URL') . '/public',

        ],
        'publicService' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/public-service',
            'url' => env('APP_URL') . '/public',

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
