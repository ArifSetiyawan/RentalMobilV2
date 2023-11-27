<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
        <h1 class="mb-3 bread">Ganti Password</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Ganti Password</span>
        <h2 class="mb-3">Perhatikan Kombinasi Password Anda</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">Ganti Password Akun</h5>
          <div class="card-body">
            <form method="post" action="<?php echo base_url('userpage/updatePass'); ?>" method="post">
              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $data_customer['email'] ?>" readonly>
              </div>
              <div class="row">
                <div class="col">
                  <label for="exampleFormControlTextarea1">Password Lama</label>
                  <input type="password" class="form-control" id="passLama" name="passLama">
                </div>
                <div class="col">
                  <label for="exampleFormControlTextarea1">Password Baru</label>
                  <input type="password" class="form-control" id="passBaru" name="passBaru">
                </div>
              </div>
              <div class="mt-3">
                <button class="btn btn-primary">
                  Submit
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>