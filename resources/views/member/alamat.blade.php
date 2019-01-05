@extends('layouts.toko')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endsection
@section('content')
<div class="container pt-3">
        <div class="row">
            <div class="col">
                <i class="far fa-user mr-2"></i> {{ Auth::user()->name }}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('profile/editBiodata') }}">Biodata Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('profile/editAlamat') }}">Daftar Alamat</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row pl-4">
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-fungsi='add' data-target="#add">Add New </button>
            <div class="col-12 justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Contact</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($alamat as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td><span>{{ $item->alamat }}</span>,
                                    <span><small> Kec </small>{{ $item->kec }}</span>,
                                    <span><small> Kab </small>{{ $item->kab }}</span>,
                                    <span><small> Kab </small>{{ $item->prov }}</span>
                                    <span><small> Kode pos </small>{{ $item->pos }}</span>
                                </td>
                                <td>{{ $item->contact }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-fungsi='edit' data-id='{{ $item->id }}' data-nama='{{ $item->nama }}' data-alamat='{{ $item->alamat }}' data-pos='{{ $item->pos }}' data-contact='{{ $item->contact }}' data-toggle="modal" data-target="#add"><i class="far fa-edit"></i></button>
                                    <a href="{{ route('deladdrs',$item->id) }}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Tambah Alamat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id='form' action="{{ route('addrs') }}">
                @csrf
                @method('POST')
            <div class="modal-body pt-1">
                    @include('member._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script>
        $('#add').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var modal = $(this)
            if(button.data('fungsi')=='add'){
                modal.find('.modal-body #id').val("");
                modal.find('.modal-body #nama').val("");
                modal.find('.modal-body #pos').val("");
                modal.find('.modal-body #alamat').val("");
                modal.find('.modal-body #contact').val("");
            }else{
                modal.find('.modal-body #id').val(button.data('id'));
                modal.find('.modal-body #nama').val(button.data('nama'));
                modal.find('.modal-body #pos').val(button.data('pos'));
                modal.find('.modal-body #alamat').val(button.data('alamat'));
                modal.find('.modal-body #contact').val(button.data('contact'));
            }
        })
        var prov,kab,kec
        reload = () =>{
            $.ajax({
                url: "{{ route('prov') }}",
            }).done(function(data) {
                $("#prov").empty();
                data= JSON.parse(data);
                data.semuaprovinsi.filter( function(el){
                    prov = el.id
                    $('#prov').append('<option value='+el.nama+'>'+el.nama+'</option>') } )
                $('.selectpicker').selectpicker('refresh');
            });
        }
        reload()
        function kab(){
            var alamat= "http://localhost/proj_toko/public/api/alamat/kab/"+prov
            $.ajax({
                url: alamat,
            }).done(function(data) {
                $("#kab").empty();
                data= JSON.parse(data);
                data.daftar_kecamatan.filter( function(el){
                    kab = el.id
                    $('#kab').append('<option value='+el.nama+'>'+el.nama+'</option>') } )
                $('.selectpicker').selectpicker('refresh');
            });
        }
        function kec(){
            var alamat= "http://localhost/proj_toko/public/api/alamat/kec/"+kab;
            $.ajax({
                url: alamat,
            }).done(function(data) {
                $("#kec").empty();
                data= JSON.parse(data);
                data.daftar_kecamatan.filter( function(el){
                    $('#kec').append('<option value='+el.nama+'>'+el.nama+'</option>') } )
                $('.selectpicker').selectpicker('refresh');
            });
        }
        kab()
        kab()
        $("#prov").on('shown.bs.select', function(e) {}).change(function() { kab() });
        $("#kab").on('shown.bs.select', function(e) {}).change(function() { kec() });

</script>
@endpush
