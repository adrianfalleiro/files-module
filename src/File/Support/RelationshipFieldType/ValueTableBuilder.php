<?php namespace Anomaly\FilesModule\File\Support\RelationshipFieldType;

/**
 * Class ValueTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\FilesModule\File\Support\RelationshipFieldType
 */
class ValueTableBuilder extends \Anomaly\RelationshipFieldType\Table\ValueTableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'keywords',
                'mime_type'
            ]
        ],
        'folder'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.preview' => [
            'heading' => 'anomaly.module.files::field.preview.name'
        ],
        'name'          => [
            'sort_column' => 'name',
            'wrapper'     => '
                    <strong>{value.file}</strong>
                    <br>
                    <small class="text-muted">{value.disk}://{value.folder}/{value.file}</small>
                    <br>
                    <span>{value.size} {value.keywords}</span>',
            'value'       => [
                'file'     => 'entry.name',
                'folder'   => 'entry.folder.slug',
                'keywords' => 'entry.keywords.labels',
                'disk'     => 'entry.folder.disk.slug',
                'size'     => 'entry.size_label'
            ]
        ],
        'size'          => [
            'sort_column' => 'size',
            'value'       => 'entry.readable_size'
        ],
        'mime_type',
        'folder'
    ];
}
