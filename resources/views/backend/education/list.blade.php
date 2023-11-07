@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Education Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Education</a></li>
              <li class="breadcrumb-item active">Education</li>
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
        <a href="{{ url('admin/education/add')}}" class="btn btn-primary">Add Education</a>
        <div class="row">
          <section class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Pendidikan</th>
                      <th>Nama Instansi</th>
                      <th>Jurusan</th>
                      <th>Tahun Masuk</th>
                      <th>Tahun Lulus</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($educationRecord as $value)
                        
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->tingkat_pendidikan }}</td>
                      <td>{{ $value->nama_instansi }}</td>
                      <td>{{ $value->jurusan }}</td>
                      <td>{{ $value->tahun_masuk }}</td>
                      <td>{{ $value->tahun_lulus }}</td>


                      <td>
                        <a href="{{ url('admin/education/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                        <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('admin/education/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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