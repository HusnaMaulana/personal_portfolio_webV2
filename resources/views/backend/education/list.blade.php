@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Education</h1>
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

      @include('_message')
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Education Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{url('admin/education/post')}}" enctype="multipart/form-data">
                <div class="card-body">
                {{csrf_field()}}
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Sekolah Dasar
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="sekolah_dasar" class="form-control" placeholder="Enter Your School" value="{{ @$educationRecord[0]->sekolah_dasar}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Periode SD
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="periode_sd" class="form-control" placeholder="Enter Your Periode" value="{{ @$educationRecord[0]->periode_sd}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      SMP
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="smp" class="form-control" placeholder="Enter Your School" value="{{ @$educationRecord[0]->smp}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Periode SMP
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="periode_smp" class="form-control" placeholder="Enter Your Periode" value="{{ @$educationRecord[0]->periode_smp}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      SMA
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="sma" class="form-control" placeholder="Enter Your School" value="{{ @$educationRecord[0]->sma}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Periode SMA
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="periode_sma" class="form-control" placeholder="Enter Your Periode" value="{{ @$educationRecord[0]->periode_sma}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Perguruan Tinggi
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="perguruan_tinggi" class="form-control" placeholder="Enter Your University" value="{{ @$educationRecord[0]->perguruan_tinggi}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Periode Perguruan Tinggi
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="periode_pt" class="form-control" placeholder="Enter Your Periode" value="{{ @$educationRecord[0]->periode_pt}}">
                    </div>
                  </div>

                  <input type="hidden" name="id" value="{{ @$educationRecord[0]->id}}"> 

                </div>
                  <div class="card-footer">
                    <button type="submit" name="add_to_update" id="add_to_update" class="btn btn-info" value="@if(count($educationRecord)>0) Edit @else Add @endif">@if(count($educationRecord)>0) Edit @else Add @endif</button>
                    <a href="" class="btn btn-default float-right">Cancel</a>
                    @foreach ($educationRecord as $value)
                    <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('admin/education/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                    @endforeach
                  </div>

                </div>
              </form>
            </div>
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection