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
        ],
        'admin/file-field_type/choose/{key}'          => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@choose',
        ],
        'admin/file-field_type/selected/{key}'        => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@selected',
        ],
        'admin/file-field_type/exists/{folder}/{key}' => [
            'verb' => 'post',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\FilesController@exists',
        ],
        'admin/file-field_type/upload/{folder}/{key}' => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\UploadController@index',
        ],
        'admin/file-field_type/handle/{key}'          => [
            'verb' => 'post',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\UploadController@upload',
        ],
        'admin/file-field_type/recent/{key}'          => [
            'verb' => 'get',
            'uses' => 'Anomaly\FileFieldType\Http\Controller\UploadController@recent',
        ],
    ];

}
