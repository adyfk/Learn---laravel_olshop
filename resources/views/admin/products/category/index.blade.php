        <button class='btn btn-sm btn-outline-success my-4' data-target='#addcat' data-toggle='modal'><i class='far fa-edit mr-1'></i>ADD NEW</button>
        <table id='table' class='table table-hover responsive' style="width:50%">
            <thead>
                <tr>
                    <td>id</td>
                    <td>title</td>
                    <td>img</td>
                    <td width='30%'></td>
                </tr>
            </thead>
            @foreach ($cat as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->img }}</td>
                    <td><button class='btn btn-sm btn-outline-primary' data-id='{{ $item->id }}' data-title='{{ $item->title }}' data-target='#editcat' data-toggle='modal'><i class='far fa-edit mr-1'></i>Edit</button>{{ $item->img }}
                    <button class='btn btn-sm btn-outline-danger' data-id='{{ $item->id }}' data-title='{{ $item->title }}'  data-target='#delcat' data-toggle='modal'><i class='far fa-trash-alt mr-1'></i>delete</button>{{ $item->img }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>

        <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel">Add Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('addcat') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name='id' id='id'>
                                <input type="text" name='title' id='titlecat' placeholder="title">
                            </div>           
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('updatecat') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name='id' id='id'>
                                <input type="text" name='title' id='titlecat' placeholder="title">
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
        <div class="modal fade" id="delcat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Delete Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('delcat') }}" method="POST">
                        @method('POST')
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
            <script>
                $('#editcat').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) 
                    var modal = $(this)
                    modal.find('.modal-body #id').val(button.data('id'));
                    modal.find('.modal-body #titlecat').val(button.data('title'));
                })
                $('#delcat').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) 
                    var modal = $(this)
                    modal.find('.modal-body #id').val(button.data('id'));
                    modal.find('.modal-body #namax')[0].innerText = button.data('title');
                })
            </script>