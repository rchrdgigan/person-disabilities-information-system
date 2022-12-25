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
    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">Disability List</h3>
          <button href="" class="btn btn-success float-right"
            type="button"
            data-toggle="modal" 
            data-target="#addModal">Add</button>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>PWD Name</th>
                    <th>Disability Type</th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="addModalLabel">Disability Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="" method="POST" id="showForm">
            @csrf
            <div class="modal-body">
                <div class="container p-3">
                    <div class="form-group">
                        <label for="complianant">Name of PWD :</label>
                        <div class="input-group mb-3">
                            <input type="text" id="complianant" name="complianant" 
                                class="inp form-control"
                                placeholder="Input name of pwd"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Type of Disability :</label>
                        <select class="select2bs4" multiple="multiple" name="respondent_name" data-placeholder="Select a disability">
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

                    <div class="form-group">
                        <label>Cause of Disability :</label>
                        <select class="select2bs4" multiple="multiple" name="respondent_name" data-placeholder="Select a cause of disability">
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
            <div class="modal-footer">
                <button class="btn btn-danger .btn-md" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary .btn-md"><i class="fas fa-check"></i> Submit</button>
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
    placeholder: 'Select an option'
    });
    $("#list_item").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": false,
    });
});
</script>
@endpush