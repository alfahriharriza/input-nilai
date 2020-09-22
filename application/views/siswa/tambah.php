

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-home"></i><a href="#"> Home</a></li>
              <li class="breadcrumb-item active">Tambah Siswa</li>
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
                  <div class="card-header"><h4>Form Tambah Data Siswa</h4></div>
                  <dv class="card-body">
                    <form class="form-group" method="post" action="<?= base_url('siswa/tambah'); ?>">
                <div class="form-group col-sm-8">
                  <label for="inputNim" class="control-label">NIS</label>
                  <input type="text" class="form-control" id="inputNim" name="nis" required placeholder="Contoh : 1234">
                </div>
                <div class="form-group col-sm-8">
                  <label for="inputNama" class="control-label">Nama</label>
                  <input type="text" class="form-control" id="inputNama" name="nama" required placeholder="Contoh : Alfari Harriza">
                </div>
                <div class="form-group">
                  <label for="inputJenisKelamin" class="control-label">Jenis Kelamin</label>
                  <div>
                    <label class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked> Laki-laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" > Perempuan
                    </label>
                    </div>
                </div>
                <div class="form-group col-sm-8">
                  <label for="inputKelas" class="control-label">Kelas</label>
                  <select class="form-control" name="kelas">
                    <?php
                    foreach ($kelas as $k) :
                      ?>
                      <option value="<?= $k['id_kelas']; ?>">
                        <?= $k['kelas']; ?>
                      </option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary ml-2">
                  <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Siswa
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