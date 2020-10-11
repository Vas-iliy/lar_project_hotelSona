<?php

namespace App\Http\Controllers;

use App\Image;
use App\Repositories\ContactRepository;
use App\Repositories\MenuRepository;
use App\Repositories\SocialRepository;
use App\Repositories\TextRepository;
use Illuminate\Support\Arr;

class HomeController extends SiteController
{
    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep, SocialRepository $social_rep, TextRepository $text_rep, Image $img_rep)
    {
        parent::__construct($contact_rep, $menu_rep, $social_rep, $text_rep, $img_rep);
        $this->one_page = '.home';
        $this->template = env('THEME') . $this->one_page . '.home';
    }

    public function index() {
        $where = ['title', 'home'];
        $imgs = $this->getImages($where);
        $text = $this->getTextPage($where);
        $content = view(env('THEME') . $this->one_page . '.content', compact(['imgs', 'text']))->render();
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
