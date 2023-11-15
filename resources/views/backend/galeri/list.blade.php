@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Galeri Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Galeri</a></li>
              <li class="breadcrumb-item active">Galeri</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @include('_message')
        <a href="{{ url('admin/galeri/add')}}" class="btn btn-primary">Add Galeri</a>
        <div class="row">
          <section class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Deskripsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($galeriRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        @if(!empty($value->image))
                          {{-- @if(file_exist(public_path('public/galeri/'.$value->image))) --}}
                          <img src="{{ url('public/galeri/'.$value->image) }}" style="height: 80px; width: 80px;">
                          {{-- @endif --}}
                        @endif
                      </td>
                      <td>{{ $value->deskripsi }}</td>
                      <td>
                        <a href="{{ url('admin/galeri/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('admin/galeri/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </section>

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection