<?php namespace Cyd293\CCatalog\Models;

use Model;

/**
 * Brand Model
 */
class Brand extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
    * The name of the "created at" column
    *
    * @var string
    */
    const CREATED_AT = 'brand_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'brand_updated_at';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cyd293_ccatalog_brands';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'brand_id';

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

    public $rules = [
        'brand_name' => ['required'],
        'brand_slug' => ['required'],
    ];
}
