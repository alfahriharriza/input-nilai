

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-home"></i><a href="#"> Home</a></li>
              <li class="breadcrumb-item active">Nilai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- <div class="container"> -->
        <!-- <div class="row"> -->

          <?= $this->session->flashdata('pesan'); ?>

          <div class="card">
            <div class="card-header">
              <h4>Form Input Nilai Siswa</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <form method="post" action="<?= base_url('nilai/input_nilai'); ?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pilih Kelas : </label>
                      <select name="kelas" class="form-control select2" required="" id="kelas">
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas as $kls): ?>
                          <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                        <?php endforeach ?> 
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pilih Siswa : </label> 
                      <select name="siswa" class="form-control select2" id="data_siswa" required="">
                        <option value="">Pilih kelas terlebih dahulu</option>
                      </select> 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                      <label>Pilih Mapel : </label>
                      <select name="mapel" class="form-control select2" required="">
                        <option value="">Pilih Mapel</option>
                        <?php foreach ($mapel as $m): ?>
                          <option value="<?= $m['id_mapel']; ?>"><?= $m['mapel']; ?></option>
                        <?php endforeach ?> 
                      </select>
                    </div>
                      <label>Nilai : </label>
                      <input type="number" name="nilai" class="form-control" placeholder="Masukkan Nilai" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-info"> Submit</button>
                  </div>
                </div>
              </form>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4>Data Nilai Siswa</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="table1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach ($nilai as $n):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no ?></td>
                      <td class="text-center"><?= $n['nama'] ?></td>
                      <td class="text-center"><?= $n['kelas'] ?></td>
                      <td class="text-center"><?= $n['mapel'] ?></td>
                      <td class="text-center"><?= $n['nilai_siswa'] ?></td>
                      <td class="text-center">
                            <a href="<?= base_url(); ?>nilai/hapus/<?= $n['id_siswa']; ?>"
                                class="btn btn-sm btn-danger tombol-hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                            <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_edit<?= $n['id_siswa']; ?>"><i class="fa fa-edit"></i> Edit Nilai</button>
                      </td>
                    </tr>

                     <div class="modal fade" role="dialog" id="modal_edit<?= $n['id_siswa']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="post" action="<?= base_url(); ?>nilai/edit/<?= $n['id_siswa']; ?>">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Nilai : </label>
                                  <input type="number" name="nilai" class="form-control" placeholder="Nilai" required="" value="<?= $n['nilai_siswa']; ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php
                    $no++;
                  endforeach;
                  ?>
                  </tbody>
              </table>
              </div>
            </div>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  


