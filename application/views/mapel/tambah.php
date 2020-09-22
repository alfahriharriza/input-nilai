

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-home"></i><a href="#"> Home</a></li>
              <li class="breadcrumb-item active">Tambah Mata Pelajaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
                <div class="card">
                  <div class="card-header"><h4>Form Tambah Mata Pelajaran</h4></div>
                  <dv class="card-body">
                    <form class="form-group" method="post" action="<?= base_url('mapel/tambah'); ?>">
                <div class="form-group col-sm-8">
                  <label for="inputMapel" class="control-label">Mata Pelajaran</label>
                  <input type="text" class="form-control" id="inputMapel" name="mapel" required placeholder="Contoh : Bahasa Indonesia">
                </div>
                <button type="submit" class="btn btn-primary ml-2">
                  <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Mata Pelajaran
                </button>
              </form>
                  </dv>
                </div>
            </div>
        </div>
      </div>

      <br>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->