<?php namespace Anomaly\FileFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class FileFieldTypeServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FileFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        FileFieldTypeModifier::class => FileFieldTypeModifier::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/file-field_type/index/{key}'           => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@index',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
        'admin/file-field_type/choose/{key}'          => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@choose',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
        'admin/file-field_type/selected/{key}'        => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@selected',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
        'admin/file-field_type/exists/{folder}/{key}' => [
            'verb' => 'post',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@exists',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
        'admin/file-field_type/upload/{folder}/{key}' => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\UploadController@index',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
        'admin/file-field_type/handle/{key}'          => [
            'verb' => 'post',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\UploadController@upload',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
        'admin/file-field_type/recent/{key}'          => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\UploadController@recent',
            'constraints' => ['key' => '[a-f0-9]{64}'],
        ],
    ];

}
