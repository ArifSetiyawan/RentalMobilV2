<style>
  .invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
  }

  .invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
  }

  .invoice-box table td {
    padding: 5px;
    vertical-align: top;
  }

  .invoice-box table tr td:nth-child(2) {
    text-align: right;
  }

  .invoice-box table tr.top table td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
  }

  .invoice-box table tr.information table td {
    padding-bottom: 40px;
  }

  .invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
  }

  .invoice-box table tr.details td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
  }

  .invoice-box table tr.item.last td {
    border-bottom: none;
  }

  .invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
    }

    .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
    }
  }

  /** RTL **/
  .invoice-box.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  }

  .invoice-box.rtl table {
    text-align: right;
  }

  .invoice-box.rtl table tr td:nth-child(2) {
    text-align: left;
  }
</style>
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
          <h5 class="card-header bg-info text-white">Transaksi Pembayaran</h5>
          <?php if ($data_trx['id_status'] == 6) { ?>
            <form action="<?php echo base_url('userpage/actionPembayaranDP'); ?>" method="post" enctype="multipart/form-data">
            <?php } ?>
            <?php if ($data_trx['id_status'] == 10) { ?>
              <form action="<?php echo base_url('userpage/actionPelunasan'); ?>" method="post" enctype="multipart/form-data">
              <?php } ?>
              <?php if ($data_trx['id_status'] == 14 || $data_trx['id_status'] == 12) { ?>
                <form action="<?php echo base_url('userpage/actionPembayaranDenda'); ?>" method="post" enctype="multipart/form-data">
                <?php } ?>
                <div class="card-body">
                  <div class="row mt-4" id="trxPembayaran">
                    <?php if ($data_trx['id_status'] == 6 || $data_trx['id_status'] == 10) { ?>
                      <div class="col-lg-8 col-md-12 col-sm-12">
                        <input type="hidden" class="form-control" id="idRental" name="idRental" value="<?= $data_trx['id_rental'] ?>">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="exampleFormControlSelect1">Biaya Survey</label>
                            <input type="text" class="form-control" id="biayaSurvey" name="biayaSurvey" value="<?php echo number_format($data_trx['biaya_survei'], 0, ',', '.'); ?>" readonly>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="exampleFormControlSelect1">Biaya Antar Jemput</label>
                            <input type="text" class="form-control" id="biayaAntar" name="biayaAntar" value="<?php echo number_format($data_trx['biaya_antar'], 0, ',', '.'); ?>" readonly>
                          </div>
                        </div>
                        <?php if ($data_trx['supir'] != 0) { ?>
                          <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Biaya Rental Dengan Supir</label>
                            <input type="text" class="form-control" id="biayaSupir" name="biayaSupir" value="<?php echo number_format(500000, 0, ',', '.'); ?>" readonly>
                          </div>
                        <?php }  ?>
                        <div class="form-group mt-3">
                          <label for="exampleFormControlSelect1">Total Harga</label>
                          <input type="text" class="form-control" id="totalHarga" name="totalHarga" value="<?php echo number_format($data_trx['total_harga'], 0, ',', '.'); ?>" readonly>
                        </div>

                        <div class="form-group mt-3">
                          <?php if ($data_trx['id_status'] == 6) { ?>
                            <label for="exampleFormControlSelect1">DP Rental</label>
                            <input type="text" class="form-control" id="DP" name="DP" value="<?php echo number_format((10 / 100) * $data_trx['total_harga'], 0, ',', '.'); ?>" readonly>
                          <?php } ?>
                          <?php if ($data_trx['id_status'] == 10) { ?>
                            <label for="exampleFormControlSelect1">DP Rental yang sudah dibayarkan</label>
                            <input type="text" class="form-control" id="DP" name="DP" value="<?php echo number_format($data_trx['DP'], 0, ',', '.'); ?>" readonly>

                          <?php } ?>
                        </div>
                        <?php if ($data_trx['id_status'] == 10) { ?>
                          <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Sisa Biaya yang harus dibayarkan</label>
                            <input type="text" class="form-control" id="pelunasan" name="pelunasan" value="<?php echo number_format(($data_trx['total_harga'] - $data_trx['DP']), 0, ',', '.'); ?>" readonly>
                          </div>
                        <?php } ?>
                        <?php if ($data_trx['id_status'] == 6) { ?>
                          <div class="form-group align-items-center">
                            <label>Upload Bukti Pembayaran DP</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="buktiDP" name="buktiDP">
                                <label class="custom-file-label"><?php echo $data_trx['bukti_DP']; ?></label>
                              </div>
                              <?php if ($data_trx['bukti_DP'] != "") { ?>

                                <div class="input-group-append">
                                  <a href="<?php echo base_url('transaksi/download/' . $data_trx['bukti_DP'] . '/' . $data_trx['id_status']); ?>" class="btn btn-outline-primary">Download</a>

                                </div>
                              <?php } ?>

                            </div>
                            <input type="hidden" class="form-control" id="buktiDPLama" name="buktiDPLama" value="<?php echo $data_trx['bukti_DP']; ?>">

                          </div>
                        <?php } ?>
                        <?php if ($data_trx['id_status'] == 10) { ?>
                          <div class="form-group align-items-center">
                            <label>Upload Bukti Pelunasan Pembayaran</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="buktiPelunasan" name="buktiPelunasan">
                                <label class="custom-file-label"><?php echo $data_trx['bukti_pelunasan']; ?></label>
                              </div>
                              <?php if ($data_trx['bukti_pelunasan'] != "") { ?>

                                <div class="input-group-append">
                                  <a href="<?php echo base_url('transaksi/download/' . $data_trx['bukti_pelunasan'] . '/' . $data_trx['id_status']); ?>" class="btn btn-outline-primary">Download</a>
                                </div>
                              <?php } ?>

                            </div>
                            <input type="hidden" class="form-control" id="buktiPelLama" name="buktiPelLama" value="<?php echo $data_trx['bukti_pelunasan']; ?>">
                          </div>
                        <?php } ?>
                        <?php if ($data_trx['notes'] != '') { ?>
                          <div class="form-group align-items-center">
                            <label>Notes</label>
                            <div>
                              <textarea name="notes" class="form-control" id="notesDP" cols="30" rows="2" disabled><?php echo $data_trx['notes']; ?></textarea>
                            </div>
                          </div>
                        <?php } ?>

                      </div>
                    <?php } ?>
                    <?php if ($data_trx['id_status'] == 14 || $data_trx['id_status'] == 12) { ?>
                      <div class="col-lg-8 col-md-12 col-sm-12">
                        <input type="hidden" class="form-control" id="idRental" name="idRental" value="<?= $data_trx['id_rental'] ?>">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="exampleFormControlSelect1">Tanggal Rental</label>
                            <input type="text" class="form-control" id="tanggalRental" name="tanggalRental" value="<?php echo $data_trx['tgl_rental']; ?>" readonly>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="exampleFormControlSelect1">Tanggal Selesai</label>
                            <input type="text" class="form-control" id="tanggalSelesai" name="tanggalSelesai" value="<?php echo $data_trx['tgl_kembali']; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group mt-3">
                          <label for="exampleFormControlSelect1">Biaya Denda /hari</label>
                          <input type="text" class="form-control" id="biayaDenda" name="biayaDenda" value="<?php echo number_format($data_trx['denda'], 0, ',', '.'); ?>" readonly>
                        </div>
                        <div class="form-group mt-3">
                          <?php
                          $x = strtotime(date('Y-m-d'));
                          $y = strtotime($data_trx['tgl_kembali']);
                          $jmlHari = abs(($x - $y) / (60 * 60 * 24));
                          ?>
                          <label for="exampleFormControlSelect1">Jumlah Hari Telat</label>
                          <input type="text" class="form-control" id="jmlHari" name="jmlHari" value="<?php echo $jmlHari ?>" readonly>
                        </div>

                        <div class="form-group mt-3">
                          <label for="exampleFormControlSelect1">Total Denda yang harus dibayarkan</label>
                          <input type="text" class="form-control" id="dendaTotal" name="dendaTotal" value="<?php echo number_format($data_trx['denda'] * $jmlHari, 0, ',', '.'); ?>" readonly>
                        </div>
                        <div class="form-group align-items-center">
                          <label>Upload Bukti Pembayaran Denda</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="buktiDenda" name="buktiDenda">
                              <label class="custom-file-label"><?php echo $data_trx['bukti_denda']; ?></label>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" id="buktiDendaLama" name="buktiDendaLama" value="<?php echo $data_trx['bukti_denda']; ?>">

                        </div>

                      </div>
                    <?php } ?>
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
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <?php if ($data_trx['id_status'] == 6) { ?>
                    <button type="submit" class="btn btn-success">Save Pembayaran DP</button>
                  <?php } ?>
                  <?php if ($data_trx['id_status'] == 10) { ?>
                    <button type="submit" class="btn btn-success">Save Pembayaran Pelunasan</button>
                  <?php } ?>
                  <?php if ($data_trx['id_status'] == 14 || $data_trx['id_status'] == 12) { ?>
                    <button type="submit" class="btn btn-success">Save Pembayaran Denda</button>
                  <?php } ?>
                  <a href="<?php echo base_url(); ?>userpage/transaksi_rental" class="btn btn-primary">Kembali</a>

                </div>
                </form>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>