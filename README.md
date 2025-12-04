# File Field Type

*anomaly.field_type.file*

#### A file upload field type.

The file field type provides a single file upload input with integration to the Files Module.

## Features

- Single file upload
- Integration with Files Module
- BelongsTo relationship with file records
- Folder restrictions for organized uploads
- File type/extension filtering
- Drag and drop upload support
- File browsing from media library
- Preview support for images and documents
- Configurable display modes

## Configuration

### Basic Configuration

```php
protected $fields = [
    'attachment' => [
        'type' => 'anomaly.field_type.file'
    ]
];
```

### With Folder Restriction

```php
'document' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'folders' => ['documents']
    ]
]
```

### With File Type Restrictions

```php
'avatar' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'folders'    => ['avatars'],
        'extensions' => ['jpg', 'jpeg', 'png']
    ]
]
```

### With Display Mode

```php
'image' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'mode'    => 'compact',
        'folders' => ['images']
    ]
]
```

## Usage Examples

### Basic File Upload

```php
$stream->create([
    'attachment' => 1 // File ID
]);
```

### With File Upload in Form

```php
protected $fields = [
    'document' => [
        'type'  => 'anomaly.field_type.file',
        'rules' => [
            'required'
        ]
    ]
];
```

## Accessing Values

### In Twig Templates

```twig
{# Display file name #}
{{ entry.attachment.name }}

{# Display file link #}
<a href="{{ entry.attachment.path }}">Download {{ entry.attachment.name }}</a>

{# Display image #}
{% if entry.image %}
    <img src="{{ entry.image.path }}" alt="{{ entry.image.name }}">
{% endif %}

{# Display image with manipulation #}
<img src="{{ entry.avatar.make().fit(200, 200).path() }}" alt="Avatar">

{# Check if file exists #}
{% if entry.document %}
    <p>Document attached: {{ entry.document.name }}</p>
{% endif %}

{# Get file properties #}
{{ entry.attachment.size }} bytes
{{ entry.attachment.extension }}
{{ entry.attachment.mime_type }}
```

### In PHP

```php
$entry = $model->find(1);

// Get file object
$file = $entry->attachment;

if ($file) {
    // Get file properties
    $name = $file->name;
    $path = $file->path();
    $size = $file->size;
    $extension = $file->extension;
    $mimeType = $file->mime_type;
    
    // Get file ID
    $fileId = $entry->attachment_id;
    
    // Image manipulation
    if ($file->isImage()) {
        $thumbnail = $file->make()->fit(150, 150)->path();
    }
}
```

## Setting Values

### In Forms

```php
$form = $builder->make('example.module.test');
$form->on('saving', function(FormBuilder $builder) {
    $entry = $builder->getFormEntry();
    
    // Set file ID
    $entry->attachment = 5;
});
```

### Direct Assignment

```php
// Set by file ID
$entry->attachment_id = 10;
$entry->save();

// Or set by file object
$file = File::find(10);
$entry->attachment()->associate($file);
$entry->save();
```

## Database Structure

The file field type stores the file relationship as:
- **INTEGER** - Foreign key to `files_files.id`

## Validation

### Required File

```php
'attachment' => [
    'type'  => 'anomaly.field_type.file',
    'rules' => [
        'required'
    ]
]
```

### File Must Exist

```php
'document' => [
    'type'  => 'anomaly.field_type.file',
    'rules' => [
        'required',
        'exists:files_files,id'
    ]
]
```

## Common Use Cases

### User Avatar

```php
'avatar' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'folders'    => ['avatars'],
        'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
        'mode'       => 'compact'
    ]
]
```

### PDF Document Upload

```php
'contract' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'folders'    => ['contracts'],
        'extensions' => ['pdf']
    ],
    'rules' => [
        'required'
    ]
]
```

### Product Featured Image

```php
'featured_image' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'folders'    => ['products'],
        'extensions' => ['jpg', 'jpeg', 'png']
    ],
    'rules' => [
        'required'
    ]
]
```

### Report Attachment

```php
'report' => [
    'type'   => 'anomaly.field_type.file',
    'config' => [
        'folders'    => ['reports'],
        'extensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx']
    ]
]
```

## Best Practices

1. **Restrict Folders**: Always limit uploads to specific folders for organization
2. **Validate Extensions**: Use extension restrictions for security
3. **Image Optimization**: Use image manipulation for thumbnails and responsive images
4. **Clean Up**: Implement cleanup for unused file records
5. **Check Existence**: Always check if file exists before accessing properties
6. **Use Relationships**: Leverage Eloquent relationships for easy access
7. **Consider Storage**: Monitor disk space for large file uploads

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+
- Files Module

## License

The File Field Type is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Authors

PyroCMS, Inc. - [https://pyrocms.com](https://pyrocms.com)
Ryan Thompson - [support@pyrocms.com](mailto:support@pyrocms.com)
