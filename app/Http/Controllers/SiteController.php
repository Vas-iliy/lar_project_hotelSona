<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $template;

    protected $vars = [];

    protected $menu_rep;
    protected $article_rep;
    protected $service_rep;
    protected $room_rep;
    protected $contact_rep;
    protected $comment_rep;
    protected $reservation_rep;
    protected $category_rep;
    protected $text_rep;
    protected $img_rep;

    public function __construct()
    {

    }

    protected function renderOutput() {
        return view($this->template)->with($this->vars);
    }

}
