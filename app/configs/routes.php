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
    'start' => [
        'controller' => 'main',
        'action' => 'start',
    ],
    'stop' => [
        'controller' => 'main',
        'action' => 'stop',
    ],
    'server' => [
        'controller' => 'main',
        'action' => 'server',
    ],
    'server/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'server',
    ],
    'clean' => [
        'controller' => 'main',
        'action' => 'clean',
    ],
];