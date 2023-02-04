@extends('layouts.admin')
@section('title')
Archived Disability
@endsection
@section('breadcrumbs')
Archived Disability List
@endsection

@push('links')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        @if(session('message'))
            <div class="card bg-gradient-success">
                <div class="card-header">
                    <h3 class="card-title">{{ session('message') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        </div>
       
    </div>
    
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{route('disability')}}" class="btn btn-secondary mr-2 float-left"
                type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            <h3 class="card-title float-right text-center"><i class="fa fa-archive" aria-hidden="true"></i><i class="fa fa-users" aria-hidden="true"></i><br> Archived Disability</h3>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>PWD Name</th>
                        <th>Disability Type</th>
                        <th>Disability Cause</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pwd_disability as $data)
                    <tr>
                        <td>{{Carbon\Carbon::now()->format('y')}}-{{str_pad($data->id, 5, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$data->user->fullname}} {{($data->user->sufix == 'N/A') ? '': $data->user->sufix}}</td>
                        <td>
                            @foreach($data->type as $types)
                                <span class="bg-primary p-1 rounded">{{$types}}</span>
                                @if( !$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($data->cause as $causes)
                                <span class="bg-primary p-1 rounded">{{$causes}}</span>
                                @if(!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="" class="btn btn-info" 
                                id="{{$data->id}}"
                                data-toggle="modal" 
                                data-target="#unarcModal"><i class="fa fa-undo" aria-hidden="true"></i> </a>
                            <a href="" class="btn btn-danger" 
                                id="{{$data->id}}"
                                data-toggle="modal" 
                                data-target="#deleteModal"><i class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Restore -->
<div class="modal fade mt-5" id="unarcModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md mt-5" role="document">
        <div class="modal-content">
            <div class="modal-body text-center mt-3">
            <i class="animation__shake fa fa-6x fa-question-circle text-info" aria-hidden="true"></i>
                <div class="card-body" id="viewInfo">
                    <div class="form-group">
                        <h3><b>Are you sure to restore this data?</b></h3>
                        <h6>It will back again to mastered list!</h6>
                    </div>
                    <form action="{{route('disability.unarchive')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group" id="unarcData">
                            <input type="hidden" name="_id">
                            <div class="justiy-content-center">
                                <div class="col-12">
                                <button type="submit" class="btn btn-primary">Yes, unarchive it!</button>
                                <a class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade mt-5" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md mt-5" role="document">
        <div class="modal-content">
            <div class="modal-body text-center mt-3">
            <i class="animation__shake fa fa-6x fa-exclamation-circle text-warning" aria-hidden="true"></i>
                <div class="card-body" id="viewInfo">
                    <div class="form-group">
                        <h3><b>Are you sure?</b></h3>
                        <h6>You won't be able to revert this!</h6>
                    </div>
                    <form action="{{route('disability.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group" id="delData">
                            <input type="hidden" name="_id">
                            <div class="justiy-content-center">
                                <div class="col-12">
                                <button type="submit" class="btn btn-primary">Yes, Delete it!</button>
                                <a class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('js/myscript.js')}}"></script>
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        dropdownParent: $('#addModal')
    });

    $("#list_item").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": false,
    });
});
</script>
<script>
$('#deleteModal').on('show.bs.modal', function (e) {
    var opener=e.relatedTarget;
    var id=$(opener).attr('id');
    $('#delData').find('[name="_id"]').val(id);
});
</script>
<script>
$('#unarcModal').on('show.bs.modal', function (e) {
    var opener=e.relatedTarget;
    var id=$(opener).attr('id');
    $('#unarcData').find('[name="_id"]').val(id);
});
</script>
@endpush