<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\MenuRepository;
use App\Repositories\SocialRepository;
use App\Repositories\TextRepository;
use Cassandra\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    protected $one_page;
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
    protected $social_rep;

    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep, SocialRepository $social_rep, TextRepository $text_rep)
    {
        $this->contact_rep = $contact_rep;
        $this->menu_rep = $menu_rep;
        $this->social_rep = $social_rep;
        $this->text_rep = $text_rep;
    }

    protected function renderOutput() {
        $menu = $this->getMenu();
        $navigation = view(env('THEME') . '.menu', compact('menu'))->render();
        $this->vars = Arr::add($this->vars, 'navigation', $navigation);

        $contacts = $this->getContact();
        $contacts = $contacts[0];
        $icons = $this->getIcons();
        $where = ['title', 'footer'];
        $text = $this->getText($where);
        $footer = view(env('THEME') . '.footer', compact(['contacts', 'icons', 'text']))->render();
        $this->vars = Arr::add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }

    protected function getMenu() {
        $menu = $this->menu_rep->get('*');
        $menuBuilder = \Menu::make('myMenu', function ($m) use ($menu){
            foreach ($menu as $item) {
                if ($item->parent == 0) {
                    $m->add($item->alias, $item->path)->id($item->id);
                }
                else {
                    if ($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->alias, $item->path)->id();
                    }
                }
            }
        });

        return $menuBuilder;
    }

    protected function getContact() {
        $contact = $this->contact_rep->get('*');

        return $contact;
    }

    protected function getIcons() {
        $icons = $this->social_rep->get('*');

        return $icons;
    }

    protected function getText($where) {
        $text = $this->text_rep->get('*', false, $where);

        return $text;
    }
}
