@extends('layout.app')

@section('title', 'detail')

@section('content')
<div id="fh5co-product">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid"
                        style="background-image:url({{ asset('template') }}/images/product-2.jpg);">
                    </div>
                    <div class="desc">
                        <h3>Pavilion Speaker</h3>
                        <span class="price">$600</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3>Description</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero magnam, corporis minima labore, praesentium odio soluta nemo eligendi accusamus minus facere repellendus ea voluptatem nesciunt? Soluta, delectus? Consequatur, deleniti quos.</p>
                <a href="single.html" class="btn btn-success">Add to Cart &nbsp;<i class="icon-shopping-cart"></i></a>
                <a href="{{ route('home') }}" class="btn btn-default">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection
