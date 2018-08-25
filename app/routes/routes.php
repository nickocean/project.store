<?php

return [

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
    'edit' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'editView'
    ],
    'add' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'addView'
    ],
    'edit_product' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'edit'
    ],
    'delete_product' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'delete'
    ],
    'add_product' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'add'
    ],
	'comment' => [
		'model' => '\App\\models\\Product',
		'controller' => '\App\\controllers\\ProductController',
		'action' => 'addComment'
	  ],
    'delete_comment' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'deleteComment'
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
    'basket' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'basket'
    ],
    'delete' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'delete'
    ],
    'buy' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'buy'
    ],
	'register' => [
		'model' => '\App\\models\\Registration',
		'controller' => '\App\\controllers\\RegistrationController',
		'action' => 'form'
	  ],
	'registration' => [
		'model' => '\App\\models\\Registration',
		'controller' => '\App\\controllers\\RegistrationController',
		'action' => 'register'
	]
];