<?php namespace Cyd293\CCatalog\Models;

use Model;

/**
 * Product Model
 */
class Product extends Model
{
    /**
    * The name of the "created at" column
    *
    * @var string
    */
    const CREATED_AT = 'product_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'product_updated_at';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cyd293_ccatalog_products';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];
    
    protected $jsonable = ['product_images'];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'product_brand' => 'Cyd293\CCatalog\Models\Brand'
    ];
    public $belongsToMany = [
        'product_properties' => [
            'Cyd293\CCatalog\Models\Property',
            'table' => 'cyd293_ccatalog_product_properties',
            'key' => 'product_property_product_id',
            'otherKey' => 'product_property_id',
            'pivot' => [
                'product_property_value'
            ]
        ],
        'product_categories' => [
            'Cyd293\CCatalog\Models\Category',
            'table' => 'cyd293_ccatalog_product_categories',
            'key' => 'product_id',
            'otherKey' => 'category_id',
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphToMany = [
        'product_tags' => [
            'Cyd293\CCatalog\Models\Tag',
            'name' => 'taggable',
            'table' => 'cyd293_ccatalog_link_tags',
            'otherKey' => 'tag_id',
        ]
    ];
    /*public $attachOne = [
        'product_preview_image' => 'System\Models\File',
    ];
    public $attachMany = [
        'product_images' => 'System\Models\File',
    ];*/
}
