@extends('layouts.toko')

@section('content')
<div class="container pt-3">
    <div class="row">
        <div class="col-3 card">
            <div class="card-body p-2">
                <img src="{{ asset('img/th.jpg') }}" width="100%" alt="">
            </div>
        </div>
        <div class="col-9 pr-0">
            <div class="card border-top-0 border-bottom-0 rounded-0 pl-3 col-12">
                <a href="{{ route('profile.show','editBiodata') }}" class="badge badge-warning p-1 mb-2 rounded-0" style='width:7%'><i class="fas fa-cog"></i> Ubah</a>
                <h5 class="card-title font-weight-bold">{{ Auth::user()->name }}</h5>
                <ul class="list-group list-group-flush pl-1">
                    <li class="list-group-item pl-0 py-2 border-top-0 font-weight-light"><small><i class="far fa-envelope mr-2"></i>{{  Auth::user()->email  }}</small></li>
                    <li class="list-group-item pl-0 py-2"><small><i class="fas fa-phone mr-2"></i>{{  $alamat->contact }}</small></li>
                    <li class="list-group-item pl-0 py-2"><small><i class="far fa-calendar-alt mr-2"></i>{{  Auth::user()->tgl  }}</small></li>
                    <li class="list-group-item pl-0 py-2"><small><i class="fas fa-home mr-2"></i>{{  $alamat->alamat }}, kec .{{  $alamat->kec }}, kab .{{  $alamat->kab }}, prov .{{  $alamat->prov }}, pos .{{  $alamat->pos }}</small></li>
                </ul>
            </div>
        </div>
    </div>
    <div class='row my-4'>
        <div class="col shadow-sm p-3 mb-5 bg-white rounded">
            <h6 class="py-2">List Transaksi</h6>
            <table class="table table-sm">
                    <caption>List of users</caption>
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    
</script>
@endpush
