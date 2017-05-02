<?php

return [

    // Gofress Email
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

    /*
    // Gmail Email
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => [
        'address' => 'no-reply@gofress.co.id',
        'name' => 'Test Email Gofress',
    ],
  	'encryption' => 'tls',
  	'username' => 'fourline66@gmail.com',
  	'password' => 'yejluynhqogvmfrc',
    */

    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
