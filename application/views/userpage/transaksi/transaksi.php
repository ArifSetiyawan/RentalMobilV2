<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
        <h1 class="mb-3 bread">Transaksi Rental Car</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Transaksi Murifiya Rental Car</span>
        <h2 class="mb-3">Perhatikan setiap isian informasi yang harus diisikan</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">Transaksi Pengajuan Rental</h5>
          <div class="card-body">
            <form action="<?php echo base_url('userpage/actionPengajuan'); ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                  <div class="card">
                    <h5 class="card-header bg-success text-white">Data Customer</h5>
                    <div class="card-body">
                      <input type="hidden" class="form-control" id="idCust" name="idCust" value="<?php echo $data_customer['Id_cust']; ?>">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Customer</label>
                        <input type="text" class="form-control" id="nmCust" name="nmCust" value="<?php echo $data_customer['nama']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly><?php echo $data_customer['alamat']; ?></textarea>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlTextarea1">No Telefon</label>

                          <input type="text" class="form-control" id="noTelfon" name="noTelfon" value="<?php echo $data_customer['no_telfon']; ?>" readonly>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlTextarea1">Keperluan</label>

                          <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?php echo $data_customer['keperluan']; ?>" readonly>
                        </div>
                      </div>
                      <?php if ($data_customer['file_ktp'] == '' && $data_customer['file_SIM'] == '') { ?>
                        <div class="row mt-4">
                          <div class="col">
                            <label>File KTP</label>
                            <p>
                              <span><?php echo $data_customer['file_ktp']; ?></span>
                            </p>
                            <input type="file" class="form-control" id="ktp" name="ktp">
                            <input type="hidden" class="form-control" id="ktpLama" name="ktpLama" value="<?php echo $data_customer['file_ktp']; ?>">
                          </div>
                          <div class="col">
                            <label>File SIM</label>
                            <p>
                              <span><?php echo $data_customer['file_SIM']; ?></span>
                            </p>
                            <input type="file" class="form-control" id="sim" name="sim">
                            <input type="hidden" class="form-control" id="simLama" name="simLama" value="<?php echo $data_customer['file_SIM']; ?>">
                          </div>
                        </div>
                      <?php }  ?>

                      <?php
                      if ($_SESSION['keperluan'] == "Perseorangan") {

                        if ($data_customer['file_KK'] == '' && $data_customer['rek_listrik'] == '' && $data_customer['bukti_keprumah'] == '' && $data_customer['Id_card'] == '') { ?>

                          <div id="pribadi">
                            <div class="row mt-4">
                              <div class="col">
                                <label>File Kartu Keluarga</label>
                                <p>
                                  <span><?php echo $data_customer['file_KK']; ?></span>
                                </p>
                                <input type="file" class="form-control" id="kk" name="kk">
                                <input type="hidden" class="form-control" id="kkLama" name="kkLama" value="<?php echo $data_customer['file_KK']; ?>">

                              </div>
                              <div class="col">
                                <label>File Rekening Listrik/Telfon Rumah</label>
                                <p>
                                  <span><?php echo $data_customer['rek_listrik']; ?></span>
                                </p>
                                <input type="file" class="form-control" id="rek" name="rek">
                                <input type="hidden" class="form-control" id="rekLama" name="rekLama" value="<?php echo $data_customer['rek_listrik']; ?>">
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col">
                                <label>File Tanda Bukti Kepemilikan Rumah</label>
                                <p>
                                  <span><?php echo $data_customer['bukti_keprumah']; ?></span>
                                </p>
                                <input type="file" class="form-control" id="tdk" name="tdk">
                                <input type="hidden" class="form-control" id="tdkLama" name="tdkLama" value="<?php echo $data_customer['bukti_keprumah']; ?>">
                              </div>
                              <div class="col">
                                <label>File ID Card Kantor</label>
                                <p>
                                  <span><?php echo $data_customer['Id_card']; ?></span>
                                </p>
                                <input type="file" class="form-control" id="idcard" name="idcard">
                                <input type="hidden" class="form-control" id="idcardLama" name="idcardLama" value="<?php echo $data_customer['Id_card']; ?>">
                              </div>
                            </div>
                          </div>
                      <?php }
                      } ?>
                      <?php if ($_SESSION['keperluan'] == "Perusahaan") {
                        if ($data_customer['file_perusahaan'] != '' && $data_customer['file_NIB'] != '') { ?>

                          <div id="korporasi">
                            <div class="row mt-4">
                              <div class="col">
                                <label>File Perusahaan</label>
                                <p>
                                  <span><?php echo $data_customer['file_perusahaan']; ?></span>
                                </p>
                                <input type="file" class="form-control" id="fper" name="fper">
                                <input type="hidden" class="form-control" id="fperLama" name="fperLama" value="<?php echo $data_customer['file_perusahaan']; ?>">
                              </div>
                              <div class="col">
                                <label>File NIB</label>
                                <p>
                                  <span><?php echo $data_customer['file_NIB']; ?></span>
                                </p>
                                <input type="file" class="form-control" id="nib" name="nib">
                                <input type="hidden" class="form-control" id="nibLama" name="nibLama" value="<?php echo $data_customer['file_NIB']; ?>">
                              </div>
                            </div>
                          </div>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <div class="card">
                    <h5 class="card-header bg-danger text-white">Data Mobil</h5>
                    <div class="card-body">
                      <input type="hidden" class="form-control" id="idMobil" name="idMobil" value="<?php echo $data_mobil['Id_mobil']; ?>">

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Mobil</label>
                        <input type="text" class="form-control" id="nmMobil" name="nmMobil" value="<?php echo $data_mobil['nama_mobil']; ?>" readonly>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlTextarea1">No Polisi</label>

                          <input type="text" class="form-control" id="noPolisi" name="noPolisi" value="<?php echo $data_mobil['nopol']; ?>" readonly>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlTextarea1">BBM</label>

                          <input type="text" class="form-control" id="bbm" name="bbm" value="<?php echo $data_mobil['BBM']; ?>" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlTextarea1">Kapasitas</label>

                          <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $data_mobil['kapasitas']; ?>" readonly>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlTextarea1">Transmisi</label>

                          <input type="text" class="form-control" id="transmisi" name="transmisi" value="<?php echo $data_mobil['transmisi']; ?>" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlTextarea1">Harga (1 Hari)</label>

                          <input type="text" class="form-control" id="harga" name="harga" value="<?php echo number_format($data_mobil['harga'], 0, ',', '.'); ?>" readonly>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlTextarea1">Denda (1 Hari)</label>
                          <input type="text" class="form-control" id="denda" name="denda" value="<?php echo number_format($data_mobil['denda'], 0, ',', '.'); ?>" readonly>
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
                        <select class="form-control" id="layananRental" name="layananRental">
                          <option value="" disabled selected>-- Pilih Layanan --</option>
                          <?php foreach ($data_layanan as $lay) { ?>
                            <option value="<?= $lay['Id_layanan'] ?>"><?= $lay['namaLayanan'] ?></option>
                          <?php } ?>

                        </select>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlSelect1">Tanggal Mulai</label>
                          <input type="text" class="form-control" id="datepicker2" name="tglMulai" autocomplete="off">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                          <label for="exampleFormControlSelect1">Tanggal Selesai</label>
                          <input type="text" class="form-control" id="datepicker3" name="tglSelesai" autocomplete="off" disabled>
                        </div>
                        <div class="mt-3">
                          <span class="ml-3" style="color: red;">*Minimal 3 Hari, untuk dapat melakukan transaksi perentalan mobil</span>
                        </div>
                      </div>
                      <div class="row">
                        <?php if ($data_trx == '' || $data_trx['biaya_survei'] == 0) { ?>

                          <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                            <label for="exampleFormControlSelect1">Biaya Survey</label>
                            <input type="text" class="form-control" id="biayaSurvey" name="biayaSurvey" value="<?php echo number_format(50000, 0, ',', '.'); ?>" readonly>
                          </div>

                        <?php } ?>
                        <div class="<?php echo $data_trx == '' || $data_trx['biaya_survei'] == 0 ? 'col-lg-6' : 'col-lg-12'; ?> col-md-12 col-sm-12 mt-3">
                          <label for="exampleFormControlSelect1">Biaya Antar Jemput</label>
                          <input type="text" class="form-control" id="biayaAntar" name="biayaAntar" value="<?php echo number_format(50000, 0, ',', '.'); ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group mt-3" id="bSupir" hidden>
                        <label for="exampleFormControlSelect1">Biaya Supir</label>
                        <input type="text" class="form-control" id="biayaSupir" name="biayaSupir" value="<?php echo number_format(500000, 0, ',', '.'); ?>" readonly>
                      </div>
                      <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Total Harga</label>
                        <input type="text" class="form-control" id="totalHarga" name="totalHarga" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <button class="btn btn-primary">
                  Rental
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>