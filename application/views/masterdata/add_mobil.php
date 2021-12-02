<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/datamobil">Data Mobil</a></li>
                        <li class="breadcrumb-item active">Input Data Mobil</li>
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
                        <form action="<?php echo base_url('masterdata/simpan_data_mobil');?>" method ="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" class="form-control" name="nama_mobil" placeholder="Masukkan Nama Mobil">
                                </div>
                                <div class="form-group">
                                    <label>Merek</label>
                                    <input type="text" class="form-control" name="merek" placeholder="Masukkan Merek Mobil">
                                </div>
                                <div class="form-group">
                                    <label>No Polisi</label>
                                    <input type="text" class="form-control" name="nopol" placeholder="Masukkan No Polisi">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Pembuatan</label>
                                    <input type="text" class="form-control" name="tahun_buat" placeholder="Masukkan Tahun Pembuatan">
                                </div>
                                <div class="form-group">
                                    <label>Kapasitas</label>
                                    <input type="text" class="form-control" name="kapasitas" placeholder="Masukkan Kapasitas Mobil">
                                </div>
                               
                        <div style="clear:both;"></div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save data</button>
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