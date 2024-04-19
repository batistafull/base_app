<?php


$metadata = [
    'name' => 'Stellar',
    'version' => '1.0.0',
    'author' => 'Alberto Batista',
    'entryPoint' => 'body',
    'partials' => [
        'main' => [
            'main/header' => 'headerContent',
            'main/navbar' => 'navbarContent',
            'main/sidebar' => 'sidebarContent',
            'main/footer' => 'footerContent',
        ],
        'login' => [
            'login/headerLogin' => 'headerContent',
            'login/footerLogin' => 'footerContent',
        ],
    ],
];