<?php

use Anomaly\FileFieldType\Support\Config\FoldersOptions;

return [
    'folders' => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'handler' => FoldersOptions::class,
        ],
    ],
    'max'     => [
        'type'   => 'anomaly.field_type.decimal',
        'config' => [
            'decimals' => 1,
        ],
    ],
    'mode'    => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => [
                'default' => 'anomaly.field_type.file::config.mode.option.default',
                'select'  => 'anomaly.field_type.file::config.mode.option.select',
                'upload'  => 'anomaly.field_type.file::config.mode.option.upload',
            ],
        ],
    ],
];
