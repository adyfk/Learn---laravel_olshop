<?php

namespace App\Http\Controllers\admin;
use App\Order;
use App\Addrs;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }
    public function data()
    {
        $order = Order::all();
        return DataTables::of($order)
            ->addColumn('alamat', function ($order) {
                $alamat = Addrs::find($order->addrs_id);
            return
                "<Button class='btn btn-sm btn-outline-primary' data-nama='$alamat->nama' data-alamat='$alamat->alamat' data-pos='$alamat->pos' data-contact='$alamat->contact' data-target='#alamat' data-toggle='modal'>Show</Button>";
        })
            ->addColumn('listproduct', function ($order) {
            return
                "<a class='btn btn-sm btn-outline-primary' target='_blank' href='".route('listproduct',$order->id)."'>List Product</a>";
        })
            ->addColumn('payed', function ($order) {
                $color=$order->payment ? 'success' : 'warning';
                $text=$order->payment ? 'Yes' : 'No';
            return
                "<a class='btn btn-sm btn-outline-$color' href='".route('payed',$order->id)."'>$text</a>";
        })
            ->addColumn('status', function ($order) {
                $color = ($order->status==3) ? 'success' :(
                    ($order->status==2) ? 'info' :
                        ( ($order->status==1) ? 'primary' : 'secondary' ) );
                $text = ($order->status==3) ? 'Sampai' : (
                    ($order->status=='2') ? 'Dikirim' : 
                        ( ($order->status=='1') ? 'Packing' : 'No Action' ) );
                $send = $order->payment ?'href='.route('status',$order->id) : '';
                return
                "<a class='btn btn-sm btn-outline-$color' $send>$text</a>";
        })
        ->rawColumns(['alamat','listproduct','payed','status'])
        ->make(true);
    }
    public function listproduct($req)
    {
        $data = OrderDetail::where('order_id',$req)->with('product')->get();
        return view('admin.order.show',['list'=>$data,'id'=>$req]);
    }
    public function payed($req)
    {
        $data = Order::where('id',$req)->first();
        $data->payment = !$data->payment;
        $data->save(); 
        return back();
    }
    public function status($req)
    {
        $data = Order::where('id',$req)->first();
        $data->status = ($data->status<3) ? ((int)$data->status)+1 : 0 ;
        $data->save(); 
        return back();
    }
}
