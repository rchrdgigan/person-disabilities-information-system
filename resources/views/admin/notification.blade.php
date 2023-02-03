@extends('layouts.admin')
@section('title')
Message
@endsection
@section('breadcrumbs')
Message List
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
          <h3 class="card-title">Message List</h3>
          <button class="btn btn-success float-right"
            type="button"
            data-toggle="modal" 
            data-target="#messageModal">Create Message</button>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>PWD Name</th>
                    <th>Contact No.</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal-->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="addModalLabel">Message Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('disability.store')}}" method="POST" id="showForm">
            @csrf
            <div class="modal-body">
                <div class="container p-3">
                    <div class="form-group">
                        <label>Select PWD's or ID :</label>
                        <select class="select2 select2-hidden-accessible" name="user_id[]"  multiple="" style="width: 100%;">
                        @foreach($pwd as $data)
                            <option value="{{$data->id}}">{{Carbon\Carbon::now()->format('y')}}-{{str_pad($data->id, 5, '0', STR_PAD_LEFT)}} | {{$data->fullname}} {{($data->sufix == "N/A")? "" : $data->sufix}}</option>
                        @endforeach 
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
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
@endpush