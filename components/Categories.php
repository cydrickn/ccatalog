<?php namespace Cyd293\CCatalog\Components;

use Cms\Classes\ComponentBase;
use Cyd293\CCatalog\Models\Category;
use Cyd293\CCatalog\Models\Tag;
use Db;

class Categories extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Categories Component',
            'description' => 'Search categories'
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
            ],
            'page' => [
                'title' => 'Page',
                'description' => 'On page',
                'validationPattern' => '^[0-9]+$',
                'default' => 1,
            ],
            'nested' => [
                'title' => 'Nested',
                'type' => 'checkbox',
                'default' => false,
            ]
        ];
    }
    
    public function items()
    {
        $search = $this->property('search', '');
        $tags = explode(',', $this->property('tags', ''));
        $limit = (int) $this->property('maxItems');
        $page = (int) $this->property('page');

        $query = Category::query();
        
        if ($this->property('tags', '') !== '' && !empty($tags)) {
            $query->whereHas('category_tags', function ($query) use($tags) {
                $query->whereIn('cyd293_ccatalog_link_tags.tag_id', $tags);
            });
        }
        
        if ($search !== '') {
            $query->where('category_slug', 'like', '%' . $search . '%');
            $query->where('category_name', 'like', '%' . $search . '%');
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
        
        $data = $query->get();
        
        if ($this->property('nested')) {
            $data = $data->toNested()->toArray();
        } else {
            $data = $data->toArray();
        }
        
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
}
