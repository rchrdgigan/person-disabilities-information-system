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
    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">PWD List</h3>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                <tr>
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
                        <td>{{$data->first_name.' '.$data->middle_name.' '.$data->last_name}} {{($data->sufix == 'N/A') ? '':$data->sufix}}</td>
                        <td>{{$data->street}}, {{$data->barangay->brgy}}, {{$data->municipality}}, {{$data->province}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{\Carbon\Carbon::parse($data->birthdate)->diff(\Carbon\Carbon::now())->format('%y years old')}}</td>
                        <td>{{$data->civil_status}}</td>
                        <td>
                            <a href="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="" class="btn btn-success"><i class="fa fa-comments" aria-hidden="true"></i></a>
                            <a href="" class="btn btn-info"><i class="fa fa-id-card" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
});
</script>
@endpush