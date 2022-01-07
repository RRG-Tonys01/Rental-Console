@extends('layout.app')

@section('title', 'Home')

@section('content')
<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url({{ asset('template') }}/images/ps4.png);">
            </li>
            <li style="background-image: url({{ asset('template') }}/images/xbox.jpg);">
            </li>
            <li style="background-image: url({{ asset('template') }}/images/ps5.jpg);">
            </li>
            <li style="background-image: url({{ asset('template') }}/images/switch.jpg);">
            </li>
        </ul>
    </div>
</aside>

@include('cards.console')
@endsection
