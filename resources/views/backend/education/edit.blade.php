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

        @include('_message')
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Education Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{ url('admin/education/edit/' . $educationRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                          Pendidikan
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="tingkat_pendidikan" class="form-control" placeholder="Tingkat Pendidikan" required value="{{$educationRecord->tingkat_pendidikan}}">
           
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                          Nama Instansi
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="nama_instansi" class="form-control" placeholder="Nama Instansi" required value="{{$educationRecord->nama_instansi}}">
           
                        </div>
                      </div>
    
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Jurusan
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{$educationRecord->jurusan}}">
            
                    </div>
                  </div>

                  <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                          Tahun Masuk
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="tahun_masuk" class="form-control" placeholder="Tahun M" required value="{{$educationRecord->tahun_masuk}}">
           
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">
                          Tahun Lulus
                          <span style="color: red;"> *</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" required value="{{$educationRecord->tahun_lulus}}">
           
                        </div>
                      </div>





                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Edit</button>
                    <a href="{{url('admin/education')}}" class="btn btn-default float-right">Cancel</a>
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
    // Validasi sisi klien
    document.querySelector('form').addEventListener('submit', function (e) {
        var regexAlphanumericSpace = /^[A-Za-z0-9 ]+$/;
        var regexAlphabet = /^[A-Za-z ]+$/;
        var regexNumeric = /^[0-9]+$/;

        var tingkatPendidikan = document.querySelector('input[name="tingkat_pendidikan"]').value;
        var namaInstansi = document.querySelector('input[name="nama_instansi"]').value;
        var tahunMasuk = document.querySelector('input[name="tahun_masuk"]').value;
        var tahunLulus = document.querySelector('input[name="tahun_lulus"]').value;

        if (!regexAlphabet.test(tingkatPendidikan)) {
            alert('Tingkat Pendidikan hanya boleh berisi huruf dan spasi.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexAlphanumericSpace.test(namaInstansi)) {
            alert('Nama Instansi hanya boleh berisi huruf, angka, dan spasi.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexNumeric.test(tahunMasuk)) {
            alert('Tahun Masuk hanya boleh berisi angka.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }

        if (!regexNumeric.test(tahunLulus)) {
            alert('Tahun Lulus hanya boleh berisi angka.');
            e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
        }
    });
</script>
@endsection