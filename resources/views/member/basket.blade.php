@extends('layouts.toko')

@section('content')
<div class="container pt-3">
    <h6 class="font-weight-bold">Product In Basket</h6>
    <div class="row">
        <div class="col-8">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-center">
                                <img src="{{ asset('img/sample.png') }}" width='60px' height='60px'>
                            </div>
                            <div class="col pl-0">
                                <div class="row">
                                    <h5 class="font-weight-bold col pl-0">Judul Product</h5>
                                </div>
                                <div class="row">
                                    <h5 class="font-weight-bold text-danger col pl-0" id='total'>Rp </h5>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row justify-content-end">
                                    <a href=""><i class="far fa-trash-alt"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col justify-content-end pr-0">
                                        <div class="input-group mb-3 mt-2">
                                            <div class="input-group-prepend pr-1">
                                                <button type="button" class="btn btn-outline-primary rounded-circle btn-sm" onclick="klik(-1)" id='minus'><i class="fas fa-minus"></i></button>
                                            </div>
                                            <input type="text" id='qty' value='1' class="form-control form-control-sm p-1 border-top-0 border-left-0 border-right-0 text-center">
                                            <div class="input-group-prepend pl-1">
                                                <button type="button" class="btn btn-primary rounded-circle btn-sm" onclick="klik(1)"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                  
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="col pl-4">
                                <a class="text-decoration-none" data-toggle="collapse" href="#catatan" role="button">Catatan (Optional)</a>
                                <div class="collapse" id="catatan">
                                    <textarea class="form-control col-4" id="ket" rows="1"></textarea>      
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <div class="font-weight-bold">
                        Alamat yang digunakan
                        <hr>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-5 p-0">Total Harga</div>
                            <div class="col-6 p-0 text-right">asdas</div>
                        </div>  
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <div class="font-weight-bold">
                            Ringkasan Belanja
                            <hr>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-5 p-0">Total Harga</div>
                                <div class="col-6 p-0 text-right">asdas</div>
                            </div>  
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary btn-block">Check Out</button>
                    </div>
                </div>
        </div>
        
    </div>
</div>
@endsection
@push('scripts')
<script>
    function klik(params){
        $('#qty').val(parseInt($('#qty').val())+parseInt(params) )
    }
</script>
@endpush
