<?php

return [
    'domains' => [
        'cms' => env('ROUTE_CMS'),
        'web' => env('ROUTE_WEB'),
    ],

    'namespaces' => [
        'cms' => 'Cms',
        'web' => 'Web',
    ]
];
