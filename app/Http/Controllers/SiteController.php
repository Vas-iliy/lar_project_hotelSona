<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep)
    {
        $this->contact_rep = $contact_rep;
        $this->menu_rep = $menu_rep;
    }

    protected function renderOutput() {
        $menu = $this->getMenu();
        $navigation = view(env('THEME') . '.menu', compact('menu'))->render();
        $this->vars = Arr::add($this->vars, 'navigation', $navigation);


        $contacts = $this->getContact();
        $footer = view(env('THEME') . '.footer', compact('contacts'))->render();
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
}
