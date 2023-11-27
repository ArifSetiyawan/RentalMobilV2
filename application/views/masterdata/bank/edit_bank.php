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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/bank"><?php echo $prev_menu ?></a></li>
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
                    <div class="card">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/update_data_bank'); ?>" method="post">
                            <div class="card-body">
                                <input type="hidden" name="id_bank" value="<?php echo $data_bank['Id_bank'] ?>">

                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" class="form-control" name="nama_bank" value="<?php echo $data_bank['nama_bank'] ?>" placeholder="Masukkan Nama Bank">
                                </div>
                                <div class="form-group">
                                    <label>No Rekening</label>
                                    <input type="text" class="form-control" name="no_rekening" value="<?php echo $data_bank['no_rekening'] ?>" placeholder="No rekening">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save data</button>
                                <a href="<?php echo base_url('masterdata/bank'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>

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