@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

@endsection
@section('content')
<div class="container">
    <table id='table' class='table table-hover responsive no-wrap'>
        <thead>
            <tr> 
                <td>id</td>
                <td>user_id</td>
                <td>price</td>
                <td>payed</td>
                <td>status</td>
                <td>Pesan</td>
                <td>Ditangai</td>
                <td>Alamat</td>
                <td></td>
            </tr>
        </thead>
    </table>
    <div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5>Alamat</h5>
                    <div class="row pl-4">
                        <div class="col">
                            Penerima   
                        </div>
                        <div class="col">
                            <span id='alamatnama'> </span>
                        </div>
                    </div>
                    <div class="row pl-4">
                        <div class="col">
                            Kontak   
                        </div>
                        <div class="col">
                            <span id='alamatkontak'> </span>
                        </div>
                    </div>
                    <div class="row pl-4">
                        <div class="col">
                            Alamat
                        </div>
                        <div class="col">
                            <span id='isialamat'> </span>
                        </div>
                    </div>
                    <div class="row pl-4 mb-3">
                        <div class="col">
                            Kode Pos
                        </div>
                        <div class="col">
                            <span id='alamatpos'> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $('#alamat').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        modal.find('.modal-body #alamatnama')[0].innerText = button.data('nama');
        modal.find('.modal-body #isialamat')[0].innerText = button.data('alamat');
        modal.find('.modal-body #alamatpos')[0].innerText = button.data('pos');
        modal.find('.modal-body #alamatkontak')[0].innerText = button.data('contact');
    })
    function reload() {
        $(document).ready(function () {
            $('#table').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": [5, 4, 3] },
                    { "searchable": false, "targets": [5, 4] }
                ],
                //"bInfo" : false,
                "language": {
                    "info": "Dari _START_ Ke _END_ _TOTAL_ Semua",
                },
                responsive: false,
                proccesing: true,
                serverSide: true,
                ajax: '{!! route('dataorder') !!}',
                columns: [
                    {data:'id'},
                    {data:'user_id'},
                    {data:'price'},
                    {data:'payed'},
                    {data:'status'},
                    {data:'created_at'},
                    {data:'updated_at'},
                    {data:'alamat'},
                    {data:'listproduct'},
                ]
            });
        })
    }
    reload()
</script>
@endpush