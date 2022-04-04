<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>transaksi">Data Transaksi</a></li>
                        <li class="breadcrumb-item active">Input Data Transaksi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($data_mobil as $mobil) { ?>
                    <div class="col-md-4">
                        <div class="card card-widget card-secondary">
                            <div class="card-header">
                                <span class="description"><?php echo $mobil['merek'] ?> <?php echo $mobil['nama_mobil'] ?></span>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body">
                                <img class="img-fluid pad" src="<?php echo base_url(); ?>upload/mobil/<?php echo $mobil['img_mobil'] ?>" alt="Photo">
                            </div>

                            <div class="card-footer card-comments">
                                <div class="card-comment">

                                    <img class="img-circle img-sm" src="<?php echo base_url(); ?>assets/images/sedan.png" alt="User Image">
                                    <div class="comment-text">
                                        <span class="username">
                                            <?php echo $mobil['merek'] ?> <?php echo $mobil['nama_mobil'] ?>
                                        </span>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer clearfix">
                                <a href="<?php echo base_url() ?>transaksi/add_trx_form" class="btn btn-primary float-right">
                                    <i class="fas fa-plus"></i> Order Mobil
                                </a>
                                <!--<button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Order Mobil</button> -->
                            </div>

                        </div>

                    </div>
                <?php } ?>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>