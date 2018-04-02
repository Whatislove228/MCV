<?php
return array(
	'product/([0-9]+)' => 'product/view/$1',
    'product' => 'product/index',
<<<<<<< HEAD
    'news/([0-9]+)' => 'news/view/$1',
	'news' => 'news/index',
=======
    'blog/([0-9]+)' => 'blog/view/$1',
	'blog' => 'blog/index',
>>>>>>> 3f213e05e4a74359cf0d79c7f5638bffaefa2dda
	'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
	'^/*$' => 'site/index',

);