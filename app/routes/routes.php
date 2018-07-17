<?php

return [

    'basket' => [
        'model' => '\App\\models\\Main',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'basket'
    ],
    '' => [
        'model' => '\App\\models\\Main',
        'controller' => '\App\\controllers\\MainController',
        'action' => 'index'
    ],
    'product' => [
        'model' => '\App\\models\\Product',
        'controller' => '\App\\controllers\\ProductController',
        'action' => 'product'
    ]
];