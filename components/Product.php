<?php namespace Cyd293\CCatalog\Components;

use Cms\Classes\ComponentBase;
use Cyd293\CCatalog\Models\Product as ProductModel;

class Product extends ComponentBase
{
    private $details = null;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Product Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'id' => [
                'title' => 'ID',
                'type' => 'string',
            ],
            'slug' => [
                'title' => 'Slug',
                'type' => 'string',
            ],
            'pageVariable' => [
                'title' => 'As variable',
                'default' => 'product',
            ],
        ];
    }
    
    public function onRun()
    {
        $this->details = $this->details();
        $this->page[$this->property('pageVariable')] = $this->details;
        
        if ($this->details == null) {
            abort(404, 'Record not found!');
        }
    }
    
    public function details()
    {
        $details = ProductModel::where('product_id', '=', $this->property('id'))
            ->where('product_slug', '=', $this->property('slug'))
            ->with(['product_brand'])
            ->first()
        ;
        
        return $details;
    }
}
