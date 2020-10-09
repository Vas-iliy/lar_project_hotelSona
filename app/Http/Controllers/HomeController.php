<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\MenuRepository;
use App\Repositories\SocialRepository;
use App\Repositories\TextRepository;

class HomeController extends SiteController
{
    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep, SocialRepository $social_rep, TextRepository $text_rep)
    {
        parent::__construct($contact_rep, $menu_rep, $social_rep, $text_rep);
        $this->one_page = '.home';
        $this->template = env('THEME') . $this->one_page . '.home';
    }

    public function index() {

        return $this->renderOutput();
    }
}
