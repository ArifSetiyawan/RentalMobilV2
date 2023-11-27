<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Transaksi Rental</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome">Home</a></li>
                        <li class="breadcrumb-item active">Data Transaksi Rental</li>
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
                                    foreach ($data_pinjam as $pinjam) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $pinjam['nama'] ?></td>
                                            <td><?php echo $pinjam['nama_mobil'] ?></td>
                                            <td><?php echo $pinjam['namaLayanan'] ?></td>
                                            <td><?php echo $pinjam['tgl_rental'] ?></td>
                                            <td><?php echo $pinjam['tgl_kembali'] ?></td>
                                            <td>Rp. <?php echo number_format($pinjam['total_harga'], 0, ',', '.'); ?></td>
                                            <td>
                                                <div class="badge badge-success"><?php echo $pinjam['Nama_Status'] ?></div>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() ?>transaksi/detailTrx/<?php echo sha1($pinjam['id_rental']) ?>" class="btn btn-icon btn-info btn-sm" title="Detail">
                                                    Detail
                                                </a>
                                                <?php if ($pinjam['id_status'] == 1) { ?>
                                                    <button type="button" data-toggle="modal" data-target="#modalVerifikasi<?= $pinjam['id_rental'] ?>" class="btn btn-icon btn-success btn-sm" title="Verifikasi Data">
                                                        Verifikasi Data
                                                    </button>
                                                <?php } elseif ($pinjam['id_status'] == 3) { ?>
                                                    <button type="button" data-toggle="modal" data-target="#modalVerifikasi<?= $pinjam['id_rental'] ?>" class="btn btn-icon btn-success btn-sm" title="Verifikasi Data">
                                                        Response Verifikasi Data
                                                    </button>
                                                <?php } elseif ($pinjam['id_status'] == 5) { ?>
                                                    <a href="#" class="btn btn-icon btn-danger btn-sm" data-toggle="modal" data-target="#modalNego<?= $pinjam['id_rental'] ?>">
                                                        Response Negosiasi
                                                    </a>
                                                <?php } elseif ($pinjam['id_status'] == 7 && $pinjam['bukti_DP'] != '') { ?>
                                                    <a href="#" class="btn btn-icon btn-danger btn-sm" data-toggle="modal" data-target="#modalDP<?= $pinjam['id_rental'] ?>">
                                                        Response Pembayaran DP
                                                    </a>
                                                <?php } elseif ($pinjam['id_status'] == 8) { ?>
                                                    <button type="button" data-toggle="modal" data-target="#modalPengantaran<?= $pinjam['id_rental'] ?>" class="btn btn-icon btn-success btn-sm" title="Pengantaran Mobil">
                                                        Pengantaran Mobil
                                                    </button>
                                                <?php } elseif ($pinjam['id_status'] == 9) { ?>
                                                    <button type="button" data-toggle="modal" data-target="#modalPengantaran<?= $pinjam['id_rental'] ?>" class="btn btn-icon btn-success btn-sm" title="Pengantaran Mobil">
                                                        Response Pengantaran Mobil
                                                    </button>
                                                <?php } elseif ($pinjam['id_status'] == 11 && $pinjam['bukti_pelunasan'] != '') { ?>
                                                    <a href="#" class="btn btn-icon btn-danger btn-sm" data-toggle="modal" data-target="#modalPelunasan<?= $pinjam['id_rental'] ?>">
                                                        Response Pelunasan Bayar
                                                    </a>
                                                <?php } elseif ($pinjam['id_status'] == 15 && $pinjam['bukti_denda'] != '') { ?>
                                                    <a href="#" class="btn btn-icon btn-danger btn-sm" data-toggle="modal" data-target="#modalDenda<?= $pinjam['id_rental'] ?>">
                                                        Response Pembayaran Denda
                                                    </a>
                                                <?php } elseif ($pinjam['id_status'] == 17 && $pinjam['bukti_pengembalian'] != '') { ?>
                                                    <a href="#" class="btn btn-icon btn-danger btn-sm" data-toggle="modal" data-target="#modalPengembalian<?= $pinjam['id_rental'] ?>">
                                                        Response Pengembalian Mobil
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalNego<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_nego">Negoisasi Harga Rental Mobil</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="POST">
                                                        <div class="modal-body" id="body_modalNego" style="font-size:14px">
                                                            <div class="container-fluid">
                                                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $pinjam['id_rental'] ?>" value="<?php echo $pinjam['id_rental'] ?>" />
                                                                <div class="form-group align-items-center">
                                                                    <label>Harga Rental</label>
                                                                    <div>
                                                                        <input class="form-control col-md-10" name="hargaRental" id="hargaRental<?php echo $pinjam['id_rental'] ?>" value="<?php echo number_format($pinjam['total_harga'], 0, ',', '.'); ?>" readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group align-items-center">
                                                                    <label>Harga Negosiasi</label>
                                                                    <div>
                                                                        <input class="form-control col-md-10" name="hargaNego" id="hargaNego<?php echo $pinjam['id_rental'] ?>" value="<?php echo number_format($pinjam['harga_nego'], 0, ',', '.'); ?>" readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group align-items-center">
                                                                    <label>Notes</label>
                                                                    <div>
                                                                        <textarea name="notes" class="form-control" id="notesNego<?php echo $pinjam['id_rental'] ?>" cols="30" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" id="btnApprove" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>' , '<?php echo $pinjam['id_status'] ?>')">Approve</button>
                                                            <button type="button" class="btn btn-danger" id="btnReject" onclick="doReject('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Reject</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalVerifikasi<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog" style="max-width: 630px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_verifikasi">Upload bukti verifikasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="POST" action="<?php echo base_url('transaksi/verifikasiBukti'); ?>" enctype="multipart/form-data">
                                                        <div class="modal-body" id="body_modalVerifikasi" style="font-size:14px">
                                                            <div class="container-fluid">
                                                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental" value="<?php echo $pinjam['id_rental'] ?>" />
                                                                <input class="col-md-7 form-control" type="hidden" name="idCust" id="idCust" value="<?php echo $pinjam['id_customer'] ?>" />
                                                                <input class="col-md-7 form-control" type="hidden" name="keperluan" id="keperluan" value="<?php echo $pinjam['keperluan'] ?>" />

                                                                <input type="hidden" name="statusVerif" id="statusVerif" value="<?php echo $pinjam['id_status'] ?>">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>File KTP</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                                                                <label class="custom-file-label"><?php echo $pinjam['file_ktp']; ?></label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['file_ktp'] . '/' . 'ALL' . '/' . 'KTP'); ?>" class="btn btn-outline-primary" id="downloadKTP" hidden>Download</a>

                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" class="form-control" id="ktpLama" name="ktpLama" value="<?php echo $pinjam['file_ktp']; ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label>File SIM</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="sim" name="sim">
                                                                                <label class="custom-file-label"><?php echo $pinjam['file_SIM']; ?></label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['file_SIM'] . '/' . 'ALL' . '/' . 'SIM'); ?>" class="btn btn-outline-primary" id="downloadSIM" hidden>Download</a>

                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" class="form-control" id="simLama" name="simLama" value="<?php echo $pinjam['file_SIM']; ?>">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <?php
                                                                if ($pinjam['keperluan'] == "Perseorangan") { ?>


                                                                    <div id="pribadi" class="mt-3">
                                                                        <p style="font-weight: bold; font-size: medium;">File Keperluan <?= $pinjam['keperluan'] ?></p>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label>File Kartu Keluarga</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="kk" name="kk">
                                                                                        <label class="custom-file-label"><?php echo $pinjam['file_KK']; ?></label>
                                                                                    </div>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['file_KK'] . '/' . $pinjam['keperluan'] . '/' . 'KK'); ?>" class="btn btn-outline-primary" id="downloadKK" hidden>Download</a>

                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" class="form-control" id="kkLama" name="kkLama" value="<?php echo $pinjam['file_KK']; ?>">

                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label>File Rekening Listrik/Telfon Rumah</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="rek" name="rek">
                                                                                        <label class="custom-file-label" for="exampleInputFile"><?php echo $pinjam['rek_listrik']; ?></label>
                                                                                    </div>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['rek_listrik'] . '/' . $pinjam['keperluan'] . '/' . 'REK'); ?>" class="btn btn-outline-primary" id="downloadREK" hidden>Download</a>

                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" class="form-control" id="rekLama" name="rekLama" value="<?php echo $pinjam['rek_listrik']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-12">
                                                                                <label>File Tanda Bukti Kepemilikan Rumah</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="tdk" name="tdk">
                                                                                        <label class="custom-file-label" for="exampleInputFile"><?php echo $pinjam['bukti_keprumah']; ?></label>
                                                                                    </div>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['bukti_keprumah'] . '/' . $pinjam['keperluan'] . '/' . 'BK'); ?>" class="btn btn-outline-primary" id="downloadTDK" hidden>Download</a>

                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" class="form-control" id="tdkLama" name="tdkLama" value="<?php echo $pinjam['bukti_keprumah']; ?>">
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label>File ID Card Kantor</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="idcard" name="idcard">
                                                                                        <label class="custom-file-label" for="exampleInputFile"><?php echo $pinjam['Id_card']; ?></label>
                                                                                    </div>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['Id_card'] . '/' . $pinjam['keperluan'] . '/' . 'IDCARD'); ?>" class="btn btn-outline-primary" id="downloadIDCARD" hidden>Download</a>

                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" class="form-control" id="idcardLama" name="idcardLama" value="<?php echo $pinjam['Id_card']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($pinjam['keperluan'] == "Perusahaan") {  ?>

                                                                    <div id="korporasi" class="mt-3">
                                                                        <p style="font-weight: bold; font-size: medium;">File Keperluan <?= $pinjam['keperluan'] ?></p>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label>File Perusahaan</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="fper" name="fper">
                                                                                        <label class="custom-file-label" for="exampleInputFile"><?php echo $pinjam['file_perusahaan']; ?></label>
                                                                                    </div>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['file_perusahaan'] . '/' . $pinjam['keperluan'] . '/' . 'PERUSAHAAN'); ?>" class="btn btn-outline-primary" id="downloadFPER" hidden>Download</a>

                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" class="form-control" id="fperLama" name="fperLama" value="<?php echo $pinjam['file_perusahaan']; ?>">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label>File NIB</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="nib" name="nib">
                                                                                        <label class="custom-file-label" for="exampleInputFile"><?php echo $pinjam['file_NIB']; ?></label>
                                                                                    </div>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/downloadVerifikasiFile/' . $pinjam['file_NIB'] . '/' . $pinjam['keperluan'] . '/' . 'NIB'); ?>" class="btn btn-outline-primary" id="downloadNIB" hidden>Download</a>

                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" class="form-control" id="nibLama" name="nibLama" value="<?php echo $pinjam['file_NIB']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                <hr class="mt-3">
                                                                <p style="font-weight: bold; font-size: medium;">Upload Bukti Verifikasi & Survei</p>
                                                                <hr>
                                                                <div class="form-group align-items-center">
                                                                    <label>Bukti Verifikasi & Survei</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="bukti_survei" name="bukti_survei">
                                                                            <label class="custom-file-label" for="exampleInputFile"><?php echo $pinjam['bukti_survei']; ?></label>
                                                                        </div>
                                                                        <div class="input-group-append">
                                                                            <a href="<?php echo base_url('transaksi/download/' . $pinjam['bukti_survei'] . '/' . $pinjam['id_status']); ?>" class="btn btn-outline-primary" id="downloadSurvei" hidden>Download</a>

                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="bukti_surveiLama" name="bukti_surveiLama" value="<?php echo $pinjam['bukti_survei']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <?php if ($pinjam['id_status'] == 3) { ?>
                                                                <button type="button" class="btn btn-primary" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Approve</button>
                                                            <?php } ?>
                                                            <?php if ($pinjam['id_status'] == 1) { ?>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            <?php } ?>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalPengantaran<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog" style="max-width: 630px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_verifikasi">Upload bukti pengantaran mobil</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php if ($pinjam['id_status'] == 9) { ?>
                                                        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                                        <?php } ?>
                                                        <?php if ($pinjam['id_status'] == 8) { ?>
                                                            <form class="form-horizontal" method="POST" action="<?php echo base_url('transaksi/pengantaranBukti'); ?>" enctype="multipart/form-data">

                                                            <?php } ?>
                                                            <div class="modal-body" id="body_modalPengantaran" style="font-size:14px">
                                                                <div class="container-fluid">
                                                                    <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $pinjam['id_rental'] ?>" value="<?php echo $pinjam['id_rental'] ?>" />

                                                                    <div class="form-group align-items-center">
                                                                        <label>Bukti Pengantaran Mobil</label>
                                                                        <div>
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <?php if ($pinjam['id_status'] == 9) { ?>
                                                                                        <input type="file" class="custom-file-input" id="buktiPengantaran" name="buktiPengantaran" disabled>
                                                                                    <?php } ?>
                                                                                    <?php if ($pinjam['id_status'] == 8) { ?>
                                                                                        <input type="file" class="custom-file-input" id="buktiPengantaran" name="buktiPengantaran">
                                                                                    <?php } ?>
                                                                                    <label class="custom-file-label"><?php echo $pinjam['bukti_pengantaran']; ?></label>
                                                                                </div>
                                                                                <?php if ($pinjam['id_status'] == 9) { ?>
                                                                                    <div class="input-group-append">
                                                                                        <a href="<?php echo base_url('transaksi/download/' . $pinjam['bukti_pengantaran'] . '/' . $pinjam['id_status']); ?>" class="btn btn-outline-primary">Download</a>

                                                                                    </div>
                                                                                <?php } ?>

                                                                            </div>

                                                                            <input type="hidden" class="form-control" id="buktiPengantaranLama" name="buktiPengantaranLama" value="<?php echo $pinjam['bukti_pengantaran']; ?>">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <?php if ($pinjam['id_status'] == 9) { ?>
                                                                    <button type="button" class="btn btn-primary" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Approve</button>
                                                                <?php } ?>
                                                                <?php if ($pinjam['id_status'] == 8) { ?>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                <?php } ?>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                            </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalDP<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog" style="max-width: 630px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_verifikasi">Response Pembayaran DP</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                                        <div class="modal-body" id="body_modalPengantaran" style="font-size:14px">
                                                            <div class="container-fluid">
                                                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $pinjam['id_rental'] ?>" value="<?php echo $pinjam['id_rental'] ?>" />
                                                                <div class="form-group align-items-center">
                                                                    <label>Bukti Pembayaran DP</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="buktiDP" name="buktiDP" disabled>
                                                                            <label class="custom-file-label"><?php echo $pinjam['bukti_DP']; ?></label>
                                                                        </div>
                                                                        <div class="input-group-append">
                                                                            <a href="<?php echo base_url('transaksi/download/' . $pinjam['bukti_DP'] . '/' . $pinjam['id_status']); ?>" class="btn btn-outline-primary">Download</a>

                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="buktiDPLama" name="buktiDPLama" value="<?php echo $pinjam['bukti_DP']; ?>">
                                                                </div>
                                                                <div class="form-group align-items-center">
                                                                    <label>Notes</label>
                                                                    <div>
                                                                        <textarea name="notes" class="form-control" id="notesDP<?php echo $pinjam['id_rental'] ?>" cols="30" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" id="btnValid" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Valid</button>
                                                            <button type="button" class="btn btn-danger" id="btnReject" onclick="doReject('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Reject</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalPelunasan<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog" style="max-width: 630px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_verifikasi">Response Pelunasan Pembayaran</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="POST" action="<?php echo base_url('transaksi/pengantaranBukti'); ?>" enctype="multipart/form-data">
                                                        <div class="modal-body" id="body_modalPengantaran" style="font-size:14px">
                                                            <div class="container-fluid">
                                                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $pinjam['id_rental'] ?>" value="<?php echo $pinjam['id_rental'] ?>" />

                                                                <div class="form-group align-items-center">
                                                                    <label>Bukti Pembayaran Pelunasan</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="buktiPelunasan" name="buktiPelunasan" disabled>
                                                                            <label class="custom-file-label"><?php echo $pinjam['bukti_pelunasan']; ?></label>
                                                                        </div>
                                                                        <div class="input-group-append">
                                                                            <a href="<?php echo base_url('transaksi/download/' . $pinjam['bukti_pelunasan'] . '/' . $pinjam['id_status']); ?>" class="btn btn-outline-primary">Download</a>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="buktiPelunasanLama" name="buktiPelunasanLama" value="<?php echo $pinjam['bukti_pelunasan']; ?>">
                                                                </div>
                                                                <div class="form-group align-items-center">
                                                                    <label>Notes</label>
                                                                    <div>
                                                                        <textarea name="notes" class="form-control" id="notesPelunasan<?php echo $pinjam['id_rental'] ?>" cols="30" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" id="btnValid" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Valid</button>
                                                            <button type="button" class="btn btn-danger" id="btnReject" onclick="doReject('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Reject</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalDenda<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog" style="max-width: 630px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_verifikasi">Response Pembayaran Denda</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                                        <div class="modal-body" id="body_modalDenda" style="font-size:14px">
                                                            <div class="container-fluid">
                                                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $pinjam['id_rental'] ?>" value="<?php echo $pinjam['id_rental'] ?>" />
                                                                <div class="form-group align-items-center">
                                                                    <label>Bukti Pembayaran Denda</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="buktiDenda" name="buktiDenda" disabled>
                                                                            <label class="custom-file-label"><?php echo $pinjam['bukti_denda']; ?></label>
                                                                        </div>
                                                                        <div class="input-group-append">
                                                                            <a href="<?php echo base_url('transaksi/download/' . $pinjam['bukti_denda'] . '/' . $pinjam['id_status']); ?>" class="btn btn-outline-primary">Download</a>

                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="buktiDendaLama" name="buktiDendaLama" value="<?php echo $pinjam['bukti_denda']; ?>">
                                                                </div>
                                                                <div class="form-group align-items-center">
                                                                    <label>Notes</label>
                                                                    <div>
                                                                        <textarea name="notes" class="form-control" id="notesDenda<?php echo $pinjam['id_rental'] ?>" cols="30" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" id="btnValid" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Valid</button>
                                                            <button type="button" class="btn btn-danger" id="btnReject" onclick="doReject('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Reject</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalPengembalian<?= $pinjam['id_rental'] ?>" data-backdrop="static">
                                            <div class="modal-dialog" style="max-width: 630px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_verifikasi">Upload bukti pengembalian mobil</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                                        <div class="modal-body" id="body_modalPengembalian" style="font-size:14px">
                                                            <div class="container-fluid">
                                                                <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental<?php echo $pinjam['id_rental'] ?>" value="<?php echo $pinjam['id_rental'] ?>" />

                                                                <div class="form-group align-items-center">
                                                                    <label>Bukti Pengembalian Mobil</label>
                                                                    <div>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="buktiPengembalian" name="buktiPengembalian" disabled>
                                                                                <label class="custom-file-label"><?php echo $pinjam['bukti_pengembalian']; ?></label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <a href="<?php echo base_url('transaksi/download/' . $pinjam['bukti_pengembalian'] . '/' . $pinjam['id_status']); ?>" class="btn btn-outline-primary">Download</a>

                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" class="form-control" id="buktiPengembalianLama" name="buktiPengembalianLama" value="<?php echo $pinjam['bukti_pengembalian']; ?>">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" onclick="doApprove('<?php echo $pinjam['id_rental'] ?>', '<?php echo $pinjam['id_status'] ?>')">Approve</button>

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
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

<script>
    let status = $('#statusVerif').val()

    if (status == 1) {
        $("#downloadKTP").prop('hidden', 'hidden');
        $("#ktp").removeAttr('disabled');

        $("#downloadSIM").prop('hidden', 'hidden');
        $("#sim").removeAttr('disabled');

        $("#downloadKK").prop('hidden', 'hidden');
        $("#kk").removeAttr('disabled');

        $("#downloadREK").prop('hidden', 'hidden');
        $("#rek").removeAttr('disabled');

        $("#downloadTDK").prop('hidden', 'hidden');
        $("#tdk").removeAttr('disabled');

        $("#downloadIDCARD").prop('hidden', 'hidden');
        $("#idcard").removeAttr('disabled');

        $("#downloadFPER").prop('hidden', 'hidden');
        $("#fper").removeAttr('disabled');

        $("#downloadNIB").prop('hidden', 'hidden');
        $("#nib").removeAttr('disabled');

        $("#downloadSurvei").prop('hidden', 'hidden');
        $("#bukti_survei").removeAttr('disabled');

    } else if (status == 3) {
        $("#downloadKTP").removeAttr('hidden');
        $("#ktp").prop('disabled', 'disabled');

        $("#downloadSIM").removeAttr('hidden');
        $("#sim").prop('disabled', 'disabled');

        $("#downloadKK").removeAttr('hidden');
        $("#kk").prop('disabled', 'disabled');

        $("#downloadREK").removeAttr('hidden');
        $("#rek").prop('disabled', 'disabled');

        $("#downloadTDK").removeAttr('hidden');
        $("#tdk").prop('disabled', 'disabled');

        $("#downloadIDCARD").removeAttr('hidden');
        $("#idcard").prop('disabled', 'disabled');

        $("#downloadFPER").removeAttr('hidden');
        $("#fper").prop('disabled', 'disabled');

        $("#downloadNIB").removeAttr('hidden');
        $("#nib").prop('disabled', 'disabled');

        $("#downloadSurvei").removeAttr('hidden');
        $("#bukti_survei").prop('disabled', 'disabled');

    }

    function doReject(id, status) {
        let obj = {}
        let url = ''
        obj.Id_rental = $("#id_rental" + id).val();

        if (status == 5) {
            url = '<?= base_url('transaksi/RejectNego') ?>'
            obj.notesNego = $("#notesNego" + id).val();
        }

        if (status == 7) {
            url = '<?= base_url('transaksi/RejectDP') ?>'
            obj.notesDP = $("#notesDP" + id).val();

        }

        if (status == 11) {
            url = '<?= base_url('transaksi/RejectPelunasan') ?>'
            obj.notesPelunasan = $("#notesPelunasan" + id).val();

        }
        if (status == 15) {
            url = '<?= base_url('transaksi/RejectDenda') ?>'
            obj.notesDenda = $("#notesDenda" + id).val();

        }

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: "datanya=" + JSON.stringify(obj),
            success: function(result) {
                swal("Success!", "Berhasil Reject Transaksi", "success");
                setTimeout(function() {
                    window.location = "<?= base_url('transaksi') ?>"
                }, 1000);

            }
        });
    }

    function doApprove(id, status) {
        let obj = {}
        let url = ''
        obj.Id_rental = $("#id_rental" + id).val();

        if (status == 5) {
            url = '<?= base_url('transaksi/ApproveNego') ?>'
            obj.harga_nego = $("#hargaNego" + id).val();

        }

        if (status == 3 || status == 7 || status == 9 || status == 11 || status == 15 || status == 17) {
            url = '<?= base_url('transaksi/ApprovalTransaksi/') ?>' + status
        }
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: "datanya=" + JSON.stringify(obj),
            success: function(result) {
                swal("Success!", "Berhasil Approve Transaksi", "success");
                setTimeout(function() {
                    window.location = "<?= base_url('transaksi') ?>"
                }, 1000);

            }
        });
    }
</script>