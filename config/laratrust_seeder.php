<?php

return [
    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
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
