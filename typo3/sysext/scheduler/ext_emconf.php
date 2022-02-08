<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Scheduler',
    'description' => 'The TYPO3 Scheduler lets you register tasks to happen at a specific time',
    'category' => 'misc',
    'version' => '11.5.7',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'author' => 'TYPO3 Core Team',
    'author_email' => 'typo3cms@typo3.org',
    'author_company' => '',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.7',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
