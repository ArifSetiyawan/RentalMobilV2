<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
        <h1 class="mb-3 bread">Data Transaksi Rental Car</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">Data Transaksi Pengajuan Rental</h5>
          <div class="card-body">
            <div class="table-responsive">
              <table id="data-trx" class="display nowrap table table-bordered table-striped table-hover" style="overflow:auto; width: 100%;">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Nama Customer</th>
                    <th>Nama Mobil </th>
                    <th>Layanan</th>
                    <th>Tgl Rental</th>
                    <th>Tgl Selesai</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data_trx as $trx) {
                  ?>
                    <tr>
                      <td><?php echo $no = $no + 1 ?></td>
                      <td><?php echo $trx['nama'] ?></td>
                      <td><?php echo $trx['nama_mobil'] ?></td>
                      <td><?php echo $trx['namaLayanan'] ?></td>
                      <td><?php echo $trx['tgl_rental'] ?></td>
                      <td><?php echo $trx['tgl_kembali'] ?></td>
                      <td>Rp. <?php echo number_format($trx['total_harga'], 0, ',', '.'); ?></td>

                      <td>
                        <?php if ($trx['Id_Status'] == 13) { ?>
                          <div class="badge badge-danger"><?php echo $trx['Nama_Status'] ?></div>
                        <?php } else { ?>
                          <div class="badge badge-success"><?php echo $trx['Nama_Status'] ?></div>
                        <?php } ?>
                      </td>

                      <td>
                        <a href="<?php echo base_url() ?>userpage/detailTrx/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-info btn-sm" title="Detail">
                          Detail
                        </a>
                        <?php if ($trx['id_status'] == 4) { ?>
                          <button type="button" data-toggle="modal" data-target="#modalNego<?= $trx['id_rental'] ?>" class="btn btn-icon btn-success btn-sm" title="Nego">
                            Negosiasi
                          </button>
                        <?php } elseif ($trx['id_status'] == 6) { ?>
                          <a href="<?php echo base_url() ?>userpage/trxPembayaran/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-success btn-sm">
                            Pembayaran DP
                          </a>
                        <?php } elseif ($trx['id_status'] == 10) { ?>
                          <a href="<?php echo base_url() ?>userpage/trxPelunasan/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-success btn-sm">
                            Pelunasan Pembayaran
                          </a>
                        <?php } elseif ($trx['id_status'] > 6 && $trx['id_status'] < 8) { ?>
                          <a href="<?php echo base_url() ?>report/printInvoiceDP/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-dark btn-sm">
                            Cetak Invoice DP
                          </a>
                        <?php } elseif ($trx['id_status'] > 10 && $trx['id_status'] < 12) { ?>
                          <a href="<?php echo base_url() ?>report/printInvoicePelunasan/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-dark btn-sm">
                            Cetak Invoice Pelunasan
                          </a>
                        <?php } elseif ($trx['id_status'] == 15) { ?>
                          <a href="<?php echo base_url() ?>report/printInvoiceDenda/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-dark btn-sm">
                            Cetak Invoice Pembayaran Denda
                          </a>
                        <?php } elseif ($trx['id_status'] == 1) { ?>
                          <a href="<?php echo base_url() ?>userpage/rejectRent/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-danger btn-sm">
                            Batalkan Rental
                          </a>
                        <?php } ?>
                        <?php if (date('Y-m-d') > $trx['tgl_kembali'] && ($trx['id_status'] == 12 || $trx['id_status'] == 14)) { ?>
                          <a href="<?php echo base_url() ?>userpage/trxDenda/<?php echo sha1($trx['id_rental']) ?>" class="btn btn-icon btn-danger btn-sm">
                            Pembayaran Denda Rental
                          </a>
                        <?php } elseif ($trx['tgl_kembali'] == date('Y-m-d') || ($trx['id_status'] == 12 || $trx['id_status'] == 16)) { ?>
                          <button type="button" data-toggle="modal" data-target="#modalPengembalian<?= $trx['id_rental'] ?>" class="btn btn-icon btn-primary btn-sm" title="Pengembalian">
                            Pengembalian Mobil
                          </button>
                        <?php } ?>

                      </td>
                    </tr>
                    <div class="modal fade" id="modalNego<?= $trx['id_rental'] ?>" data-backdrop="static">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="title_nego">Negoisasi Harga Rental Mobil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-horizontal" action="<?php echo base_url(); ?>userpage/actionNego" method="POST">
                            <div class="modal-body" id="body_modalNego" style="font-size:14px">
                              <div class="container-fluid">
                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental" value="<?php echo $trx['id_rental'] ?>" />
                                <div class="form-group align-items-center">
                                  <label>Harga Rental</label>
                                  <div>
                                    <input class="form-control col-md-10" name="hargaRental" id="hargaRental" value="<?php echo number_format($trx['total_harga'], 0, ',', '.'); ?>" readonly />
                                  </div>
                                </div>
                                <div class="form-group align-items-center">
                                  <label>Harga Negoisasi</label>
                                  <div>
                                    <input class="form-control col-md-10" name="hargaNego" id="hargaNego" value="<?= $trx['harga_nego'] ?>" />
                                  </div>
                                </div>
                                <?php if ($trx['notes'] != '') { ?>
                                  <div class="form-group align-items-center">
                                    <label>Notes</label>
                                    <div>
                                      <textarea name="notes" class="form-control" id="notes" cols="30" rows="2" disabled><?= $trx['notes'] ?></textarea>
                                    </div>
                                  </div>
                                <?php } ?>

                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" id="btnSaveNego">Save</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modalPengembalian<?= $trx['id_rental'] ?>" data-backdrop="static">
                      <div class="modal-dialog" style="max-width: 630px">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="title_verifikasi">Upload bukti pembalian mobil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-horizontal" method="POST" action="<?php echo base_url('userpage/pengembalianBukti'); ?>" enctype="multipart/form-data">
                            <div class="modal-body" id="body_modalPengantaran" style="font-size:14px">
                              <div class="container-fluid">
                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $trx['id_rental'] ?>" value="<?php echo $trx['id_rental'] ?>" />

                                <div class="form-group align-items-center">
                                  <label>Bukti Pengembalian Mobil</label>
                                  <div>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="buktiPengembalian" name="buktiPengembalian">
                                        <label class="custom-file-label"><?php echo $trx['bukti_pengembalian']; ?></label>
                                      </div>

                                    </div>

                                    <input type="hidden" class="form-control" id="buktiPengembalianLama" name="buktiPengembalianLama" value="<?php echo $trx['bukti_pengembalian']; ?>">

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>