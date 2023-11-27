<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>transaksi"><?php echo $sub_menu ?></a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary card-outline">
            <div class="card">
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="card">
                        <h5 class="card-header bg-success text-white">Data Rental</h5>
                        <div class="card-body">
                          <input type="hidden" class="form-control" id="idCust" name="idCust" value="<?php echo $data_trx['Id_cust']; ?>">
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Customer</label>
                            <input type="text" class="form-control" id="nmCust" name="nmCust" value="<?php echo $data_trx['nama']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly><?php echo $data_trx['alamat']; ?></textarea>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <label for="exampleFormControlTextarea1">No Telefon</label>

                              <input type="text" class="form-control" id="noTelfon" name="noTelfon" value="<?php echo $data_trx['no_telfon']; ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <label for="exampleFormControlTextarea1">Keperluan</label>

                              <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?php echo $data_trx['keperluan']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Layanan Rental</label>
                            <input type="text" class="form-control" id="layanan" name="layanan" value="<?php echo $data_trx['namaLayanan']; ?>" readonly>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <label for="exampleFormControlSelect1">Tanggal Mulai</label>
                              <input type="text" class="form-control" name="tglMulai" autocomplete="off" value="<?php echo date("d/m/Y", strtotime($data_trx['tgl_rental'])); ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <label for="exampleFormControlSelect1">Tanggal Selesai</label>
                              <input type="text" class="form-control" name="tglSelesai" autocomplete="off" value="<?php echo date("d/m/Y", strtotime($data_trx['tgl_kembali'])); ?>" readonly>
                            </div>
                          </div>
                          <div class="row mt-3" id="divSupir" hidden>
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlSelect1">Supir</label>
                              <select class="form-control" id="supir" name="supir">
                                <option value="" disabled selected>-- Pilih Supir --</option>
                                <?php foreach ($data_supir as $supir) { ?>
                                  <option value="<?= $supir['Id_supir'] ?>"><?= $supir['namasupir'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlSelect1">Tarif Supir</label>
                              <input type="text" class="form-control" id="biayaSupir" name="biayaSupir" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlSelect1">Biaya Survey</label>
                              <input type="text" class="form-control" id="biayaSurvey" name="biayaSurvey" value="<?php echo number_format($data_trx['biaya_survei'], 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlSelect1">Biaya Antar Jemput</label>
                              <input type="text" class="form-control" id="biayaAntar" name="biayaAntar" value="<?php echo number_format($data_trx['biaya_antar'], 0, ',', '.'); ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Total Harga</label>
                            <input type="text" class="form-control" id="totalHarga" name="totalHarga" value="<?php echo number_format($data_trx['total_harga'], 0, ',', '.'); ?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="card">
                        <h5 class="card-header bg-danger text-white">Data Mobil Yang Di Rental</h5>
                        <div class="card-body">
                          <input type="hidden" class="form-control" id="idMobil" name="idMobil" value="<?php echo $data_trx['Id_mobil']; ?>">

                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Mobil</label>
                            <input type="text" class="form-control" id="nmMobil" name="nmMobil" value="<?php echo $data_trx['nama_mobil']; ?>" readonly>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <label for="exampleFormControlTextarea1">No Polisi</label>

                              <input type="text" class="form-control" id="noPolisi" name="noPolisi" value="<?php echo $data_trx['nopol']; ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <label for="exampleFormControlTextarea1">BBM</label>

                              <input type="text" class="form-control" id="bbm" name="bbm" value="<?php echo $data_trx['BBM']; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlTextarea1">Kapasitas</label>

                              <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $data_trx['kapasitas']; ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlTextarea1">Transmisi</label>

                              <input type="text" class="form-control" id="transmisi" name="transmisi" value="<?php echo $data_trx['transmisi']; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlTextarea1">Harga (1 Hari)</label>

                              <input type="text" class="form-control" id="harga" name="harga" value="<?php echo number_format($data_trx['harga'], 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                              <label for="exampleFormControlTextarea1">Denda (1 Hari)</label>
                              <input type="text" class="form-control" id="denda" name="denda" value="<?php echo number_format($data_trx['denda'], 0, ',', '.'); ?>" readonly>
                            </div>
                          </div>
                          <div class="alert alert-danger mb-0 mt-4" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Jika pengembalian mobil terlambat 1 hari akan dikenakan denda sebesar 10% dan akan di tambahkan setiap harinya.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <a href="<?php echo base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>