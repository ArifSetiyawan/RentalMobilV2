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
                    <div class="card card-primary card-outline">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/simpan_data_mobil'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input type="text" class="form-control" name="nama_mobil" placeholder="Masukkan Nama Mobil">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Produsen</label>
                                            <input type="text" class="form-control" name="produsen" placeholder="Masukkan Merek Mobil">
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
                                                    <option value="<?php echo $type['Id_type'] ?>"><?php echo $type['nama_type'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Plat</label>
                                            <input type="text" class="form-control" name="nopol" placeholder="Masukkan No Plat">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" class="form-control" name="warna" placeholder="Masukkan Warna Mobil">

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>BBM</label>
                                            <input type="text" class="form-control" name="BBM" placeholder="Masukkan BBM Mobil">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tahun Pembuatan</label>
                                            <input type="text" class="form-control" name="tahun_buat" placeholder="Masukkan Tahun Pembuatan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input type="text" class="form-control" name="kapasitas" placeholder="Masukkan Kapasitas Mobil">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Transmisi</label>
                                            <input type="text" class="form-control" name="transmisi" placeholder="Masukkan Transmisi Mobil">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga Rental</label>
                                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" id="desk" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input type="file" name="carfile" class="form-control-file">
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
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>