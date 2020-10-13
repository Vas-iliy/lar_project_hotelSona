@if($room)
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="{{asset(env('THEME'))}}/img/room/{{$room->img}}" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{$room->title}}</h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    @for($i=0; $i < intval($room->rating); $i++)
                                        <i class="icon_star"></i>
                                    @endfor
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <a href="#">Booking Now</a>
                            </div>
                        </div>
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
                                <td> @foreach($room->services as $k => $service)
                                        {{$service->title}},{{$k == count($room->services) - 1 ? '...' : ' '}}
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p>{!! $room->descr !!}</p>
                    </div>
                </div>
                @if($room->comments)
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        @foreach($room->comments as $comments)
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{asset(env('THEME'))}}/img/room/avatar/{{$comments->img}}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>{{$comments->created_at->format('d, m, Y')}}</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>{{$comments->name}}</h5>
                                <p>{{$comments->text}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
                <div class="review-add">
                    <h4>Add Review</h4>
                    <form action="#" class="ra-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Name*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email*">
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <h5>You Rating:</h5>
                                    <div class="rating">
                                        @for($i=0; $i < intval($room->rating); $i++)
                                            <i class="icon_star"></i>
                                        @endfor
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                </div>
                                <textarea placeholder="Your Review"></textarea>
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Your Reservation</h3>
                    <form action="{{route('rooms.show', ['alias' => $room->title])}}">
                        @csrf
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" class="date-input" id="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input" id="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select id="guest">
                                <option value="">3 Adults</option>
                            </select>
                        </div>
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select id="room">
                                <option value="">1 Room</option>
                            </select>
                        </div>
                        <button type="submit">Check Availability</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
