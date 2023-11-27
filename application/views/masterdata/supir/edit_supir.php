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
                        <form action="<?php echo base_url('masterdata/updateSupir'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="Id" value="<?php echo $data_supir['Id_supir'] ?>">

                                <div class="form-group">
                                    <label>Nama Supir</label>
                                    <input type="text" class="form-control" value="<?php echo isset($data_supir['namasupir']) ? $data_supir['namasupir'] : ''; ?>" name="namasupir" placeholder="Masukkan Nama Supir">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgllahir" value="<?php echo isset($data_supir['tgllahir']) ? $data_supir['tgllahir'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5"><?php echo isset($data_supir['alamat']) ? $data_supir['alamat'] : ''; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No.KTP</label>
                                    <input type="text" class="form-control" name="noktp" value="<?php echo isset($data_supir['noktp']) ? $data_supir['noktp'] : ''; ?>" placeholder="Masukkan No.KTP">
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <div id="image">
                                        <img src="<?= base_url('upload/supir/') . $data_supir['foto']; ?>" alt="<?= $data_supir['namasupir']; ?>" class="img-thumbnail mb-1" width="80">

                                    </div>
                                    <input type="file" name="supirfile" class="form-control-file">
                                    <input type="hidden" name="supirLama" value="<?= $data_supir['foto']; ?>">
                                </div>
                                
                                <div style="clear:both;"></div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save data</button>
                                <a href="<?php echo base_url('masterdata/supir'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>

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