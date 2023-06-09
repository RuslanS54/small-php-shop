<?php

return array(
    // Товар:
    'product/([0-9]+)' => 'product/view/$1', 
    // Каталог:
    'catalog' => 'catalog/index', 
    // Категория товаров:
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',   
    'category/([0-9]+)' => 'catalog/category/$1', 
    // Корзина:
    'cart/checkout' => 'cart/checkout',  
    'cart/delete/([0-9]+)' => 'cart/delete/$1',   
    'cart/add/([0-9]+)' => 'cart/add/$1',  
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', 
    'cart' => 'cart/index', 
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    // Управление товарами:    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:    
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Упраление пользователями
    'admin/user/create' => 'adminUser/create',
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user' => 'adminUser/index',
    // Упраление комментариями
   
    'admin/comment/update/([0-9]+)' => 'adminComment/update/$1',
    'admin/comment/delete/([0-9]+)' => 'adminComment/delete/$1',
    'admin/comment' => 'adminComment/index',
    // Админпанель:
    'admin' => 'admin/index',
    // О магазине
    'contacts' => 'site/contact',
    'about' => 'site/about',
    // Главная страница
    'index.php' => 'site/index', 
    '' => 'site/index', 
);
