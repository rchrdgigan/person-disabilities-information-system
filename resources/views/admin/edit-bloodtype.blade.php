@extends('layouts.admin')
@section('title')
User Bloodtype
@endsection
@section('breadcrumbs')
User Bloodtype / Edit 
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">Edit User Disabilities</h3>
        </div>

        <div class="card-body">
            <form action="{{route('bloodtype.update',$pwd->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="container p-3">
                        <div class="form-group">
                            <label>Name of PWD :</label>
                            <select class="form-control select2bs4" disabled="true" style="width: 100%;">
                                <option>{{Carbon\Carbon::now()->format('y')}}-{{str_pad($pwd->id, 5, '0', STR_PAD_LEFT)}} | {{$pwd->fullname}} {{($pwd->sufix == "N/A")? "" : $pwd->sufix}}</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Blood Type :</label>
                            <div class="select2-primary">
                                <select class="form-control select2bs4" name="bloodtype" data-placeholder="Select Blood Type" style="width: 100%;">
                                    <option {{($pwd->blood_type == "N/A") ? "selected" : ""}} value="N/A">Not Available</option> 
                                    <option {{($pwd->blood_type == "A+") ? "selected" : ""}} value="A+">A+</option>
                                    <option {{($pwd->blood_type == "A-") ? "selected" : ""}} value="A-">A-</option>
                                    <option {{($pwd->blood_type == "AB+") ? "selected" : ""}} value="AB+">AB+</option>
                                    <option {{($pwd->blood_type == "AB-") ? "selected" : ""}} value="AB-">AB-</option>
                                    <option {{($pwd->blood_type == "B+") ? "selected" : ""}} value="B+">B+</option>
                                    <option {{($pwd->blood_type == "B-") ? "selected" : ""}} value="B-">B-</option>
                                    <option {{($pwd->blood_type == "O+") ? "selected" : ""}} value="O+">O+</option>
                                    <option {{($pwd->blood_type == "O-") ? "selected" : ""}} value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('bloodtype')}}" class="btn btn-secondary .btn-md" data-dismiss="modal" aria-hidden="true"> Cancel</a>
                    <button type="submit" class="btn btn-primary .btn-md"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4',
    });
});
</script>
@endpush