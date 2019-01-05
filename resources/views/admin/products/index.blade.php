@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
<div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#product" role="tab" aria-controls="home" aria-selected="true">Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#cat" role="tab" aria-controls="profile" aria-selected="false">Category</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="home-tab">
                    <button class='btn btn-sm btn-outline-success  my-4' data-target='#add' data-toggle='modal'><i class='far fa-edit mr-1'></i>ADD NEW</button>
                    <table id='table' class='table table-sm table-hover responsive'>
                            <thead>
                                <tr>
                                    <td width='20%'>title</td>
                                    <td width='30%'>desc</td>
                                    <td width='15%'>img</td>
                                    <td>Category</td>   
                                    <td>qyt</td>
                                    <td>price</td>
                                    <td width='15%'></td>
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
                                <form action="{{ route('product.update','perbarui') }}" enctype="multipart/form-data" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        @include('admin.products._form')
                                    </div>           
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editLabel">Add Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="modal-body">
                                        @include('admin.products._form')
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
                                <form action="{{ route('product.destroy','test') }}" enctype="multipart/form-data" method="POST">
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
                <div class="tab-pane fade" id="cat" role="tabpanel">
                    @include('admin.products.category.index')
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
                modal.find('.modal-body #id').val(button.data('id'));
                modal.find('.modal-body #namax')[0].innerText=button.data('title') ;  
            })
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var modal = $(this)
                modal.find('.modal-body #id').val(button.data('id'));
                modal.find('.modal-body #title').val(button.data('title') );
                modal.find('.modal-body #desc').val(button.data('desc') );
                modal.find('.modal-body #qyt').val(button.data('qyt') );
                modal.find('.modal-body #price').val(button.data('price') );
            })
            function reload(){
                $(document).ready(function(){
                 $('#table').DataTable({
                    "columnDefs": [
                        { "orderable": false, "targets": [6,5,2] },
                        { "searchable": false, "targets": [5,4]}
                    ],
                    //"bInfo" : false,
                    "language": {
                        "info": "Dari _START_ Ke _END_ _TOTAL_ Semua",
                    },
                    responsive: false,
                    proccesing:true,
                    serverSide:true,
                    ajax:'{!! route('dataproducts') !!}',
                    columns : [
                        {data: 'title'},
                        {data: 'desc'},
                        {data: 'img'},
                        {data: 'category.title'},
                        {data: 'qyt'},
                        {data: 'price'},
                        {data: 'action'},
                    ]
                 });
             })
            }
            reload()
            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });

            // store the currently selected tab in the hash value
            $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
                var id = $(e.target).attr("href").substr(1);
                window.location.hash = id;
            });

            // on load of the page: switch to the currently selected tab
            var hash = window.location.hash;
            $('#myTab a[href="' + hash + '"]').tab('show');

         </script>
@endpush