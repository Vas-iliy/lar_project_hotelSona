<!-- Hero Section Begin -->
@if($imgs)
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @if($text)
                    <div class="hero-text">
                        <h1>{{$text->text[0]->title}}</h1>
                        <p>{{$text->text[0]->descr}}</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                @endif
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                @include(env('THEME') . '.sidebar')
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        @foreach($imgs as $img)
            <div class="hs-item set-bg" data-setbg="{{asset(env('THEME'))}}/img/hero/{{$img->img}}"></div>
        @endforeach
    </div>
</section>
@endif
<!-- Hero Section End -->

<!-- About Us Section Begin -->
@if($textAbout)
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>{{$textAbout[0]->position}}</span>
                        <p>{!! $textAbout[0]->title !!}</p>
                    </div>
                    <p>{!! $textAbout[0]->descr !!}</p>
                    <a href="#" class="primary-btn about-btn">Read More</a>
                </div>
            </div>
            <div class="col-lg-6">
                @if($imgAbout)
                    <div class="about-pic">
                        <div class="row">
                            @foreach($imgAbout as $img)
                                <div class="col-sm-6">
                                    <img src="{{asset(env('THEME'))}}/img/about/{{$img->img}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
<!-- About Us Section End -->

<!-- Services Section End -->
@if($services)
<section class="services-section spad">
    <div class="container">
        @if($textService)
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>{{$textService[0]->title}}</span>
                        <h2>{{$textService[0]->descr}}</h2>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="{{$service->icon}}"></i>
                        <h4>{{$service->title}}</h4>
                        <p>{{$service->descr}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- Services Section End -->

<!-- Home Room Section Begin -->
@if($rooms)
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                @foreach($rooms as $room)
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset(env('THEME'))}}/img/room/{{$room->img}}">
                            <div class="hr-text">
                                <h3>{{$room->title}}</h3>
                                <h2>{{$room->price}}$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{$room->size}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{$room->capacity}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{$room->bed}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>
                                            @foreach($room->services as $k => $service)
                                                {{$service->title}},{{$k == count($room->services) - 1 ? '...' : ' '}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
@if($comments)
<section class="testimonial-section spad">
    <div class="container">
        @if($textComment)
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>{{$textComment[0]->title}}}</span>
                        <h2>{{$textComment[0]->descr}}</h2>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    @foreach($comments as $comment)
                        <div class="ts-item">
                            <p>{{$comment->text}}</p>
                            <div class="ti-author">
                                <div class="rating">
                                    @for($i = 0; $i < intval($comment->rating); $i++)
                                        <i class="icon_star"></i>
                                    @endfor
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - {{$comment->name}}</h5>
                            </div>
                            <img src="{{asset(env('THEME'))}}/img/{{$comment->img}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Testimonial Section End -->

<!-- Blog Section Begin -->
@if($news)
<section class="blog-section spad">
    <div class="container">
        @if($textNews)
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>{{$textNews[0]->title}}</span>
                        <h2>{{$textNews[0]->descr}}</h2>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @foreach($news as $k => $new)
                <div class="{{$k<3 ? 'col-lg-4' : 'col-lg-6'}}">
                    <div class="blog-item {{$k>2 ? 'small-size' : ''}} set-bg" data-setbg="{{asset(env('THEME'))}}/img/blog/{{$new->img}}">
                        <div class="bi-text">
                            <span class="b-tag">{{$new->filter->title}}</span>
                            <h4><a href="#">{{$new->title}}</a></h4>
                            @if($new->created_at)
                                <div class="b-time"><i class="icon_clock_alt"></i> {{$new->created_at->format('jS, F, Y')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- Blog Section End -->
