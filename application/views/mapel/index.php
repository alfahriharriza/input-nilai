

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
              <li class="breadcrumb-item active">Mata Pelajaran</li>
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
              <h3 class="card-title"><a href="<?= base_url('mapel/tambah'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Mata Pelajaran</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Mata Pelajaran</th>
            <th class="text-center">Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($mapel as $m):
            ?>
            <tr>
              <td class="text-center"><?= $no ?></td>
              <td class="text-center"><?= $m['mapel'] ?></td>
              <td class="text-center">
                    <a href="<?= base_url(); ?>mapel/hapus/<?= $m['id_mapel']; ?>"
                        class="btn btn-sm btn-danger tombol-hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                    <a href="<?= base_url(); ?>mapel/ubah/<?= $m['id_mapel']; ?>"
                        class="btn btn-sm btn-success"><i class="fas fa-pen"></i> Edit</a>
              </td>
            </tr>
            <?php
            $no++;
          endforeach;
          ?>
          </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        <!-- </div> -->
      <!-- </div> -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  


