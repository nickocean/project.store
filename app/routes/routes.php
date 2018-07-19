<?php

return [

    'basket' => [
        'model' => '\App\\models\\Basket',
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
    ],
    'form' => [
        'model' => '\App\\models\\Login',
        'controller' => '\App\\controllers\\LoginController',
        'action' => 'form'
    ],
    'login' => [
        'model' => '\App\\models\\Login',
        'controller' => '\App\\controllers\\LoginController',
        'action' => 'login'
    ],
    'logout' => [
        'model' => '\App\\models\\Login',
        'controller' => '\App\\controllers\\LoginController',
        'action' => 'logout'
    ],
    'basket/add' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'add'
    ]
];