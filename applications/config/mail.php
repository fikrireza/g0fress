<?php

return [

    // Gofress Email
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => [
        'address' => 'noreply.gofress@gmail.com',
        'name' => 'Gofress',
    ],
    'encryption' => '',
    'username' => 'noreply.gofress@gmail.com',
    'password' => '*Ku-99L!',

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
