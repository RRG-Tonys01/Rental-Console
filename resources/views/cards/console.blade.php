{{-- @extends('layout.app')

@section('title', 'Console')

@section('content') --}}

<div id="fh5co-product" style="background-color:rgb(255, 230, 255)">
    <div class="container">
        <!-- <div class="row"> -->
          @foreach($consoles as $console)
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid"
                        style="background-image:url(/storage/{{ $console['Images'] }});">
                        <div class="inner">
                            <p>
                                <a href="add-to-cart/{{ $console->ConsoleID }}" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="home/detail/{{ $console->ConsoleID }}" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="{{ route('detail') }}">{{$console['Name']}}</a></h3>
                        <span class="price">Rp. {{$console['Price']}}</span>
                    </div>
                </div>
            </div>
          @endforeach
      </div>
    <!-- </div> -->
</div>
{{-- @endsection --}}
