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
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome"><?php echo $prev_menu ?></a></li>
            <li class="breadcrumb-item active"><?php echo $active_menu ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body">
            <form action="" method="post">
              <div class="row" style="justify-content: center;">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="dari">Dari Tanggal</label>
                    <input type="date" name="dari" id="dari" class="form-control">
                  </div>

                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="sampai">Sampai Tanggal</label>
                    <input type="date" name="sampai" id="sampai" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-4 pt-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> Tampilkan</button>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-4 pt-2">
                    <a href="<?= base_url('report/printReportPendapatan/?dari=') . set_value('dari') . '&sampai=' . set_value('sampai') . '&status=' . set_value('status'); ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print Report</a>
                  </div>
                </div>
              </div>
            </form>
            <div class="table-responsive">

              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Nama Customer</th>
                    <th>Nama Mobil </th>
                    <th>Layanan</th>
                    <th>Tgl Rental</th>
                    <th>Tgl Selesai</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($data_pinjam) { ?>
                    <?php
                    $no = 0;
                    foreach ($data_pinjam as $pinjam) {
                    ?>
                      <tr>
                        <td><?php echo $no = $no + 1 ?></td>
                        <td><?php echo $pinjam['nama'] ?></td>
                        <td><?php echo $pinjam['nama_mobil'] ?></td>
                        <td><?php echo $pinjam['namaLayanan'] ?></td>
                        <td><?php echo $pinjam['tgl_rental'] ?></td>
                        <td><?php echo $pinjam['tgl_kembali'] ?></td>
                        <td><?php echo $pinjam['total_harga'] ?></td>
                      </tr>
                    <?php } ?>

                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>