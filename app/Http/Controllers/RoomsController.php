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
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoomsController extends SiteController
{
    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep, SocialRepository $social_rep,
                                TextRepository $text_rep, ImageRepository $img_rep, RoomsRepository $room_rep,
                                CommentsRepository $comment_rep, NewsRepository $article_rep)
    {
        parent::__construct($contact_rep, $menu_rep, $social_rep, $text_rep, $img_rep, $room_rep, $comment_rep, $article_rep);

        $this->one_page = '.rooms';
        $this->template = env('THEME') . $this->one_page . '.rooms';
        $this->room_rep = $room_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index($cat_alias = false)
    {
        $rooms = $this->getRooms(false, 6, $cat_alias);

        $content = view(env('THEME') . $this->one_page . '.content', compact(['rooms', 'cat_alias']))->render();
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($alias)
    {
        $room = $this->room_rep->one(['title', $alias]);

        $content = view(env('THEME') . $this->one_page . '.one', compact(['room']))->render();
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
