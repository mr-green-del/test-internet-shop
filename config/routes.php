<?php

    return array
    (
        'user/register'                    => 'user/register',
        'user/login'                       => 'user/login',
        'user/logout'                      => 'user/logout',

        'cabinet/order_history'            => 'cabinet/orderHistory',
        'cabinet/edit'                     => 'cabinet/edit',
        'cabinet'                          => 'cabinet/index',

        'product/([0-9]+)'                 => 'product/view/$1',

        'category/([0-9]+)/page-([0-9]+)'  => 'catalog/category/$1/$2',
        'category/([0-9]+)'                => 'catalog/category/$1',

        'blog'                             => 'blog/index',
        'blog/page-([0-9]+)'               => 'blog/index/$1',
        'blog/view/([0-9]+)'               => 'blog/view/$1',

        'admin'                            => 'admin/index',

        'admin/product'                    => 'adminProduct/index',
        'admin/product/page-([0-9]+)'      => 'adminProduct/index/$1',
        'admin/product/create'             => 'adminProduct/create',
        'admin/product/update/([0-9]+)'    => 'adminProduct/update/$1',
        'admin/product/delete/([0-9]+)'    => 'adminProduct/delete/$1',

        'admin/category'                   => 'adminCategory/index',
        'admin/category/create'            => 'adminCategory/create',
        'admin/category/update/([0-9]+)'   => 'adminCategory/update/$1',
        'admin/category/delete/([0-9]+)'   => 'adminCategory/delete/$1',

        'admin/order'                      => 'adminOrder/index',
        'admin/order/view/([0-9]+)'        => 'adminOrder/view/$1',
        'admin/order/update/([0-9]+)'      => 'adminOrder/update/$1',
        'admin/order/delete/([0-9]+)'      => 'adminOrder/delete/$1',

        'admin/blog'                       => 'adminBlog/index',
        'admin/blog/create'                => 'adminBlog/create',
        'admin/blog/update/([0-9]+)'       => 'adminBlog/update/$1',
        'admin/blog/delete/([0-9]+)'       => 'adminBlog/delete/$1',

        'cart/checkout'                    => 'cart/checkout',
        'cart/deleteAjax/([0-9]+)'         => 'cart/deleteAjax/$1',
        'cart/addAjax/([0-9]+)'            => 'cart/addAjax/$1',
        'cart'                             => 'cart/index',

        'catalog'                          => 'catalog/index',

        'about'                            => 'site/about',
        'contacts'                         => 'site/contact',
        ''                                 => 'site/index',
    )


?>