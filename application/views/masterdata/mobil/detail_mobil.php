<style type="text/css">
  .table td,
  .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 0px;
  }

  .table thead th {
    vertical-align: bottom;
    border-bottom: 0px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $active_menu ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/datamobil"><?php echo $prev_menu ?></a></li>
            <li class="breadcrumb-item active"><?php echo $active_menu ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-outline card-primary">
          <div class="card-header" style="border-bottom: 0px;">
            <h3 class="text-primary" style="font-weight: bold;"><?php echo $data_mobil['produsen'] ?> <?php echo $data_mobil['nama_mobil'] ?></h3>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="card-body">
                <img src="<?= base_url('upload/mobil/') . $data_mobil['img_mobil']; ?>" alt="<?= $data_mobil['nama_mobil']  ?>" class="img-thumbnail">
                <div class="card card-outline card-primary mt-4">
                  <div class="card-header">
                    <h4>Detail Lainnya</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md" id="sortable-table">
                        <thead>
                          <tr>
                            <td><b>Kapasitas</b></td>
                            <td><?php echo $data_mobil['kapasitas'] ?> Orang</td>
                          </tr>
                          <tr>
                            <td><b>Warna</b></td>
                            <td><?php echo $data_mobil['warna'] ?></td>
                          </tr>
                          <tr>
                            <td><b>Transmisi</b></td>
                            <td><?php echo $data_mobil['transmisi'] ?></td>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <h4 class="ml-4">Spesifikasi <?php echo $data_mobil['produsen'] ?> <?php echo $data_mobil['nama_mobil'] ?></h4>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-md" id="sortable-table">
                    <thead>
                      <tr>
                        <td><b>Produsen Mobil</b></td>
                        <td><?php echo $data_mobil['produsen'] ?></td>
                      </tr>
                      <tr>
                        <td><b>Merk Mobil</b></td>
                        <td><?php echo $data_mobil['produsen'] ?> <?php echo $data_mobil['nama_mobil'] ?></td>
                      </tr>
                      <tr>
                        <td><b>No.Plat</b></td>
                        <td><?php echo $data_mobil['nopol'] ?></td>
                      </tr>
                      <tr>
                        <td><b>BBM</b></td>
                        <td><?php echo $data_mobil['BBM'] ?></td>
                      </tr>
                      <tr>
                        <td><b>Harga Sewa</b></td>
                        <td>Rp.<?= number_format($data_mobil['harga'], 0, ',', '.'); ?></td>
                      </tr>
                      <tr>
                        <td><b>Denda</b></td>
                        <td>Rp.<?= number_format($data_mobil['denda'], 0, ',', '.'); ?></td>
                      </tr>
                      <tr>
                        <td><b>Tahun</b></td>
                        <td><?php echo $data_mobil['tahun_buat'] ?></td>
                      </tr>
                      <tr>
                        <td><b>Status</b></td>
                        <td>
                          <?php if ($data_mobil['status'] == 1) { ?>
                            <div class="badge badge-success">Tersedia</div>
                          <?php } else { ?>
                            <div class="badge badge-danger">Tidak Tersedia</div>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="<?php echo base_url() ?>masterdata/edit_mobil/<?php echo sha1($data_mobil['Id_mobil']) ?>" class="btn btn-outline-info">Edit Data <?= $data_mobil['nama_mobil'] ?></a></td>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>
  <!-- /.content -->
</div>