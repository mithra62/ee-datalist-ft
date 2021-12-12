<?php

if (defined('PATH_THIRD')) {
    require_once PATH_THIRD . 'datalist/vendor/autoload.php';
}

use Mithra62\DataList\Services\Field AS FieldService;

return [
    'author'            => 'mithra62',
    'author_url'        => '',
    'name'              => 'DataList',
    'description'       => 'Allows for a datalist FieldType ',
    'version'           => '0.0.1',
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
        ],
    ],
    'seeder' => [
        'fields' => [
            'datalist' => Mithra62\DataList\Fields\DataList\Seeder::class,
        ],
    ],
    'tests' => [
        'path' => 'src/Tests',
    ]
];
