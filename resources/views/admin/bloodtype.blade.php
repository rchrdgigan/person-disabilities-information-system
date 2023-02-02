@extends('layouts.admin')
@section('title')
Blood Type
@endsection
@section('breadcrumbs')
Blood Type List
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
          <h3 class="card-title">Blood Type List</h3>
        </div>
        <div class="row p-3">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-pink">
                    <div class="inner">
                        <h3>A+</h3>

                        <p>{{number_format($aplus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>A-</h3>

                        <p>{{number_format($aminus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>AB+</h3>

                        <p>{{number_format($abplus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>AB-</h3>

                        <p>{{number_format($abminus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>B+</h3>
                        <p>{{number_format($bplus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>B-</h3>

                        <p>{{number_format($bminus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>O+</h3>

                        <p>{{number_format($oplus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>O-</h3>

                        <p>{{number_format($ominus)}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>PWD Name</th>
                        <th>Blood Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $data)
                    <tr>
                        <td>{{Carbon\Carbon::now()->format('y')}}-{{str_pad($data->id, 5, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$data->fullname}} {{($data->sufix == 'N/A') ? '': $data->sufix}}</td>
                        <td>{{$data->blood_type}}</td>
                        <td>
                            <a href="{{route('bloodtype.edit',$data->id)}}" class="btn btn-secondary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
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