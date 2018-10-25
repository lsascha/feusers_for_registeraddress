<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "feusersforregisteraddress"
 *
 * Auto generated by Extension Builder 2018-10-25
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'fe_users for registeraddress',
    'description' => 'makes registeraddress use fe_users table',
    'category' => 'plugin',
    'author' => 'Sascha Löffler',
    'author_email' => 'lsascha@gmail.com',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'registeraddress' => '1.0.0-1.0.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];