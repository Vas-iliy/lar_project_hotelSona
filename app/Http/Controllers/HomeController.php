<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\MenuRepository;

class HomeController extends SiteController
{
    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep)
    {
        parent::__construct($contact_rep, $menu_rep);
        $this->one_page = '.home';
        $this->template = env('THEME') . $this->one_page . '.home';
    }

    public function index() {

        return $this->renderOutput();
    }
}
