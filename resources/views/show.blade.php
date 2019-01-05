@extends('layouts.toko')
@section('style')
    <style>
        .breadcrumb-item + .breadcrumb-item::before 
        {
            content: ">" !important; 
        }
    </style>
@endsection
@section('content')
<div class="container pt-3">
    <div class="row"> 
        <small>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->category->title }}</li>
                </ol>
            </nav>
        </small>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('img/product') }}/{{ $product->img }}" class="col-12" alt="Responsive image">
        </div>
        <div class="col">
            <h4 class="font-weight-bold">{{ $product->title }}</h4>
            <div class="card">
                <div class="card-body p-3 bg-light">
                    <small >Descripsi Product</small><br> 
                    {{ $product->desc }}    
                </div>
            </div>
            <br>
            <span class="text-danger font-weight-bold h4">Rp {{ $product->price }}</span>
            <div class="row mt-2">
                <div class="col-4">
                    <b>Jumlah</b>
                    <div class="input-group mb-3 mt-2 px-3">
                        <div class="input-group-prepend pr-1">
                            <button type="button" class="btn btn-outline-primary rounded-circle py-2" onclick="klik(-1)" id='minus'><i class="fas fa-minus"></i></button>
                        </div>
                        <input type="text" id='qty' value='1' class="form-control p-1 border-top-0 border-left-0 border-right-0 text-center">
                        <div class="input-group-prepend pl-1">
                            <button type="button" class="btn btn-primary rounded-circle py-2" onclick="klik(1)"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>                  
                </div>
                <div class="col">
                    <b>Catatan untuk Penjual (Opsional)</b>
                    <textarea class="form-control" id="ket" rows="2"></textarea>      
                </div>
            </div>
            <div class="row mt-4">
                <button type="button" class="btn p-2 btn-outline-danger col-1 mr-1"><i class="far fa-heart"></i></button>
                <button type="button" class="btn p-2 btn-outline-primary col-5 mr-2">Beli Sekarang</button>
                <button type="button" class="btn btn-primary col-5">Tambah Keranjang</button>
            </div>
        </div>
        @auth 
        <div class="col-2">
            <div class="card">
                <div class="card-body p-3">
                    <small>Profile</small> <br>
                    <a href="">{{ Auth::user()->name }}</a><br>
                </div>
            </div>
        </div>
        @endauth
    </div>

    <div id="page" class="row">
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.min.js"></script>
<script>
    function klik(params){
        $('#qty').val(parseInt($('#qty').val())+parseInt(params) )
    }
</script>
@endpush
