<?php namespace Cyd293\CCatalog\Models;

use Model;

/**
 * Property Model
 */
class Property extends Model
{
    /**
    * The name of the "created at" column
    *
    * @var string
    */
    const CREATED_AT = 'property_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'property_updated_at';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cyd293_ccatalog_properties';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'property_id';

    protected $jsonable = ['property_values'];

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

    public function filterFields($fields, $context = null)
    {
        if (isset($fields->_isPivot) && $fields->property_type->value == 'dropdown') {
            $values = $fields->property_values->value;
            $fields->{"pivot[product_property_value]"}->type = 'dropdown';
            $fields->{"pivot[product_property_value]"}->options = [];
            foreach ($values as $value) {
                $fields->{"pivot[product_property_value]"}->options[$value['name']] = $value['value'];
            }
        }
    }
}
