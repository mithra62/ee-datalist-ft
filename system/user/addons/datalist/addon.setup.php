<?php

if (defined('PATH_THIRD')) {
    require_once PATH_THIRD . 'datalist/vendor/autoload.php';
}

return [
    'author'            => 'mithra62',
    'author_url'        => '',
    'name'              => 'DataList',
    'description'       => 'Allows for a datalist FieldType ',
    'version'           => '0.0.1',
    'namespace'         => 'Mithra62\DataList',
    'settings_exist'    => false,
    'fieldtypes'        => [
        'datalist' => [
            'name' => 'DataList',
            'compatibility' => 'list',
        ],
    ],
    'seeder' => [
        'fields' => [
            'datalist' => Mithra62\DataList\Fields\DataList::class,
        ],
    ],
    'tests' => [
        'path' => 'src/Tests',
    ]
    // Advanced settings
];
