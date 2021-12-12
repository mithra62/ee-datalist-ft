<?php

return [
    'author'            => 'mithra62',
    'author_url'        => '',
    'name'              => 'DataList',
    'description'       => 'Allows for a datalist FieldType ',
    'version'           => '0.0.1',
    'namespace'         => 'Mithra62\DataList',
    'settings_exist'    => false,
    'fieldtypes'        => [
        'datalistft' => [
            'name' => 'DataList',
            'compatibility' => '',
        ],
    ],
    'seeder' => [
        'fields' => [
            'datalist' => Mithra62\DataList\Fields\DataList::class,
        ],
    ]
    // Advanced settings
];
