<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Session;

class ConsoleController extends Controller
{
    function __construct()
    {
      $this->Console = new Console();
    }

    function show()
    {
      $console = Console::all();
      // dd($console);
      // return view('Console', compact('details'));
      return view('Console',['consoles'=>$console]);
    }

    function detail($id)
    {
      $data = [
          'console_detail' => $this->Console->detailData($id),
      ];

      return view('detail', $data);
    }

    function addToCart(Request $request, $id)
    {
      if (Auth::user()){
        $items = DB::table('consoles')->where('ConsoleID', $id)->get();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $checking = DB::table('cart')->where('idItem', $id)->get();
        if (sizeof($checking) > 0) {
            return back()->with('warning', 'Barang Telah ada di keranjang');
          }else {
            $request->session()->put('data',$items);
            $data = $request->session()->get('data');

            $cart = new Cart($oldCart);
            $cart->add($items[0]);
            $request->session()->put('cart',$cart);
            $query = DB::table('cart')->insert([
                "idUser" => Auth::user()->id,
                "idItem" => $items[0]->ConsoleID
            ]);
            return redirect()->back()->with('status', 'Barang Berhasil Dimasukkan Kedalam Keranjang');
          }
       }else{
          return redirect()->route('login');
       }
    }

    function showCart(Request $request){
      if (Auth::user()) {
        $items = DB::table('cart')->where('idUser', Auth::user()->id)->get();
        $total = $request->session()->get('cart');
        return view('cart', compact('items','total'));
      }else {
        return redirect()->route('login');
      }

    }

    function deleteCart(Request $request, $id){
      if (Auth::user()) {

        $item = DB::table('consoles')->where('ConsoleID',$id)->get();
        $total = $request->session()->get('cart');

        $items = DB::table('cart')->where('idUser', Auth::user()->id)->where('idItem', $id)->delete();
        if ($items) {
            $price = $item[0]->Price;
            $total->totalPrice = $total->totalPrice - $price;
            $total->totalQty = $total->totalQty - 1;
            $request->session()->put('cart',$total);
            return redirect()->back()->with('delete',$item[0]->Name. " Telah dihapus dari cart");
        }else {
            return redirect()->back()->with('delete',$item[0]->Name. " Gagal dihapus dari cart");
        }
      }else {
        return redirect()->route('login');
      }
    }

    public function checkout($id, Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        if (isset(Auth::user()->email)) {
            $allItem = DB::table('cart')->where('idUser', Auth::user()->id)->get('idItem');
            // $ite = DB::table('order')->get('items');
            // dd($allItem);
            $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
            $string = '';
            for ($i=0; $i < 7; $i++) {
                $pos = rand(0, strlen($karakter)-1);
                $string .= $karakter[$pos];
            }
            $lama = $request->get('lamaPinjam');
            $Y = date("Y");
            $M = date("m");
            $D = date("d")+$lama;
            $date = ($Y.-$M.-$D);
            if (count($allItem) == 0) {
                // echo "kosong";
                return back()->with('warning', 'Cart kosong');
            } else {
                // echo "isi";
                // dd($request->get('lamaPinjam'));
                $mentah = explode(",", $allItem);
                $query = DB::table('order')->insert([
                    "OrderID" => $string,
                    "idUser" => Auth::user()->id,
                    "items" => trim($allItem),
                    "lama"  => $request->get('lamaPinjam'),
                    "total"  => $request->get('totalSemua'),
                    "tglPick" => $date,
                    "tglCheckout" => date("Y-m-d"),
                    "status" => "Sedang Dikirim",
                ]);
                for ($a = 0; $a < count($mentah); $a++) {
                    $newOrder = trim($mentah[$a], '[]{}"idItem:');
                    $dataItem = DB::table('consoles')->where('ConsoleID', $newOrder)->get('Quantity');
                    $new = $dataItem[0]->Quantity - 1;
                    //dd($new);
                    $query = DB::table('consoles')
                        ->where('ConsoleID', $newOrder)
                        ->update([
                            'Quantity' => $new
                        ]);
                }

                $query = DB::table('cart')->where('idUser', Auth::user()->id)->delete();
                $request->session()->forget('cart');
                return back()->with('hasil', 'Berhasil di checkout');
            }
        } else {
            return redirect('/')->with('warning', 'Login terlebih dahulu');
        }
    }

    function showDetail(Request $request){
      if (Auth::user()) {
        $listOrder = DB::table('order')->where('idUser', Auth::user()->id)->get();
        $banyakCart = DB::table('cart')->where('IdUser', Auth::user()->id)->get();
        return view('orderlist', compact('listOrder', 'banyakCart'));
      }else {
        return redirect()->route('login');
      }
    }
}
