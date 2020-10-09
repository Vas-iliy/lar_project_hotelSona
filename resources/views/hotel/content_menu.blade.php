@if($items)
    @foreach($items as $item)
        <li {{\Illuminate\Support\Facades\URL::current() == $item->url() ? 'class=active' : ''}}>
            <a href="{{$item->url()}}">{{$item->title}}</a>
            @if($item->hasChildren())
                <ul class="dropdown">
                    @include(env('THEME') . '.content_menu', ['items' => $item->children()])
                </ul>
            @endif
        </li>
    @endforeach
@endif
