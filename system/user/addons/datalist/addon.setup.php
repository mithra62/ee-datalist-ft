<?php

use Mithra62\DataList\Services\Field AS FieldService;

const DATALIST_FIELDTYPE_VERSION = '1.0.2';

return [
    'author'            => 'mithra62',
    'author_url'        => '',
    'name'              => 'DataList',
    'description'       => 'Allows for a datalist FieldType ',
    'version'           => DATALIST_FIELDTYPE_VERSION,
    'namespace'         => 'Mithra62\DataList',
    'settings_exist'    => false,
    'services' => [
        'FieldService' => function ($addon) {
            return new FieldService();
        },
    ],
    'fieldtypes'        => [
        'datalist' => [
            'name' => 'DataList',
            'compatibility' => 'list',
            'use' => array(
                'MemberField'
            )
        ],
    ],
    'seeder' => [
        'fields' => [
            'datalist' => Mithra62\DataList\Fields\DataList\Seeder::class,
        ],
    ],
    'tests' => [
        'path' => 'Tests',
    ]
];
