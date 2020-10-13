<?php

namespace App\Http\Controllers;

use App\Repositories\CommentsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MenuRepository;
use App\Repositories\NewsRepository;
use App\Repositories\RoomsRepository;
use App\Repositories\SocialRepository;
use App\Repositories\TextRepository;
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
    protected $social_rep;

    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep, SocialRepository $social_rep,
                                TextRepository $text_rep, ImageRepository $img_rep, RoomsRepository $room_rep,
                                CommentsRepository $comment_rep, NewsRepository $article_rep)
    {
        $this->contact_rep = $contact_rep;
        $this->menu_rep = $menu_rep;
        $this->social_rep = $social_rep;
        $this->text_rep = $text_rep;
        $this->img_rep = $img_rep;
        $this->room_rep = $room_rep;
        $this->comment_rep = $comment_rep;
        $this->article_rep = $article_rep;
    }

    protected function renderOutput() {
        $menu = $this->getMenu();
        $navigation = view(env('THEME') . '.menu', compact('menu'))->render();
        $this->vars = Arr::add($this->vars, 'navigation', $navigation);

        $contacts = $this->getContact();
        $contacts = $contacts[0];
        $icons = $this->getIcons();
        $text = $this->getText(['position', 'footer']);
        $footer = view(env('THEME') . '.footer', compact(['contacts', 'icons', 'text']))->render();
        $this->vars = Arr::add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }

    protected function getMenu() {
        $menu = $this->menu_rep->get('*');
        $menuBuilder = \Menu::make('myMenu', function ($m) use ($menu){
            foreach ($menu as $item) {
                if ($item->parent == 0) {
                    $m->add($item->title, $item->path)->id($item->id);
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

    protected function getImages($take, $where) {
        $img = $this->img_rep->get('*', $take, $where);

        return $img;
    }

    protected function getTextPage($where)
    {
        $text = $this->menu_rep->one($where);
        $text->load('text');

        return $text;
    }

    protected  function getRooms($take) {
        $rooms = $this->room_rep->get('*', $take);
        $rooms->load('services');

        return $rooms;
    }

    protected function getComments($take) {
        $comments = $this->comment_rep->get('*', $take);

        return $comments;
    }

    protected function getNews($take) {
        $news = $this->article_rep->get('*', $take);
        $news->load('filter');

        return $news;
    }
}
