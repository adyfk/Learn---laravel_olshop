<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index', ['cat' => Category::query()->get()]);
    }
    public function addcat(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        Category::create($request->all());
        return redirect(url()->previous() . "#cat");
    }
    public function updatecat(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->update($request->all());
        return redirect(url()->previous() . "#cat");
    }
    public function delcat(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect(url()->previous() . "#cat");
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'qyt' => ['required', 'max:10'],
            'price' => ['required', 'max:10'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);
        Product::create($request->all());
        return back();
    }
    public function data()
    {
        $product = Product::with('category')->get();
        return DataTables::of($product)
            ->addColumn('action', function ($product) {
                return "<button class='btn btn-sm btn-outline-primary' data-id='$product->id' data-title='$product->title' data-desc='$product->desc' data-img='$product->img' data-qyt='$product->qyt' data-price='$product->price'  data-target='#edit' data-toggle='modal' ><i class='far fa-edit mr-1'></i>Edit</button>
                        <button class='btn btn-sm btn-outline-danger' data-id='$product->id' data-title='$product->title' data-target='#delete' data-toggle='modal'><i class='far fa-trash-alt mr-1'></i>Hapus</button>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->update($request->all());
        return back();
    }
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return back();
    }
}
