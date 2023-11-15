@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Organisasi Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit Organisasi</a></li>
              <li class="breadcrumb-item active">Edit Organisasi</li>
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
                <h3 class="card-title">Edit Organisasi Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{ url('admin/experience/edit/' . $experienceRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                          Organisasi
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="organisasi" class="form-control" placeholder="Enter your Organization" required value="{{ $experienceRecord->organisasi }}">
           
                        </div>
                    </div>
    
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                            Periode
                            <span style="color: red;"> *</span>
                            </label>
                            <div class="col-sm-10">
                            <input type="text" name="periode" class="form-control" placeholder="Enter your Periode" required value="{{ $experienceRecord->periode }}">
            
                            </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                            Bidang
                            <span style="color: red;"> *</span>
                            </label>
                            <div class="col-sm-10">
                            <input type="text" name="bidang" class="form-control" placeholder="Enter your Division" required value="{{ $experienceRecord->bidang }}">
                            </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                            Jabatan
                            <span style="color: red;"> *</span>
                            </label>
                            <div class="col-sm-10">
                            <input type="text" name="jabatan" class="form-control" placeholder="Enter your Position" required value="{{ $experienceRecord->jabatan }}">
                            </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                            Keterangan
                            <span style="color: red;"> *</span>
                            </label>
                            <div class="col-sm-10">
                            <input type="text" name="keterangan" class="form-control" placeholder="Enter your Description" required value="{{ $experienceRecord->keterangan }}">
                            </div>
                    </div>
                    

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ url('admin/experience') }}" class="btn btn-default float-right">Cancel</a>
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
    // Validasi sisi klien untuk Organisasi, Periode, Bidang, Jabatan, dan Keterangan
    document.querySelector('form').addEventListener('submit', function (e) {
        var regexAlphanumericSpace = /^[A-Za-z0-9 ]+$/;
        var regexAlphabet = /^[A-Za-z ]+$/;
        var regexNumeric = /^[0-9 -]+$/;

        var organisasi = document.querySelector('input[name="organisasi"]').value;
        var periode = document.querySelector('input[name="periode"]').value;
        var bidang = document.querySelector('input[name="bidang"]').value;
        var jabatan = document.querySelector('input[name="jabatan"]').value;
        var keterangan = document.querySelector('input[name="keterangan"]').value;

        if (!regexAlphanumericSpace.test(organisasi)) {
            alert('Organisasi hanya boleh berisi huruf, angka, dan spasi.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexNumeric.test(periode)) {
            alert('Periode hanya boleh berisi angka');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexAlphabet.test(bidang)) {
            alert('Bidang hanya boleh berisi huruf dan spasi.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexAlphanumericSpace.test(jabatan)) {
            alert('Jabatan hanya boleh berisi huruf, angka, dan spasi.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexAlphanumericSpace.test(keterangan)) {
            alert('Keterangan hanya boleh berisi huruf, angka, dan spasi.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }
    });
</script>
@endsection