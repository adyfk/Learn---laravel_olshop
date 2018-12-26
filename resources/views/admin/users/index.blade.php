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
                        <td>Nama</td>
                        <td>J_K</td>
                        <td>Email</td>
                        <td>No Hp</td>
                        <td>Password</td>
                        <td></td>
                    </tr>
                </thead>
        </table>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.update','perbarui') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            @include('admin.users._form')
                        </div>           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Delete Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.destroy','test') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                                <p class="text-center">
                                        Are you sure you want to delete this ? <span id='namax' class="font-weight-bold">Nama</span>
                                </p>
                                <input type="hidden" name="id" id="id" value="">
                        </div>           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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
            $('#delete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var id = button.data('id') 
                var nama = button.data('nama') 
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                $('.modal-body #namax')[0].innerText=nama;  
            })
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var id = button.data('id') 
                var nama = button.data('nama') 
                var email = button.data('email') 
                var j_k = button.data('jk') 
                var no_hp = button.data('nohp') 
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #email').val(email);
                modal.find('.modal-body #j_k').val(j_k);
                modal.find('.modal-body #no_hp').val(no_hp);
            })
            function reload(){
                $(document).ready(function(){
                 $('#table').DataTable({
                    "columnDefs": [
                        { "orderable": false, "targets": [5,4,3,2] },
                        { "searchable": false, "targets": [5,4]}
                    ],
                    //"bInfo" : false,
                    "language": {
                        "info": "Dari _START_ Ke _END_ _TOTAL_ Semua",
                    },
                    responsive: false,
                    proccesing:true,
                    serverSide:true,
                    ajax:'{!! route('datauser') !!}',
                    columns : [
                        {data: 'name'},
                        {data: 'j_k'},
                        {data: 'email'},
                        {data: 'no_hp'},
                        {data: 'password'},
                        {data: 'action'},
                    ]
                 });
             })
            }
            reload()
         </script>
@endpush