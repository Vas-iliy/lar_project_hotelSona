<?php

namespace App\Http\Controllers;

use App\Repositories\CommentsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MenuRepository;
use App\Repositories\NewsRepository;
use App\Repositories\RoomsRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\SocialRepository;
use App\Repositories\TextRepository;
use Illuminate\Support\Arr;

class HomeController extends SiteController
{
    public function __construct(ContactRepository $contact_rep, MenuRepository $menu_rep, SocialRepository $social_rep,
                                TextRepository $text_rep, ImageRepository $img_rep, ServicesRepository $service_rep,
                                RoomsRepository $room_rep, CommentsRepository $comment_rep, NewsRepository $article_rep)
    {
        parent::__construct($contact_rep, $menu_rep, $social_rep, $text_rep, $img_rep, $room_rep, $comment_rep, $article_rep);
        $this->one_page = '.home';
        $this->template = env('THEME') . $this->one_page . '.home';

        $this->service_rep = $service_rep;
    }

    public function index() {
        $where = ['title', 'home'];
        $imgs = $this->getImages(false, $where);
        $text = $this->getTextPage($where);

        $imgAbout = $this->getImages(2, ['title', 'about']);
        $textAbout = $this->getText(['position', 'About Us']);

        $textService = $this->getText(['position', 'Our Services']);
        $services = $this->getServices();

        $rooms = $this->getRooms(4);

        $textComment = $this->getText(['position', 'home comments']);
        $comments = $this->getComments(2);

        $textNews = $this->getText(['position', 'blog']);
        $news = $this->getNews(5);

        $content = view(env('THEME') . $this->one_page . '.content', compact(
            ['imgs', 'text', 'imgAbout', 'textAbout', 'textService', 'services', 'rooms', 'textComment', 'comments', 'textNews', 'news']))->render();
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    protected function getServices() {
        $services = $this->service_rep->get('*');

        return $services;
    }
}
