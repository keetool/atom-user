<?php

return [

    'app' => [
        'domain' => '',

        'protocol' => '',
        
        'facebook_app_id' => '',

        'facebook_app_secret' => '',
        
        'google_app_id' => '',

        'google_app_secret' => '',
    ],
    /*
    |--------------------------------------------------------------------------
    | Deployment configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure your deployment type.
    | Right now, the only deployment type available is "git"
    |
     */
    'deployment' => [

        'type' => 'git',

        'repository' => '',

        'branch' => 'gh-pages',

        'message' => 'Site updated: ' . strftime('%YYYY-%MM-%DD %HH:%mm:%ss')

    ]
];