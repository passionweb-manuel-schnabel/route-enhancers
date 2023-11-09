<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'RouteEnhancers within TYPO3',
    'description' => 'Shows the integration of a simple and an extbase route enhancer. (TYPO3 CMS)',
    'category' => 'misc',
    'author' => 'Manuel Schnabel',
    'author_email' => 'service@passionweb.de',
    'author_company' => 'PassionWeb Manuel Schnabel',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => ['typo3' => '12.4.0-12.4.99'],
        'conflicts' => [],
        'suggests' => [],
    ],
];
