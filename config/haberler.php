<?php

return [
    'app' => [
        'sorting_type_limit' => [
            2 => 3, 
            3 => 2
        ],
    ],


    'user' => [
        'status' => [
            1 => 'Aktif',
            0 => 'Pasif',
        ]
    ],


    'category' => [
        'status' => [
            0 => 'Pasif',
            1 => 'Aktif'
        ],

        'show_in_menu' => [
            1 => 'Göster',
            0 => 'Gösterme'
        ]
    ],


    'page' => [
        'show_in_footer' => [
            1 => 'Göster',
            0 => 'Gösterme'
        ],
        'status' => [
            0 => 'Pasif',
            1 => 'Aktif'
        ]
    ],



    'post' => [
        'status' => [
            0 => 'Pasif',
            1 => 'Aktif',
            2 => 'Zamanlanmış'
        ],
        'location' => [
            1 => 'Normal',
            2 => 'Manşet',
            3 => 'Sürmanşet'
        ],
        'show_in_mainpage' => [
            1 => 'Görünsün',
            0 => 'Görünmesin',
        ],
        'commentable' => [
            1 => 'Yapılsın',
            0 => 'Yapılmasın',
        ]
    ],
];
