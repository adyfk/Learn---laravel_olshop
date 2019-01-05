@extends('layouts.toko')

@section('content')
<div class="container pt-3">
    <div class="row">
        <div class="col pl-0"><h5>Our Best Product</h5></div>
        <div class="col"></div>
    </div>
    
    <div id="page" class="row">
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.min.js"></script>
<script>
    function reload() {
        $(document).ready(function () {
            $.ajax({
                url:"{{ route('datamenu') }}",
                type:'GET',
                data:{
                    page:1,
                    pagelimit:10
                },
                success : function(data){
                    let dataarr=data.data;
                    $.each(dataarr, function( index, value ) {
                        let html= "<div class='col-3 mx-1 px-0'>\
                                <a href='{{ url('/') }}/"+value.id+"/show' class='text-primary text-decoration-none'>\
                                    <div class='card p-0'>\
                                        <img src='{{ asset('img/product') }}/"+value.img+"' class='card-img-top' alt='...'>\
                                        <div class='card-body p-0 px-2'>\
                                            <small>"+value.title+"</small>\
                                        <div>\
                                        <small class='text-danger h6'>Rp."+value.price+"</small><br>\
                                        <small class='text-muted'>Last updated "+jQuery.timeago(value.updated_at)+"</small></p>\
                                        \
                                    </div>\
                                </a>\
                            </div>"
                        $('#page').append(html);
                    });
                },
                error : function(jqXHR,testStatus,errorThrown){
                    console.log(jqXHR)
                    console.log(testStatus)
                    console.log(errorThrown)
                } 
            })
        })
    }
    reload()
</script>
@endpush
