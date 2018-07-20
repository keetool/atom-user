<?php
if (config("app.protocol") == "http://") {
    $path = 'http://atomuser.test/graphql';
} else {
    $path = 'https://atomuser.com/graphql';
}

return [
    'paths' => [
        // Absolute path to public assets folder
        'assets' => public_path('vendor/graphiql'),

        // Url to the assets folder
        'assets_public' => 'vendor/graphiql',

        // Absolute path to views folder
        'views' => base_path('resources/views/vendor/graphiql'),
    ],

    'routes' => [
        // Path to send the graphql queries
        'graphql' => $path,

        // Path to the graphiql ui
        'ui' => 'graphql-ui',

        // Any middleware for the graphiql ui route
        'middleware' => [],
    ],

    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer'
    ],
];
