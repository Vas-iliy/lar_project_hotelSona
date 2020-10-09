@extends(env('THEME') . '.layouts.site')

@section('menu')
    {!! $navigation!!}
@endsection

@section('content')
    @include(env('THEME') . '.home.content')
@endsection

@section('footer')
    @include(env('THEME') . '.footer')
@endsection

