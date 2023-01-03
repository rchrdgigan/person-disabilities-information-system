@extends('layouts.admin')
@section('title')
Dashboard
@endsection
<!-- @push('links')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush -->
@section('content')
<div class="container-fluid">
    <div class="row">
       <!-- Small boxes (Stat box) -->
       <div class="col-lg-4 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" style="border-radius:20px;">
                <div class="inner">
                <h3>{{$brgy_count}}</h3>

                <p>Total of Barangay</p>
                </div>
                <div class="icon">
                    <i class="fa fa-university" aria-hidden="true"></i>
                </div>
                <a href="{{route('barangay')}}" class="small-box-footer" style="border-radius:20px;"><i class="fas fa-arrow-circle-right"></i> Show list</a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple" style="border-radius:20px;">
              <div class="inner">
                <h3>{{$admin_count}}</h3>

                <p>Total of Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <a href="" class="small-box-footer" style="border-radius:20px;"><i class="fas fa-arrow-circle-right"></i> Show list</a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="border-radius:20px;">
              <div class="inner">
                <h3>{{$pwd_count}}</h3>

                <p>Total of PWD</p>
              </div>
              <div class="icon">
                <i class="fa fa-blind" aria-hidden="true"></i>
              </div>
              <a href="{{route('barangay')}}" class="small-box-footer" style="border-radius:20px;"><i class="fas fa-arrow-circle-right"></i> Show list</a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-pink" style="border-radius:20px;">
              <div class="inner">
                <h3>0</h3>

                <p>SMS Notification</p>
              </div>
              <div class="icon">
                <i class="fa fa-comment" aria-hidden="true"></i>
              </div>
              <a href="" class="small-box-footer" style="border-radius:20px;"><i class="fas fa-arrow-circle-right"></i> Show list</a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-green" style="border-radius:20px;">
              <div class="inner">
                <h3>0</h3>

                <p>Classification of PWD</p>
              </div>
              <div class="icon">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
              </div>
              <a href="" class="small-box-footer" style="border-radius:20px;"><i class="fas fa-arrow-circle-right"></i> Show list</a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary" style="border-radius:20px;">
              <div class="inner">
                <h3>{{$blood_count}}</h3>

                <p>Blood Type</p>
              </div>
              <div class="icon">
              <i class="fa fa-tint" aria-hidden="true"></i>
              </div>
              <a href="{{route('bloodtype')}}" class="small-box-footer" style="border-radius:20px;"><i class="fas fa-arrow-circle-right"></i> Show list</a>
            </div>
        </div>
       
    </div>

    <!-- <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"></h3>
        </div>

        <div class="card-body">
            <table id="list_item" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>Address</td>
                    <td>Status</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> -->

</div>
@endsection
<!-- @push('scripts')
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
@endpush -->