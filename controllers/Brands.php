<?php namespace Cyd293\CCatalog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Brands Back-end Controller
 */
class Brands extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Cyd293.CCatalog', 'ccatalog', 'brands');
    }
}
