<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
        <h1 class="mb-3 bread">Profil</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Update Profil</span>
        <h2 class="mb-3">Lengkapi data data yang diperlukan</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">Data Profil Customer</h5>
          <div class="card-body">
            <form action="<?php echo base_url('userpage/updateProfil'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_cust" value="<?php echo $data_customer['Id_cust']; ?>">
              <input type="hidden" name="keperluan" value="<?= $_SESSION['keperluan'] ?>">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nmCust" name="nmCust" value="<?php echo $data_customer['nama']; ?>">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $data_customer['email']; ?>">
              </div>
              <div class="row">
                <div class="col">
                  <label for="exampleFormControlTextarea1">No Telefon</label>
                  <input type="text" class="form-control" id="noTelfon" name="noTelfon" value="<?php echo $data_customer['no_telfon']; ?>">
                </div>
                <div class="col">
                  <label for="exampleFormControlTextarea1">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $data_customer['alamat']; ?></textarea>
                </div>
              </div>
              <?php if ($data_customer['file_ktp'] != '' && $data_customer['file_SIM'] != '') { ?>
                <div class="row mt-4">
                  <div class="col">
                    <label>File KTP</label>
                    <p>
                      <span><?php echo $data_customer['file_ktp']; ?></span>
                    </p>
                    <input type="file" class="form-control" id="ktp" name="ktp">
                    <input type="hidden" class="form-control" id="ktpLama" name="ktpLama" value="<?php echo $data_customer['file_ktp']; ?>">
                  </div>
                  <div class="col">
                    <label>File SIM</label>
                    <p>
                      <span><?php echo $data_customer['file_SIM']; ?></span>
                    </p>
                    <input type="file" class="form-control" id="sim" name="sim">
                    <input type="hidden" class="form-control" id="simLama" name="simLama" value="<?php echo $data_customer['file_SIM']; ?>">
                  </div>
                </div>
              <?php }  ?>

              <?php if ($_SESSION['keperluan'] == "Perseorangan") { ?>
                <?php if ($data_customer['file_KK'] != '' && $data_customer['rek_listrik'] != '' && $data_customer['bukti_keprumah'] != '' && $data_customer['Id_card'] != '') { ?>
                  <div id="pribadi">
                    <div class="row mt-4">
                      <div class="col">
                        <label>File Kartu Keluarga</label>
                        <p>
                          <span><?php echo $data_customer['file_KK']; ?></span>
                        </p>
                        <input type="file" class="form-control" id="kk" name="kk">
                        <input type="hidden" class="form-control" id="kkLama" name="kkLama" value="<?php echo $data_customer['file_KK']; ?>">

                      </div>
                      <div class="col">
                        <label>File Rekening Listrik/Telfon Rumah</label>
                        <p>
                          <span><?php echo $data_customer['rek_listrik']; ?></span>
                        </p>
                        <input type="file" class="form-control" id="rek" name="rek">
                        <input type="hidden" class="form-control" id="rekLama" name="rekLama" value="<?php echo $data_customer['rek_listrik']; ?>">
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col">
                        <label>File Tanda Bukti Kepemilikan Rumah</label>
                        <p>
                          <span><?php echo $data_customer['bukti_keprumah']; ?></span>
                        </p>
                        <input type="file" class="form-control" id="tdk" name="tdk">
                        <input type="hidden" class="form-control" id="tdkLama" name="tdkLama" value="<?php echo $data_customer['bukti_keprumah']; ?>">
                      </div>
                      <div class="col">
                        <label>File ID Card Kantor</label>
                        <p>
                          <span><?php echo $data_customer['Id_card']; ?></span>
                        </p>
                        <input type="file" class="form-control" id="idcard" name="idcard">
                        <input type="hidden" class="form-control" id="idcardLama" name="idcardLama" value="<?php echo $data_customer['Id_card']; ?>">
                      </div>
                    </div>
                  </div>
                <?php }  ?>
              <?php } ?>
              <?php if ($_SESSION['keperluan'] == "Perusahaan") { ?>
                <?php if ($data_customer['file_perusahaan'] != '' && $data_customer['file_NIB'] != '') { ?>

                  <div id="korporasi">
                    <div class="row mt-4">
                      <div class="col">
                        <label>File Perusahaan</label>
                        <p>
                          <span><?php echo $data_customer['file_perusahaan']; ?></span>
                        </p>
                        <input type="file" class="form-control" id="fper" name="fper">
                        <input type="hidden" class="form-control" id="fperLama" name="fperLama" value="<?php echo $data_customer['file_perusahaan']; ?>">
                      </div>
                      <div class="col">
                        <label>File NIB</label>
                        <p>
                          <span><?php echo $data_customer['file_NIB']; ?></span>
                        </p>
                        <input type="file" class="form-control" id="nib" name="nib">
                        <input type="hidden" class="form-control" id="nibLama" name="nibLama" value="<?php echo $data_customer['file_NIB']; ?>">
                      </div>
                    </div>
                  </div>
                <?php }  ?>

              <?php } ?>
              <div class="mt-3">
                <button type="submit" class="btn btn-primary">
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