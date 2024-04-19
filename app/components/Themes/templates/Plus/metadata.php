<?php


$metadata = [
    'name' => 'Plus',
    'version' => '1.0.5',
    'author' => 'Alberto Batista',
    'entryPoint' => 'main',
    'partials' => [
        'main' => [
            'main/__header' => 'headerContent',
            'main/__navbar' => 'navbarContent',
            'main/__sidebar' => 'sidebarContent',
            'main/__footer' => 'footerContent',
        ],
        'login' => [
            'login/headerLogin' => 'headerContent',
            'login/footerLogin' => 'footerContent',
        ],
    ],
];