<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
        <h1 class="mb-3 bread">Detail Transaksi Rental Car</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-3">Detail Transaksi</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">Transaksi Pengajuan Rental</h5>
          <div class="card-body">
            <form method="post">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="card">
                    <h5 class="card-header bg-success text-white">Data Customer</h5>
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
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="card">
                    <h5 class="card-header bg-danger text-white">Data Mobil</h5>
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
              <div class="row mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="card">
                    <h5 class="card-header bg-success text-white">Form Pengajuan</h5>
                    <div class="card-body">
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
              </div>
              <div class="mt-4">
                <a href="<?php echo base_url(); ?>userpage/transaksi_rental" class="btn btn-primary">Kembali</a>
              </div>
            </form>

            <div class="row mt-4" id="trxPembayaran" hidden>
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                  <h5 class="card-header bg-info text-white">Transaksi Pembayaran</h5>
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlSelect1">Biaya Rental</label>
                          <input type="text" class="form-control" id="biayaRental" name="biayaRental" readonly>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlSelect1">Lama Rental</label>
                          <input type="text" class="form-control" id="lamaRental" name="lamaRental" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlSelect1">Biaya Survey</label>
                          <input type="text" class="form-control" id="biayaSurvey" name="biayaSurvey" readonly>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlSelect1">Biaya Antar Jemput</label>
                          <input type="text" class="form-control" id="biayaAntar" name="biayaAntar" readonly>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Biaya Rental Dengan Supir</label>
                        <input type="text" class="form-control" id="biayaSupir" name="biayaSupir" readonly>
                      </div>
                      <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Total Harga</label>
                        <input type="text" class="form-control" id="totalHarga" name="totalHarga" readonly>
                      </div>
                      <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">DP yang harus dibayarkan</label>
                        <input type="text" class="form-control" id="DP" name="DP" readonly>
                      </div>
                      <button class="btn btn-primary" id="btnSubmit">
                        Bayar Rental
                      </button>

                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                  <h5 class="card-header bg-danger text-white">Metode Pembayaran</h5>

                  <div class="card-body">
                    <span class="subheading">Untuk melakukan pembayaran, lakukan transfer pada rekening berikut: </span>

                    <?php foreach ($data_bank as $bank) { ?>
                      <div class="card mt-2" style="border-radius: 8px;">
                        <div class="card-body">
                          <h5 class="card-title"><?= $bank['nama_bank']  ?></h5>
                          <p class="card-text"><?= $bank['no_rekening'] ?></p>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="mt-3">
                      <a href="#" class="btn btn-primary">Kirim Bukti Pembayaran</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>