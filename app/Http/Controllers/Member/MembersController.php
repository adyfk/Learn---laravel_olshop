<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Basket;
use App\User;
use App\Addrs;
use Hash;
class MembersController extends Controller
{
    public function basket(){
        return view('member.basket');
    }
    public function basketadd(Request $req){
        $data = Basket::where('product_id',$req->id)->where('user_id',Auth::User()->id)->get();
        if($data->count()==0){
            Basket::create([
                'user_id'    => Auth::User()->id,
                'product_id' => $req->id,
                'qty' => 0,
            ]);
        }else{
            $data->qty = $data->qty++;
            $data->save(); 
        }
    }
    public function index(){
        $alamat=Addrs::where('user_id',Auth::user()->id)->first();
        return view('member.index',[ 'alamat' => $alamat ]);
    }
    public function update(Request $data){
        $user = User::findOrFail(Auth::user()->id);
        $user->update($data->all());
        return back()->with('notif', 'Profile updated!');
    }
    public function updatepass(Request $data){
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($data->password);
        $user->save();
        return back()->with('notif', 'Password updated!');
    }
    public function show($params){
        if($params=="editBiodata"){
            return view('member.biodata');
        }
        if($params=="editAlamat"){
            $alamat=Addrs::where('user_id',Auth::user()->id)->get();
            return view('member.alamat',['alamat'=>$alamat]);
        }
    }
    public function addrs(Request $req){
        $data = Addrs::where('id',$req->id)->get();
        if($data->count()==0){
            Addrs::create($req->all());
        }else{
            $data = Addrs::where('id',$req->id)->first();
            $data->update($req->all());
            $data->save();
        }
        return back();
    }
    public function deladdrs($req){
        $data = Addrs::where('user_id',Auth::user()->id)->get();
        if($data->count()>1){
            $data = Addrs::findOrFail($req);
            $data->delete();
        }
        return back();
    }
}