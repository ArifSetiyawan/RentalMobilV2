<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $sub_menu ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/datamobil"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sub_menu ?></li>
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
                    <div class="card">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/updateMobil'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="Id" value="<?php echo $data_mobil['Id_mobil'] ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input type="text" class="form-control" name="nama_mobil" value="<?php echo isset($data_mobil['nama_mobil']) ? $data_mobil['nama_mobil'] : ''; ?>" placeholder="Masukkan Nama Mobil">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Produsen</label>
                                            <input type="text" class="form-control" name="produsen" value="<?php echo isset($data_mobil['produsen']) ? $data_mobil['produsen'] : ''; ?>" placeholder="Masukkan Produsen Mobil">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Type Mobil</label>
                                            <select class="form-control" name="kode_type">
                                                <?php
                                                foreach ($data_type as $type) {
                                                ?>
                                                    <option value="<?php echo $type['Id_type'] ?>" <?php echo isset($data_mobil['kode_type']) ? ($type['Id_type'] == $data_mobil['kode_type'] ? 'selected' : '') : ''; ?>><?php echo $type['nama_type'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Plat</label>
                                            <input type="text" class="form-control" name="nopol" value="<?php echo isset($data_mobil['nopol']) ? $data_mobil['nopol'] : ''; ?>" placeholder="Masukkan No Plat">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" class="form-control" name="warna" value="<?php echo isset($data_mobil['warna']) ? $data_mobil['warna'] : ''; ?>" placeholder="Masukkan Warna Mobil">

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>BBM</label>
                                            <input type="text" class="form-control" name="BBM" value="<?php echo isset($data_mobil['BBM']) ? $data_mobil['BBM'] : ''; ?>" placeholder="Masukkan BBM Mobil">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tahun Pembuatan</label>
                                            <input type="text" class="form-control" name="tahun_buat" value="<?php echo isset($data_mobil['tahun_buat']) ? $data_mobil['tahun_buat'] : ''; ?>" placeholder="Masukkan Tahun Pembuatan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input type="text" class="form-control" name="kapasitas" value="<?php echo isset($data_mobil['kapasitas']) ? $data_mobil['kapasitas'] : ''; ?>" placeholder="Masukkan Kapasitas Mobil">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Transmisi</label>
                                            <input type="text" class="form-control" name="transmisi" value="<?php echo isset($data_mobil['transmisi']) ? $data_mobil['transmisi'] : ''; ?>" placeholder="Masukkan Transmisi Mobil">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga Rental</label>
                                            <input type="text" class="form-control" name="harga" value="<?php echo isset($data_mobil['harga']) ? $data_mobil['harga'] : ''; ?>" placeholder="Masukkan Harga">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" id="desk" cols="30" rows="3" class="form-control" required><?php echo isset($data_mobil['deskripsi']) ? $data_mobil['deskripsi'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <div id="image">
                                                <img src="<?= base_url('upload/mobil/') . $data_mobil['img_mobil']; ?>" alt="<?= $data_mobil['produsen']; ?>" class="img-thumbnail mb-1" width="80">

                                            </div>
                                            <input type="file" name="carfile" class="form-control-file">
                                            <input type="hidden" name="carLama" value="<?= $data_mobil['img_mobil']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save data</button>
                                <a href="<?php echo base_url('masterdata/datamobil'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>