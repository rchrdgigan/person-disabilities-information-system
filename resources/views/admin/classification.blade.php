@extends('layouts.admin')
@section('title')
Classification Type
@endsection
@section('breadcrumbs')
Classification List
@endsection

@push('links')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="card">

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
            @if($errors->any())
                <div class="col-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Oops something wrong!</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @error('user_id')
                            <div class="col-12">
                                <span class="text-danger">
                                    The pwd disabilities has already been exist.
                                </span>
                            </div>
                            @enderror
                            @error('classification')
                            <div class="col-12">
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif
        </div>
    
        <div class="card-header bg-primary">
          <h3 class="card-title">Classification List</h3>
          <button href="" class="btn btn-success float-right"
            type="button"
            data-toggle="modal" 
            data-target="#addModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>PWD Name</th>
                        <th>Classification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pwd_classification as $data)
                    <tr>
                        <td>{{$data->user->fullname}} {{($data->user->sufix == 'N/A') ? '': $data->user->sufix}}</td>
                        <td>{{$data->classification}}</td>
                        <td>
                            <a href="{{route('classification.edit',$data->id)}}" class="btn btn-secondary"><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>
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

<!-- Add Modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="addModalLabel">Classification Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('classification.store')}}" method="POST" id="showForm">
            @csrf
            <div class="modal-body">
                <div class="container p-3">
                    <div class="form-group">
                        <label>Name of PWD :</label>
                        <select class="form-control select2bs4" name="user_id" style="width: 100%;">
                        @foreach($pwd as $data)
                            <option value="{{$data->id}}">{{$data->fullname}} {{($data->sufix == "N/A")? "" : $data->sufix}}</option>
                        @endforeach 
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Classification Information :</label>
                        <input id="classification" name="classification"  type="classification" class="@error('classification') is-invalid @enderror form-control" placeholder="Enter Classification Information">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary .btn-md" data-dismiss="modal" aria-hidden="true"> Cancel</button>
                <button type="submit" class="btn btn-primary .btn-md"> Submit</button>
            </div>
            </form>
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
                    <form action="{{route('classification.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group" id="delData">
                            <input type="hidden" name="_id">
                            <div class="justiy-content-center">
                                <div class="col-12">
                                <button type="submit" class="btn btn-primary">Yes, delete it!</button>
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
@endpush