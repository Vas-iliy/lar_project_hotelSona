<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="#">
                                <img src="{{asset(env('THEME'))}}/img/footer-logo.png" alt="">
                            </a>
                        </div>
                        @if($text[0])
                            <p>{!! $text[0]->descr !!}</p>
                        @endif
                        @if($icons)
                            <div class="fa-social">
                                @foreach($icons as $icon)
                                    <a href="{{$icon->link}}"><i class="{{$icon->icon}}"></i></a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    @if($contacts)
                        <div class="ft-contact">
                            <h6>{{$contacts->title}}</h6>
                            <ul>
                                <li>{{$contacts->phone}}</li>
                                <li>{{$contacts->email}}</li>
                                <li>{{$contacts->adres}}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-3 offset-lg-1">
                    @if($text[1])
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>{!! $text[1]->descr !!}</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
