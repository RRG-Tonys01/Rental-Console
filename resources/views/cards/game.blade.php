{{-- @extends('layout.app')

@section('title', 'Games')

@section('content') --}}

<div id="fh5co-product" style="background-color:rgb(255, 230, 255)">
    <div class="container">

        <!-- <div class="row"> -->
          @foreach($Games as $Game)
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid"
                        style="background-image:url({{ $Game['Cover'] }}/images/product-1.jpg);">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="{{ route('detail') }}" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="{{ route('detail') }}">{{$Game['Name']}}</a></h3>
                        <span class="price">Rp. {{$Game['Price']}}</span>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    <!-- </div> -->
</div>
{{-- @endsection --}}
