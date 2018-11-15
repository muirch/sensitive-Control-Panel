<?php

/**
 * Array of all routes
 * Use controller and action keys where controller is page and action is php file
 */

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'index' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'settings' => [
        'controller' => 'main',
        'action' => 'settings',
    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],
    'start' => [
        'controller' => 'main',
        'action' => 'start',
    ],
    'stop' => [
        'controller' => 'main',
        'action' => 'stop',
    ],
    'clean' => [
        'controller' => 'main',
        'action' => 'clean',
    ],
    'server' => [
        'controller' => 'main',
        'action' => 'server',
    ],
    'server/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'server',
    ],
    'server/add' => [
        'controller' => 'main',
        'action' => 'add',
    ],
];