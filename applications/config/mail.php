<?php

return [

    'driver' => 'smtp',
    'host' => 'mail.gofress.co.id',
    'port' => 587,
    'from' => [
        'address' => 'no-reply@gofress.co.id',
        'name' => 'Gofress',
    ],
    'encryption' => '',
    'username' => 'no-reply@gofress.co.id',
    'password' => 'WtHYszk4',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
    
];
