<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $active_menu ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/supir"><?php echo $prev_menu ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $active_menu ?></li>
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
                    <div class="card card-outline card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/simpan_data_supir'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Supir</label>
                                    <input type="text" class="form-control" name="namasupir" placeholder="Masukkan Nama Supir">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgllahir">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No.KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No.KTP">
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input type="file" name="supirfile" class="form-control">
                                </div>
                                
                                <div style="clear:both;"></div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save data</button>
                                <a href="<?php echo base_url('masterdata/supir'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>

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