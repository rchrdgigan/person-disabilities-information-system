@extends('layouts.admin')
@section('title')
User Disabilities
@endsection
@section('breadcrumbs')
User Disabilities / Edit 
@endsection
@section('content')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">Edit User Disabilities</h3>
        </div>

        <div class="card-body">
            <form action="{{route('disability.update', $disablities->id)}}" method="POST" id="showForm">
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
                            <label>Type of Disability :</label>
                            <div class="select2-primary">
                                <select class="select2 select2-hidden-accessible" name="type[]" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php 
                                        $arr_type = ["Deaf or Hard of Hearing","Intelectual Disability","Learning Disability","Mental Disability","Orthopedic Disability","Physical Disability","Pyschosocial Disability","Speech and Language Impairment","Visual Disability"]
                                    ?>
                                    <?php $i = -1;?>
                                    @foreach($arr_type as $data)
                                    <?php $i++; ?>
                                        <option {{(isset($disablities->type[$i]) == $data)? 'selected' : '';}} value="{{$data}}">{{$data}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Cause of Disability :</label>
                            <div class="select2-primary">
                                <select class="select2 select2-hidden-accessible" name="cause[]" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php 
                                        $arr_cause = ["Acquired","Cancer","Chronic Illness","Congenital/Inborn","Injury","Rare Disease","Autism"]
                                    ?>
                                    <?php $i = -1;?>
                                    @foreach($arr_cause as $cause)
                                    <?php $i++; ?>
                                        <option {{(isset($disablities->cause[$i]) == $cause)? 'selected' : '';}} value="{{$cause}}">{{$cause}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('disability')}}" class="btn btn-secondary .btn-md" data-dismiss="modal" aria-hidden="true"> Cancel</a>
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