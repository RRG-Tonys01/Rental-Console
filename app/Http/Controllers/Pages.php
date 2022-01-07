<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Pages extends Controller
{
    public function index(Request $request){
      if ($request->session()->has('admin')) {
        return redirect()->route('admin/dashboard');
      }else {
        return view('backend/login');
      }
    }

    public function verify(Request $request){
      if ($request->session()->has('admin')) {
          $request->session()->forget('admin');
        return redirect()->route('admin/dashboard');
      }else{
        $rules = [
          'email' => 'required|max:255',
          'password' => 'required',
          'g-recaptcha-response' => 'required|captcha',
        ];
        $Custmessages = [
            'g-recaptcha-response.required' => 'Captcha Must Be Filled',
        ];
        $this->validate($request, $rules,$Custmessages);

        $form = $request->all();
        $request->session()->put('admin',$form);
        $email = $form['email'];
        $pass = $form['password'];
        $users = DB::select('select * from admin where Email = ?', [$email]);
          if ($users != NULL) {
            $data = $users[0];
            $dbpass = $data->Password;
            if (Hash::check($pass, $dbpass)) {
              return redirect()->route('admin/dashboard');
            }else {
              $request->session()->forget('admin');
              return redirect()->back()->with('status', 'Email or Password Wrong');
            }
          }else {
            $request->session()->forget('admin');
            return redirect()->back()->with('status', 'Email or Password Wrong');
          }


      }

    }

    public function home(Request $request){
      if ($request->session()->exists('admin')) {
          $data['admin'] = $request->session()->get('admin');
          return view('backend/dashboard',$data);
      }else {
          return redirect()->route('index');
      }
    }

    public function product(Request $request){
      if ($request->session()->exists('admin')) {
          $data['admin'] = $request->session()->get('admin');
          $data['barang'] = DB::table('consoles')->get();
          return view('backend/product',$data);
      }else {
          return redirect()->route('index');
      }
    }

    public function add(Request $request){
      if ($request->session()->exists('admin')) {
          $data['admin'] = $request->session()->get('admin');
          $barang = $request->all();
          $path = Storage::putFile(
              'images',
              $request->file('upload'), 'public'
          );
          $id = DB::table('consoles')->insertGetId(
              ['Name' => $barang['nama'], 'Descrip' => $barang['deskripsi'], 'Price' => $barang['harga'], 'Images'=> $path ]
          );
          if ($id) {
            Storage::move($path, 'public/'.$path);
            return redirect()
            ->back()
            ->withSuccess("Item Was Successful Inserted" );
          }
      }else {
          return redirect()->route('index');
      }
    }

    public function delete(Request $request, $id){
      if($request->session()->exists('admin')){
        $user = DB::table('consoles')->where('ConsoleID', $id)->first();
        $del = DB::table('consoles')->where('ConsoleID', $id)->delete();

        if ($del) {
          Storage::delete('public/'.$user->Images);
          return redirect()->back()->withSuccess("Item Was Successful Deleted");
        }
      }
      else{
        return redirect()->route('index');
      }
    }
    public function editview(Request $request, $id){
      if ($request->session()->exists('admin')) {
          $data['admin'] = $request->session()->get('admin');
          $data['id'] = $id;
          return view('backend/edit',$data);
      }else {
          return redirect()->route('index');
      }
    }

    public function edit(Request $request, $id){
      if($request->session()->exists('admin')){
        $edit = $request->all();
        $path = Storage::putFile(
            'images',
            $request->file('upload'), 'public'
        );
        $user = DB::table('consoles')->where('ConsoleID', $id)->first();
        $affected = DB::table('consoles')
              ->where('ConsoleID', $id)
              ->update(['Name' => $edit['nama'], 'Descrip' => $edit['deskripsi'], 'Price'=> $edit['harga'],'Images' => $path]);

        if ($affected) {
          Storage::move($path, 'public/'.$path);
          Storage::delete('public/'.$user->Images);
          return redirect()->route('product')->withSuccess("Item Was Successful Edited");
        }
      }
      else{
        return redirect()->route('index');
      }
    }

    public function logout(Request $request){
      $request->session()->forget('admin');
      return redirect()->route('index');
    }
}
