@extends('layout.app')

@section('title', 'Cart')

@section('content')
{{-- Stylesheets --}}
<!-- Template specific stylesheets-->
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="{{ asset('assets/lib/animate.css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/flexslider/flexslider.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/simple-text-rotator/simpletextrotator.css') }}" rel="stylesheet">
<!-- Main stylesheet and color file-->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link id="color-scheme" href="{{ asset('assets/css/colors/default.css') }}" rel="stylesheet">
<div class="main">
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt">Checkout</h1>
                </div>
            </div>
            <hr class="divider-w pt-20">
            <div class="row">
                <div class="col-sm-12">
                  @if(session('delete'))
                      <li class="alert alert-danger">
                          {{ session('delete') }}
                      </li>
                  @endif
                  @if(session('hasil'))
                      <li class="alert alert-success">
                          {{ session('hasil') }}
                      </li>
                  @endif
                    <table class="table table-striped table-border checkout-table">
                        <tbody>

                            <tr>
                                <th class="hidden-xs">Item</th>
                                <th>Name</th>
                                <th class="hidden-xs">Price</th>
                                <th>Remove</th>
                            </tr>
                            @forelse($items as $key =>$i)
                              <?php
                                $item = DB::table('consoles')->where('ConsoleID',$i->idItem)->get();
                                ?>
                            @forelse($item as $key =>$it)
                            <tr>
                                <td class="hidden-xs"><a href="#"><img src="/storage/{{$it->Images}}"
                                            alt="Accessories Pack" /></a></td>
                                <td>
                                    <h5 class="product-title font-alt">{{$it->Name}}</h5>
                                </td>
                                <td class="hidden-xs">
                                    <h5 class="product-title font-alt">Rp. {{number_format($it->Price,0)}}</h5>
                                </td>

                                <td class="pr-remove"><a href="/showCart/delete/{{$it->ConsoleID}}" title="Remove"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="row">
              <form class="" action="/checkout/{{Auth::user()->id}}" method="post">
                @csrf
                <?php if ($total != NULL): ?>
                  <div class="col-sm-6">
                    <tr>
                        <td colspan="2"><input class="text-center invisible" name="totalSemua" id="totalSemua" type="number" value="{{ $total->totalPrice }}"><span id="hargaAsli" class="invisible">{{ $total->totalPrice }}</span></td>
                        <td class="text-right"><strong>Lama Pinjam</strong></td>
                        <td class="text-right">
                            <input class="text-center" name="lamaPinjam" id="lamaPinjam" type="number" value="1" min="1">
                        </td>
                        <td>Hari</td>
                    </tr>
                  </div>

                    <div class="col-sm-3 col-sm-offset-3">
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-round btn-g pull-right" id="update" style="background-color:#fae3c9;">Update Cart</button>
                        </div>
                    </div>
                </div>
                <hr class="divider-w">
                <div class="row mt-70">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="shop-Cart-totalbox">
                            <h4 class="font-alt">Cart Totals</h4>
                            <table class="table table-striped table-border checkout-table">
                                <tbody>
                                    <tr class="shop-Cart-totalprice">
                                        <th>Total:</th>
                                        <td class="text-right"><strong>Rp. <span class="text-center" type=text name="hasilTotal" id="hasilTotal" value="" readonly>{{ number_format($total->totalPrice,0) }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-lg btn-block btn-round btn-g" style="background-color:#fae3c9"
                                type="submit">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>


                <?php else: ?>
                  <div class="col-sm-6">
                    <tr>
                        <td class="alert alert-danger">Tidak Ada Barang Di Cart</td>
                        <td colspan="2"><input class="text-center invisible" name="totalSemua" id="totalSemua" type="number" value=""><span id="hargaAsli" class="invisible"></span></td>
                        <td class="text-right"><strong>Lama Pinjam</strong></td>
                        <td class="text-right">
                            <input class="text-center" name="lamaPinjam" id="lamaPinjam" type="number" value="1" min="1">
                        </td>
                        <td>Hari</td>
                    </tr>
                  </div>

                    <div class="col-sm-3 col-sm-offset-3">
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-round btn-g pull-right" id="update" style="background-color:#fae3c9;">Update Cart</button>
                        </div>
                    </div>
                </div>
                <hr class="divider-w">
                <div class="row mt-70">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="shop-Cart-totalbox">
                            <h4 class="font-alt">Cart Totals</h4>
                            <table class="table table-striped table-border checkout-table">
                                <tbody>
                                    <tr class="shop-Cart-totalprice">
                                        <th>Total:</th>
                                        <td class="text-right"><strong>Rp. <span class="text-center" type=text name="hasilTotal" id="hasilTotal" value="" readonly></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-lg btn-block btn-round btn-g" style="background-color:#fae3c9"
                                type="submit">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

              </form>

        </div>
    </section>
</div>
{{-- JavaScripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('#update').click(function() {
            var realTotal = 0;
            duration = parseInt($('#lamaPinjam').val());
            total = parseInt($('#hargaAsli').text());

            var realTotal = duration * total ;
            var x = duration * total ;
            var hasil = new Intl.NumberFormat().format(realTotal)
            $('#hasilTotal').text(hasil);
            $('#totalSemua').val(realTotal);
        });
    });
</script>
<script src="{{ asset('assets/lib/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/lib/wow/dist/wow.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js') }}">
</script>
<script src="{{ asset('assets/lib/isotope/dist/isotope.pkgd.js') }}"></script>
<script src="{{ asset('assets/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('assets/lib/flexslider/jquery.flexslider.js') }}"></script>
<script src="{{ asset('assets/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/lib/smoothscroll.js') }}"></script>
<script src="{{ asset('assets/lib/magnific-popup/dist/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}">
</script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
