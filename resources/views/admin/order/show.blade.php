@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

@endsection
@section('content')
<div class="container">
        <form action="/foo/bar" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    <h5>ID Pembelian  =  {{ $id }}</h5>
    <table id='table' class='table table-hover responsive no-wrap'>
        <thead>
            <tr> 
                <td>Id Product</td>
                <td>Nama</td>
                <td>Qyt</td>
                <td>ket</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->product_id }}</td>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->qyt }}</td>
                    <td>{{ $item->ket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script>

</script>
@endpush