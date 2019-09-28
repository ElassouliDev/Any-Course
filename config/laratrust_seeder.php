<?php

return [
    'role_structure' => [
        'super_admin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'profile' => 'r,u',
            'categories' => 'c,r,u,d',
            'courses' => 'c,r,u,d',
            'lessons' => 'c,r,u,d',
            'questions' => 'c,r,u,d',
            'exams' => 'c,r,u,d',
            'certificate' => 'c,r,u,d',
        ],
        'admin' =>[
            'users' => 'c,r',
            'profile' => 'r,u',
            'categories' => 'c,r',
            'courses' => 'r',
            'lessons' => 'r,u,d',
            'questions' => 'r,u,d',
            'exams' => 'r,u,d',
            'certificate' => 'c,r,u,d',

        ],
        'lecture' =>[
            'profile' => 'r,u',
            'courses' => 'c,r,u,d',
            'lessons' => 'c,r,u,d',
            'questions' => 'c,r,d',
            'exams' => 'c,r,u,d',
            'reviews' => 'c,r,u',
            'certificate' => 'r',

        ],

        'student' =>[
            'profile' => 'r,u',
            'courses' => 'r',
            'exams' => 'r',
            'questions' => 'c,r',
            'reviews' => 'c,r,u',
            'certificate' => 'r',



        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
