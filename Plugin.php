<?php namespace Cyd293\CCatalog;

use Backend;
use System\Classes\PluginBase;

/**
 * CCatalog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Cyd293\CCatalog\Components\Product' => 'product',
            'Cyd293\CCatalog\Components\Categories' => 'categories',
            'Cyd293\CCatalog\Components\Products' => 'products',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'cyd293.ccatalog.some_permission' => [
                'tab' => 'CCatalog',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'ccatalog' => [
                'label'       => 'Catalog',
                'url'         => Backend::url('cyd293/ccatalog/index'),
                'icon'        => 'icon-cubes',
                'permissions' => ['cyd293.ccatalog.*'],
                'order'       => 500,
                'sideMenu' => [
                    'categories' => [
                        'label' => 'Categories',
                        'url'   => Backend::url('cyd293/ccatalog/categories'),
                        'icon'  => 'icon-folder-open',
                    ],
                    'products' => [
                        'label' => 'Products',
                        'url'   => Backend::url('cyd293/ccatalog/products'),
                        'icon'  => 'icon-cube',
                    ],
                    'brands' => [
                        'label' => 'Brands',
                        'url'   => Backend::url('cyd293/ccatalog/brands'),
                        'icon'  => 'icon-bookmark',
                    ],
                    'properties' => [
                        'label' => 'Properties',
                        'icon'  => 'icon-tags',
                        'url'   => Backend::url('cyd293/ccatalog/properties'),
                    ],
                    'tags' => [
                        'label' => 'Tags',
                        'icon' => 'icon-tags',
                        'url' => Backend::url('cyd293/ccatalog/tags'),
                    ],
                ],
            ],
        ];
    }
}
