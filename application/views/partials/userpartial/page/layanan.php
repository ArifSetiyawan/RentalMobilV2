<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
      <span class="subheading">Layanan Kami</span>
      <h2 class="mb-3">Nikmati Layanan Terbaru Kami</h2>
    </div>
  </div>
  <div class="row">
    <?php foreach ($dataLayanan as $lay) { ?>
      <div class="col-md-6">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2"><?= $lay['namaLayanan']  ?></h3>
            <p><?= $lay['detailLayanan']  ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>