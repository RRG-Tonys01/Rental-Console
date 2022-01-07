<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Console;

class HomeController extends Controller
{
  public function index() {

  }

  public function redirect(Request $request) {
    $role=Auth::user()->role;
    if($role == 0)
    {
      $console = Console::all();
      return view('home',['consoles'=>$console]);
    }
  }

  function show()
  {
    $console = Console::all();
    return view('home',['consoles'=>$console]);
  }

}
