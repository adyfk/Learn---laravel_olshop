<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function data()
    {
        $user = Product::all();
        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                return "<button class='btn btn-sm btn-outline-primary' data-id='$user->id' data-nama='$user->title' data-email='$user->desc' data-jk='$user->img' data-nohp='$user->qyt' data-nohp='$user->price'  data-target='#edit' data-toggle='modal' ><i class='far fa-edit mr-1'></i>Edit</button>
                        <button class='btn btn-sm btn-outline-danger' data-id='$user->id' data-nama='$user->title' data-target='#delete' data-toggle='modal'><i class='far fa-trash-alt mr-1'></i>Hapus</button>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($user->name);
        $user->save();
        return back();
    }
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->back();

    }
}
