<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
        <h1 class="mb-3 bread">Choose Your Car</h1>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <?php foreach ($data_mobil as $mobil) { ?>
        <div class="col-md-4">
          <div class="car-wrap rounded ftco-animate">
            <div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo base_url(); ?>upload/mobil/<?= $mobil['img_mobil'] ?>);">
            </div>
            <div class="text">
              <h2 class="mb-0"><a href="#"><?= $mobil['nama_mobil'] ?></a></h2>
              <div class="d-flex mb-3">
                <span class="cat"><?= $mobil['produsen'] ?></span>
                <p class="price ml-auto">Rp. <?= number_format($mobil['harga'], 0, ',', '.') ?><span>/day</span></p>
              </div>

              <p class="d-flex mb-0 d-block">
                <?php if ($mobil['status'] == 0) { ?>
                  <button class="btn btn-danger py-2 mr-1" disabled>Car Rentaled</button>
                <?php } else { ?>
                  <a href="<?php echo base_url(); ?>userpage/transaksi/<?php echo sha1($mobil['Id_mobil']) ?>" class="btn btn-primary py-2 mr-1">Book now</a>
                <?php } ?>
                <a href="<?php echo base_url(); ?>userpage/detailsMobil/<?php echo sha1($mobil['Id_mobil']) ?>" class="btn btn-secondary py-2 ml-1">Details</a>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>