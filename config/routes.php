<?php

return array(


    'product/([0-9]+)' => 'product/view/$1', // actionView in ProductController

    'catalog' => 'catalog/index', //  actionIndex in CatalogController 

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //  actionCategory in CatalogController 
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory in CatalogController


    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd in CartController
    'cart' => 'cart/index',


    'user/register' => 'user/register', // actionRegister in UserController 
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',


    // AdminPanel Goods managment
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/create' => 'adminProduct/create',
    'admin/product' => 'adminProduct/index',

    //AdminPanel Categoty managment
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/create' => 'adminCategory/create',
    'admin/category' => 'adminCategory/index',

    //AdminPanel start page
    'admin' => 'admin/index', // actionIndex in AdminController




    'contacts' => 'site/contact',
    '' => 'site/index', // actionIndex in SiteController

);