<?php namespace Cyd293\CCatalog\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\SimpleTree;
    
    /**
    * The name of the "created at" column
    *
    * @var string
    */
    const CREATED_AT = 'category_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'category_updated_at';
    
    const PARENT_ID = 'category_parent_id';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cyd293_ccatalog_categories';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'category_id';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    protected $jsonable = ['category_tags'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'category_children' => 'Cyd293\CCatalog\Models\Category'
    ];
    public $belongsTo = [
        'category_parent' => 'Cyd293\CCatalog\Models\Category'
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    
    public $morphToMany = [
        'category_tags' => [
            'Cyd293\CCatalog\Models\Tag',
            'name' => 'taggable',
            'table' => 'cyd293_ccatalog_link_tags',
            'otherKey' => 'tag_id',
        ]
    ];
}
