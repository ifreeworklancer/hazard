<?php

namespace App\Services;

use Talanoff\ImpressionAdmin\Helpers\NavItem;

class Navigation
{
    public function frontend()
    {
        //
    }

    public function backend()
    {
        return [
            new NavItem([
                'name' => 'Админ панель',
                'icon' => 'i-widget',
                'route' => 'dashboard'
            ]),

            new NavItem([
                'name' => 'Пользователи',
                'icon' => 'i-users',
                'route' => 'users'
            ]),

            new NavItem([
                'name' => 'Категории',
                'icon' => 'i-envelope',
                'route' => 'categories',
                'submenu' => [
                    'categories' => [
                        'name' => 'Все категории',
                        'route' => 'admin.categories.index',
                    ],
                    'add' => [
                        'name' => 'Добавить категорию',
                        'route' => 'admin.categories.create',
                    ],
                ]
            ]),

            new NavItem([
                'name' => 'Товары',
                'icon' => 'i-app',
                'route' => 'products',
                'submenu' => [
                    'products' => [
                        'name' => 'Все товары',
                        'route' => 'admin.products.index',
                    ],
                    'add' => [
                        'name' => 'Добавить товар',
                        'route' => 'admin.products.create',
                    ],
                ]
            ]),

            new NavItem([
               'name' => 'Заказы',
               'icon' => 'i-wallet',
               'route' => 'orders'
            ]),

            new NavItem([
               'name' => 'Страницы',
               'icon' => 'i-new-file',
               'route' => 'pages'
            ]),
        ];
    }
}
