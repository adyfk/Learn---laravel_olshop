@extends('layouts.toko')

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
                        <a class="nav-link active" href="{{ url('profile/editBiodata') }}">Biodata Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('profile/editAlamat') }}">Daftar Alamat</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row pt-4 justify-content-center">
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center pb-0">
                        <img src="{{ asset('img/th.jpg') }}" class="pb-4" width="100%" alt="">
                        <button type="submit" class="btn btn-sm btn-info col-7" >Pilih Foto</button>  
                        <br>
                        <div class="text-left my-3"><small>
                            Besar file: maksimum 10 Megabytes <br>
                            Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                @if(session('notif'))
                <div class="alert alert-primary alert-sm" role="alert">
                        {{ session('notif') }}
                </div>
                @endif
                <h6 class="font-weight-bold">Ubah Biodata Diri</h6>
                <form action="{{ route('profile.update','test') }}" method='POST'>
                        @csrf
                        @method('PUT')
                        <input name='id' type="hidden" value='{{ Auth::user()->id }}'>
                    <div class="row col-12 pt-3">
                        <div class="col-4 pl-0">Nama</div>
                        <div class="col">
                            <input name='name' class="form-control form-control-sm" type="text" value='{{ Auth::user()->name }}' placeholder="Nama Anda">
                        </div>
                    </div>        
                    <div class="row col-12 pt-3">
                        <div class="col-4 pl-0">Email</div>
                        <div class="col">
                            <input name='email' class="form-control form-control-sm" type="text" value='{{ Auth::user()->email }}' placeholder=Email Anda">
                        </div>
                    </div>        
                    <div class="row col-12 pt-3">
                        <div class="col-4 pl-0">Tanggal lahir</div>
                        <div class="col">
                            <input name='tgl' class="form-control form-control-sm" type="date" value='{{ Auth::user()->tgl }}'>
                        </div>
                    </div>        
                    <div class="row col-12 pt-3">
                        <div class="col-4 pl-0">Jenis Kelamin</div>
                        <div class="col">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input {{ ( Auth::user()->j_k == 'L' ) ? 'checked' :'' }} type="radio" id="customRadioInline1" value='L' name="j_k" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input {{ ( Auth::user()->j_k == 'P' ) ? 'checked' :'' }} type="radio" id="customRadioInline2" value='P' name="j_k" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Pemrempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 py-3 justify-content-center">
                            <button type="submit" class="btn btn-sm btn-primary col-2" >Update</button>
                    </div>         
                </form>
                <h6 class="font-weight-bold">Update Your Password </h6>
                    <form action="{{ route('passupdate') }}" method='POST'>
                    @method('POST')
                    @csrf
                    <div class="row col-12 pt-3">
                        <div class="col-4 pl-0">Password</div>
                        <div class="col form-inline">
                            <input name="password" class="form-control form-control-sm col-8" type="password" placeholder="******">
                            <button type="submit" class="btn btn-sm btn-danger col-3 ml-auto">Update</button>
                        </div>
                    </div>
                    </form>    
                </div>     
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    
</script>
@endpush
