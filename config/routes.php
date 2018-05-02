<?php
return array(


	'product/([0-9]+)/page-([0-9]+)' => 'product/view/$1/$2',
	'product/([0-9]+)' => 'product/view/$1',

	'news/page-([0-9]+)' => 'news/index/$1',
	'news/([0-9]+)' => 'news/view/$1',
	'news' => 'news/index',

    'blog/([0-9]+)' => 'blog/view/$1',
	'blog' => 'blog/index',

	'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart' => 'cart/index',

	'user/register' => 'user/register',
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',
	'user/([0-9]+)/page-([0-9]+)' => 'product/usercomment/$1/$2',

	'account/index' => 'account/index', //actionIndex in AccountController

	'account/edit' => 'account/edit',
	'account/delete' => 'account/delete',

	'comment/([0-9]+)' => 'product/comment/$1',
    'respect/([0-9]+)/([0-9]+)' => 'product/respect/$1/$2',
	'user/([0-9]+)' => 'product/usercomment/$1',

	'admin/product/create' => 'adminProduct/create',
	'admin/product/update' => 'adminProduct/update/$1',
	'admin/product/delete' => 'adminProduct/delete/$1',
	'admin/product' => 'adminProduct/index',


	/*'admin/product/create' => 'adminProduct/create',
	'admin/product/update' => 'adminProduct/update/$1',
	'admin/product/delete' => 'adminProduct/delete/$1',
	'admin/product' => 'adminProduct/index',
*/
	

	'admin/category/create' => 'adminCategory/create',
	'admin/category/update' => 'adminCategory/update/$1',
	'admin/category/delete' => 'adminCategory/delete/$1',
	'admin/category' => 'adminCategory/index',

	'admin' => 'admin/index',
	

	'^/*$' => 'site/index',

);