<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Powermail JIRA On Premise Issues',
    'description' => 'Post powermail form submissions as jira issues',
    'category' => 'misc',
    'author' => 'Thomas Rawiel',
    'author_email' => 'thomas.rawiel@gmail.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
			'typo3' => '12.0.0-12.99.99',
            'powermail_jira' => '',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
