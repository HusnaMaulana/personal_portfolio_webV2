@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Skill Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit Skill</a></li>
              <li class="breadcrumb-item active">Edit Skill</li>
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
                <h3 class="card-title">Edit Skill Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{ url('admin/skill/edit/' . $skillRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                          Skill Title
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="skill" class="form-control" placeholder="Skill Title" required value="{{ $skillRecord->skill }}">
           
                        </div>
                    </div>
    
                  <div class="form-group row">
                  <label class="col-sm-2 col-form-lable">
                          Skill Percentage
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="percentage" class="form-control" placeholder="Skill Percentage" required value="{{ $skillRecord->percentage }}">
           
                        </div>
                  </div>


                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ url('admin/skill') }}" class="btn btn-default float-right">Cancel</a>
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
  <script>
  // Validasi sisi klien untuk Skill Title dan Skill Percentage
  document.querySelector('form').addEventListener('submit', function (e) {
    var regexAlphabet = /^[A-Za-z ]+$/;
    var regexNumeric = /^[0-9 ]+$/;

    var skillTitle = document.querySelector('input[name="skill"]').value;
    var skillPercentage = document.querySelector('input[name="percentage"]').value;

    if (!regexAlphabet.test(skillTitle)) {
      alert('Skill Title hanya boleh berisi huruf.');
      e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
    }

    if (!v.test(skillPercentage)) {
      alert('Skill Percentage hanya boleh berisi  angka');
      e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
    }
  });
</script>
@endsection