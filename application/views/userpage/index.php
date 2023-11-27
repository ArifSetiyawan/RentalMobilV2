<style>
  .services .icon {
    background: white;
  }
</style>
<div class="hero-wrap ftco-degree-bg" id="beranda" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Cara Cepat Merental Mobil</h1>
          <p style="font-size: 18px;">Selamat Datang Di Murifiya Rental Car, Kami menyediakan berbagai macam mobil khususnya untuk area margonda dan sekitarnya.</p>

        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12	featured-top">
        <div class="row no-gutters">
          <div class="col-md-12 d-flex align-items-center">
            <div class="services-wrap rounded-right w-100">
              <h3 class="heading-section mb-4">Prosedur Booking Mobil Di Murifiya Rental Car</h3>
              <div class="row d-flex mb-4">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Pilih Mobil Yang Dibutuhkan</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="ion-ios-clipboard"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Isi Form Pengajuan Booking</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="ion-ios-card"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Lakukan Pembayaran</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="ion-ios-cash"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Konfirmasikan Pembayaran</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Booking akan diproses oleh admin</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Nikmati Layanan Kami</h3>
                    </div>
                  </div>
                </div>
              </div>
              <?php if (empty($_SESSION['nama'])) { ?>
                <p style="text-align: center;"><a href="<?php echo base_url(); ?>auth" class="btn btn-primary py-3 px-4">Login dan Rental sekarang</a></p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="ftco-section ftco-about" id="about">
  <?php $this->load->view('partials/userpartial/page/about'); ?>
</section>

<section class="ftco-section" id="services">
  <?php $this->load->view('partials/userpartial/page/layanan'); ?>
</section>

<section class="ftco-section" id="mobil">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Varian dan Tipe</span>
        <h2 class="mb-2">Armada Murifiya Rental Car</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel-car owl-carousel">
          <?php foreach ($data_mobil as $mobil) { ?>
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo base_url(); ?>upload/mobil/<?= $mobil['img_mobil'] ?>);">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#"><?= $mobil['nama_mobil'] ?></a></h2>
                  <div class="d-flex mb-3">
                    <span class="cat"><?= $mobil['produsen'] ?></span>
                    <p class="price ml-auto">Rp. <?= number_format($mobil['harga'], 0, ',', '.') ?><span>/day</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block"><a href="<?php echo base_url(); ?>userpage/transaksi/<?php echo sha1($mobil['Id_mobil']) ?>" class="btn btn-primary py-2 mr-1">Book now</a>
                    <a href="<?php echo base_url(); ?>userpage/detailsMobil/<?php echo sha1($mobil['Id_mobil']) ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</section>