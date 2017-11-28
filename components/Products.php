<?php namespace Cyd293\CCatalog\Components;

use Cms\Classes\ComponentBase;
use Cyd293\CCatalog\Models\Category;
use Cyd293\CCatalog\Models\Product;
use Cyd293\CCatalog\Models\Tag;

class Products extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Products Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                'title' => 'Max Items',
                'description' => '',
                'type' => 'string',
                'default' => 10,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The max items property can contain only numeric symbols'
            ],
            'search' => [
                'title' => 'Search',
                'description' => '',
            ],
            'tags' => [
                'title' => 'Tags',
                'description' => 'Get by tag',
                'type' => 'dropdown',
                'default' => '',
            ],
            'categories' => [
                'title' => 'categories',
                'description' => 'Get by categories',
                'type' => 'dropdown',
                'default' => '',
            ],
            'page' => [
                'title' => 'Page',
                'description' => 'On page',
                'validationPattern' => '^[0-9]+$',
                'default' => 1,
            ],
            'sort' => [
                'title' => 'Sort',
                'description' => 'Sorting',
                'type' => 'dropdown',
                'options' => [
                    'product_id' => 'Product ID',
                    'product_name' => 'Product Name',
                ],
                'default' => 'product_name',
            ],
            'sortDir' => [
                'title' => 'Sort Direction',
                'type' => 'dropdown',
                'options' => [
                    'ASC' => 'Ascending',
                    'DESC' => 'Descending',
                ],
                'default' => 'ASC',
            ],
        ];
    }
    
    public function items()
    {
        $search = $this->property('search', '');
        $tags = explode(',', $this->property('tags', ''));
        $limit = (int) $this->property('maxItems');
        $page = (int) $this->property('page');
        $categories = explode(',', $this->property('categories', ''));
        $sort = $this->property('sort');
        $sortDir = $this->property('sortDir');

        $query = Product::query();
        
        if ($this->property('tags') !== '' && !empty($tags)) {
            $query->whereHas('product_tags', function ($query) use($tags) {
                $query->whereIn('cyd293_ccatalog_link_tags.tag_id', $tags);
            });
        }
        
        if ($this->property('categories') !== '' && !empty($categories)) {
            $query->whereHas('product_categories', function ($query) use($categories) {
                $query->whereIn('cyd293_ccatalog_product_categories.category_id', $categories);
            });
        }
        
        if ($search !== '') {
            $query->where('product_slug', 'like', '%' . $search . '%');
            $query->where('product_slug', 'like', '%' . $search . '%');
        }
        if ($sort !== '') {
            $query->orderBy($sort, $sortDir);
        }
        
        $total = $query->count();
        $totalPages = 1;
        
        if ($limit !== 0) {
            $query->limit($limit);
            $totalPages = $total / $limit;
            if ($page !== 0) {
                $query->offset(($page - 1) * $limit);
            }
        }
        
        $data = $query->get()->toArray();
        
        return [
            'data' => $data,
            'meta' => [
                'pagination' => [
                    'total' => $total,
                    'count' => count($data),
                    'per_page' => $limit,
                    'current_page' => $this->property('page'),
                    'total_pages' => $totalPages,
                ]
            ]
        ];
    }
    
    public function getTagsOptions()
    {
        $tags = Tag::orderBy('tag_slug')->lists('tag_name', 'tag_id');
        $tags = ['' => 'All'] + $tags;
       
        return $tags;
    }
    
    public function getCategoriesOptions()
    {
        $categories = Category::orderBy('category_slug')->lists('category_name', 'category_id');
        $categories = ['' => 'All'] + $categories;
        
        return $categories;
    }
}
