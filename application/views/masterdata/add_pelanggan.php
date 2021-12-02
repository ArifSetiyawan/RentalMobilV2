<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Data Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/pelanggan">Data Pelanggan</a></li>
                        <li class="breadcrumb-item active">Input Data Pelanggan</li>
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
                        <form action="<?php echo base_url('masterdata/simpan_data_pelanggan'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-group col-md-8">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="5" required></textarea>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>No Telefon</label>
                                    <input type="text" class="form-control" name="no_telfon" placeholder="Masukkan No Telefon" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>No KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan KTP Lengkap" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Anda" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anda" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Jenis Kelamin </label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="">------</option>
                                        <option value="PRIA">PRIA</option>
                                        <option value="WANITA">WANITA</option>
                                    </select>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="form-group col-md-8">
                                    <button type="submit" class="btn btn-primary">Save data</button>

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