<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function data()
    {
        $user = User::where('email', '!=', 'x@x.x');
        return DataTables::of($user)
            ->addColumn('password', function ($user) {
                return "<a class='btn btn-sm btn-outline-info' href='" . route('user.show', $user->id) . "'><i class='fas fa-retweet mr-1'></i>Reset</a>";
            })
            ->addColumn('action', function ($user) {
                return "<button class='btn btn-sm btn-outline-primary' data-id='$user->id' data-nama='$user->name' data-email='$user->email' data-jk='$user->j_k' data-nohp='$user->no_hp'  data-target='#edit' data-toggle='modal' ><i class='far fa-edit mr-1'></i>Edit</button>
                        <button class='btn btn-sm btn-outline-danger' data-id='$user->id' data-nama='$user->name' data-target='#delete' data-toggle='modal'><i class='far fa-trash-alt mr-1'></i>Hapus</button>";
            })
            ->rawColumns(['password', 'action'])
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
