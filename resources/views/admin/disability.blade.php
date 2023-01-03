@extends('layouts.admin')
@section('title')
Disability
@endsection
@section('breadcrumbs')
Disability List
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
                        @error('type')
                        <div class="col-12">
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                        @error('cause')
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
    
    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">Disability List</h3>
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
                        <th>Disability Type</th>
                        <td>Disability Cause</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pwd_disability as $data)
                    <tr>
                        <td>{{$data->user->fullname}}</td>
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
                            <a href="{{route('disability.edit',$data->id)}}" class="btn btn-secondary"><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>
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
            <h5 class="modal-title" id="addModalLabel">Disability Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('disability.store')}}" method="POST" id="showForm">
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
                        <label>Type of Disability :</label>
                        <div class="select2-primary">
                            <select class="select2 select2-hidden-accessible" name="type[]" multiple="" data-placeholder="Select type of disability" data-dropdown-css-class="select2-purple" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="Deaf or Hard of Hearing">Deaf or Hard of Hearing</option>
                                <option value="Intelectual Disability">Intelectual Disability</option>
                                <option value="Learning Disability">Learning Disability</option>
                                <option value="Mental Disability">Mental Disability</option>
                                <option value="Orthopedic Disability">Orthopedic Disability</option>
                                <option value="Physical Disability">Physical Disability</option>
                                <option value="Pyschosocial Disability">Pyschosocial Disability</option>
                                <option value="Speech and Language Impairment">Speech and Language Impairment</option>
                                <option value="Visual Disability">Visual Disability</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cause of Disability :</label>
                        <div class="select2-primary">
                            <select class="select2 select2-hidden-accessible" name="cause[]" multiple="" data-placeholder="Select cause of disability" data-dropdown-css-class="select2-purple" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="Acquired">Acquired</option>
                                <option value="Cancer">Cancer</option>
                                <option value="Chronic Illness">Chronic Illness</option>
                                <option value="Congenital/Inborn">Congenital/Inborn</option>
                                <option value="Injury">Injury</option>
                                <option value="Rare Disease">Rare Disease</option>
                                <option value="Autism">Autism</option>
                            </select>
                        </div>
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
                    <form action="{{route('disability.destroy')}}" method="post">
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