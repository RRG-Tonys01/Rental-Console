@extends('layout.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style media="screen">
.card {
  margin:20px;
  padding: 4vh 0;
  box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-top: 3px solid #fae3c9;
  border-bottom: 3px solid #fae3c9;
  border-left: none;
  border-right: none
}

@media(max-width:768px) {
  .card {
      width: 90%
  }
}
.column {
  float: left;
  width: 100%;
  padding: 0 10px;
}

.title {
    color: rgb(252, 103, 49);
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial
}

#details {
    font-weight: 400
}

.info {
    padding: 5% 8%
}

.info .col-5 {
    padding: 0
}

#heading {
    color: grey;
    line-height: 6vh
}

.pricing {
    background-color: #ddd3;
    padding: 2vh 8%;
    font-weight: 400;
    line-height: 2.5
}

.pricing .col-3 {
    padding: 0
}

.total {
    padding: 2vh 8%;
    color: rgb(252, 103, 49);
    font-weight: bold
}

.total .col-3 {
    padding: 0
}

.footer {
    padding: 0 8%;
    font-size: x-small;
    color: black
}

.footer img {
    height: 5vh;
    opacity: 0.2
}

.footer a {
    color: rgb(252, 103, 49)
}

.footer .col-10,
.col-2 {
    display: flex;
    padding: 3vh 0 0;
    align-items: center
}

.footer .row {
    margin: 0
}

</style>
@section('content')

<h4 class="text-center mt-4">ORDER LIST</h4>
<div class="row">
  <div class="column">
    @forelse($listOrder as $key =>$order)
    <?php $detailOrder = explode(",",$order->items); ?>
    <div class="card">
        <div class="title">Order Receipt</div>
        <div class="info">
            <div class="row">
                <div class="col-7"> <span id="heading">Date Rent</span><br><span id="details">{{$order->tglCheckout}}</span> </div>
                <div class="col-4 pull-right"> <span id="heading">Order No.</span><br> <span id="details">{{$order->OrderID}}</span> </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <span id="heading">Date Return</span><br><span id="details">{{$order->tglPick}}</span>
                </div>
            </div>
        </div>
        <div class="pricing">
            <div class="row">
              <?php
                  foreach($detailOrder as $key){
                      $detailItem = DB::table('consoles')->where('ConsoleID',trim($key,'[]{}"idItem:'))->get();
                  }
              ?>
                <div class="col-9"> <span id="name">{{$detailItem[0]->Name}}</span> </div>
                <div class="col-3"> <span id="price">Rp. {{number_format($detailItem[0]->Price,0)}}</span> </div>
            </div>
        </div>
        <div class="total">
            <div class="row">
                <div class="col-9">Total Price</div>
                <div class="col-3"><big>Rp. {{number_format($order->total,0)}}</big></div>
            </div>
        </div>
        <div class="total">
          <div class="row">
              <div class="col-9">Status</div>
              @if ($order->status == "Sedang Dikirim")
                  <div class="col-3"><big>Sedang Dikirim</big></div>
              @endif
              @if ($order->status == "Sudah Dikirim")
                  <div class="col-3"><big>Sudah Dikirim</big></div>
              @endif
              @if ($order->status == "Siap di Pick-up")
                  <div class="col-3"><big>Siap di Pick-up</big></div>
              @endif
              @if ($order->status == "Selesai")
                  <div class="col-3"><big>Selesai</big></div>
              @endif
          </div>
        </div>
        @if ($order->status == "Sudah Dikirim")
            <a type='button' class='btn btn-secondary disable mt-3' href="/changeStatus/pickup/{{ $order->OrderID }}">Mengembalikan produk</a>
        @endif

    </div>
    @empty
    @endforelse
  </div>
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
