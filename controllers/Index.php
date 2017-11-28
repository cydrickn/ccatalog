<?php namespace Cyd293\CCatalog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Index Back-end Controller
 */
class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Cyd293.CCatalog', 'ccatalog', 'index');
    }

    public function index()
    {
      
    }
}
