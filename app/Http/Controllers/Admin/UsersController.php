<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function data()
    {
        $user = User::where('email', '!=', 'x@x.x');
        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                return "<button class='btn btn-sm btn-outline-danger' data-id='$user->id' data-nama='$user->name' data-target='#delete' data-toggle='modal'><i class='far fa-trash-alt mr-1'></i>Hapus</button>";
            })
            ->rawColumns(['password', 'action'])
            ->make(true);
    }
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        return back();
    }
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back();

    }
}
