@extends('layout.app')

@section('title', 'detail')

@section('content')
<div id="fh5co-product">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid"
                        style="background-image:url(/storage/{{$console_detail->Images}});">
                    </div>
                    <div class="desc">
                        <h3>{{ $console_detail->Name }}</h3>
                        <span class="price">Rp {{ $console_detail->Price }},00</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3>Description</h3>
                <p>{{$console_detail->Descrip}} <br>(<b><i>Include 5 Games</b></i>)</p>
                <a href="/home/detail/{{$console_detail->ConsoleID}}" class="btn btn-success">Add to Cart &nbsp;<i class="icon-shopping-cart"></i></a>
                <a href="/" class="btn btn-default">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection
