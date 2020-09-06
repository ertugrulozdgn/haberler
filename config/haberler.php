<?php

return [
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
            0 => 'Görünmesin',
            1 => 'Görünsün'
        ],
        'commentable' => [
            0 => 'Yapılmasın',
            1 => 'Yapılsın'
        ]
    ],
];
