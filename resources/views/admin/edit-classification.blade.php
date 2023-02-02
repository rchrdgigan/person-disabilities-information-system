@extends('layouts.admin')
@section('title')
Edit Classification
@endsection
@section('breadcrumbs')
Classification / Edit 
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">Edit Classification</h3>
        </div>

        <div class="card-body">
            <form action="{{route('classification.update', $classification->id)}}" method="POST" id="showForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="container p-3">
                        <div class="form-group">
                            <label>Name of PWD :</label>
                            <select class="form-control select2bs4" disabled="true" name="user_id" style="width: 100%;">
                                <option>{{Carbon\Carbon::now()->format('y')}}-{{str_pad($pwd->id, 5, '0', STR_PAD_LEFT)}} | {{$pwd->fullname}} {{($pwd->sufix == "N/A")? "" : $pwd->sufix}}</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Classification Information :</label>
                            <input id="classification" name="classification" value="{{$classification->classification}}" type="classification" class="@error('classification') is-invalid @enderror form-control" placeholder="Enter Classification Information">
                            @error('classification')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('classification')}}" class="btn btn-secondary .btn-md" data-dismiss="modal" aria-hidden="true"> Cancel</a>
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