<?php
return array(



	'product/([0-9]+)' => 'product/view/$1',
    'product' => 'product/index',

    'news/([0-9]+)' => 'news/view/$1',
	'news' => 'news/index',

    'blog/([0-9]+)' => 'blog/view/$1',
	'blog' => 'blog/index',

	'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

	'user/register' => 'user/register',

	'^/*$' => 'site/index',

);