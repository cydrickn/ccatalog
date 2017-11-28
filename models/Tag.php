<?php namespace Cyd293\CCatalog\Models;

use Model;

/**
 * Tag Model
 */
class Tag extends Model
{
    /**
    * The name of the "created at" column
    *
    * @var string
    */
    const CREATED_AT = 'tag_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'tag_updated_at';
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'cyd293_ccatalog_tags';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'tag_id';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    public $morphedByMany = [
        'product'  => ['Cyd293\CCatalog\Models\Product', 'name' => 'taggable'],
        'category' => ['Cyd293\CCatalog\Models\Category', 'name' => 'taggable']
    ];
}
