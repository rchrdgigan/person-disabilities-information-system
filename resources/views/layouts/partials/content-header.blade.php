<div class="content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        <h4 class="m-1">@yield('title')</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">@yield('breadcrumbs')</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>