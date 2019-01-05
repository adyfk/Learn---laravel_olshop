<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class DataSiteController extends Controller
{
    public function index(){    
        return response()->Json(Product::with('Category')->paginate(2));
    }
    public function show($id){
        $data = Product::where('id',$id)->first();
        return view('show',['product'=>$data]);
    }
    public function alamatprov(){
        return file_get_contents("http://dev.farizdotid.com/api/daerahindonesia/provinsi"); 
    }
    public function alamatkab($id){
        return file_get_contents("http://dev.farizdotid.com/api/daerahindonesia/provinsi/$id/kabupaten"); 
    }
    public function alamatkec($id){
        return file_get_contents("http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/$id/kecamatan"); 
    }
    public function alamatdesa($id){
        return redirect('http://dev.farizdotid.com/api/daerahindonesia/provinsi'); 
    }
}