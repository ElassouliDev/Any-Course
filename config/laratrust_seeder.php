<?php

return [
    'role_structure' => [
        'super_admin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'categories' => 'c,r,u,d',
            'courses' => 'c,r,u,d',
        ],
        'admin' =>[],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
