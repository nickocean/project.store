<?php

return [

    '' => [
        'model' => '\App\\models\\Main',
        'controller' => '\App\\controllers\\MainController',
        'action' => 'index',
	    'db' => '\Src\\Db'
    ],
    'product' => [
        'model' => '\App\\models\\Product',
        'controller' => '\App\\controllers\\ProductController',
        'action' => 'product',
	    'db' => '\Src\\Db'
    ],
    'edit' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'editView',
	    'db' => '\Src\\Db'
    ],
    'add' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'addView',
	    'db' => '\Src\\Db'
    ],
    'edit_product' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'edit',
	    'db' => '\Src\\Db'
    ],
    'delete_product' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'delete',
	    'db' => '\Src\\Db'
    ],
    'add_product' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'add',
	    'db' => '\Src\\Db'
    ],
	'comment' => [
		'model' => '\App\\models\\Product',
		'controller' => '\App\\controllers\\ProductController',
		'action' => 'addComment',
		'db' => '\Src\\Db'
	],
  'delete_comment' => [
	    'model' => '\App\\models\\Product',
	    'controller' => '\App\\controllers\\ProductController',
	    'action' => 'deleteComment',
	    'db' => '\Src\\Db'
    ],
    'form' => [
        'model' => '\App\\models\\Login',
        'controller' => '\App\\controllers\\LoginController',
        'action' => 'form',
        'db' => '\Src\\Db'
    ],
    'login' => [
        'model' => '\App\\models\\Login',
        'controller' => '\App\\controllers\\LoginController',
        'action' => 'login',
        'db' => '\Src\\Db'
    ],
    'logout' => [
        'model' => '\App\\models\\Login',
        'controller' => '\App\\controllers\\LoginController',
        'action' => 'logout',
        'db' => '\Src\\Db'
    ],
    'basket' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'basket',
        'db' => '\Src\\Db'
    ],
    'delete' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'delete',
        'db' => '\Src\\Db'
    ],
    'buy' => [
        'model' => '\App\\models\\Basket',
        'controller' => '\App\\controllers\\BasketController',
        'action' => 'buy',
        'db' => '\Src\\Db'
    ],
	'register' => [
		'model' => '\App\\models\\Registration',
		'controller' => '\App\\controllers\\RegistrationController',
		'action' => 'form',
		'db' => '\Src\\Db'
	],
	'registration' => [
		'model' => '\App\\models\\Registration',
		'controller' => '\App\\controllers\\RegistrationController',
		'action' => 'register',
		'db' => '\Src\\Db'
	]
];