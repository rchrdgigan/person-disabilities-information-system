@extends('layouts.admin')
@section('title')
PWD List
@endsection
@section('breadcrumbs')
PWD List
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
                        @error('message')
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
          <h3 class="card-title">PWD List</h3>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Unique ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Civil Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $data)
                    <tr>
                        <td>{{Carbon\Carbon::now()->format('y')}}-{{str_pad($data->id, 5, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$data->fullname}} {{($data->sufix == 'N/A') ? '':$data->sufix}}</td>
                        <td>{{$data->street}}, {{$data->barangay->brgy}}, {{$data->municipality}}, {{$data->province}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{\Carbon\Carbon::parse($data->birthdate)->diff(\Carbon\Carbon::now())->format('%y years old')}}</td>
                        <td>{{\Carbon\Carbon::parse($data->birthdate)->format('M d, Y')}}</td>
                        <td>{{$data->civil_status}}</td>
                        <td>
                            <a href="{{route('pwd.show',$data->id)}}" class="btn btn-primary mt-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="" class="btn btn-success mt-1"
                                type="button"
                                id="{{$data->id}}"
                                uid="{{Carbon\Carbon::now()->format('y')}}-{{str_pad($data->id, 5, '0', STR_PAD_LEFT)}}"
                                name="{{$data->fullname}} {{($data->sufix == 'N/A') ? '':$data->sufix}}"
                                cpnum="{{$data->contact}}"
                                data-toggle="modal" 
                                data-target="#mesModal"><i class="fa fa-comments" aria-hidden="true"></i></a>
                            <a href="{{route('pwd.genid',$data->id)}}" class="btn btn-info mt-1"><i class="fa fa-id-card" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal-->
<div class="modal fade" id="mesModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="addModalLabel">Message Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('message.store')}}" method="POST" id="mesData">
            @csrf
            <div class="modal-body">
                <div class="container p-3">
                    <div class="form-group">
                        <label class="float-right">Unique ID : <span class="text-success" id="uid"></span></label>
                        <label>Name : <span class="text-success" id="name"></span></label><br>
                        <label>Cellphone Number : <span class="text-success" id="cpnum"></span></label>
                    </div>
                    <div class="form-group">
                        <label>Message : </label>
                        <textarea name="message" class="form-control" required id="" cols="10" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="_id">
                <button class="btn btn-secondary .btn-md" data-dismiss="modal" aria-hidden="true"> Cancel</button>
                <button type="submit" class="btn btn-primary .btn-md"> Send</button>
            </div>
            </form>
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
    $("#list_item").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
    });

    $('#mesModal').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        var uid=$(opener).attr('uid');
        var name=$(opener).attr('name');
        var cpnum=$(opener).attr('cpnum');
        $("#uid").text(uid);
        $("#name").text(name);
        $("#cpnum").text(cpnum);
        $('#mesData').find('[name="_id"]').val(id);
    });
});
</script>
@endpush