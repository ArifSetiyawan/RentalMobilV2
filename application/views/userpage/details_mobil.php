<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/userpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>userpage/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span></p>
				<h1 class="mb-3 bread">Car Details</h1>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section ftco-car-details">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="car-details">
					<div class="img rounded" style="background-image: url(<?php echo base_url(); ?>upload/mobil/<?= $data_mobil['img_mobil'] ?>);"></div>
					<div class="text text-center">
						<span class="subheading"><?= $data_mobil['produsen'] ?></span>
						<h2><?= $data_mobil['nama_mobil'] ?></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="media-body py-md-4">
						<div class="d-flex mb-3 align-items-center">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
							<div class="text">
								<h3 class="heading mb-0 pl-3">
									Years
									<span><?= $data_mobil['tahun_buat'] ?></span>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="media-body py-md-4">
						<div class="d-flex mb-3 align-items-center">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
							<div class="text">
								<h3 class="heading mb-0 pl-3">
									Transmission
									<span><?= $data_mobil['transmisi'] ?></span>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="media-body py-md-4">
						<div class="d-flex mb-3 align-items-center">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
							<div class="text">
								<h3 class="heading mb-0 pl-3">
									Seats
									<span><?= $data_mobil['kapasitas'] ?> Adults</span>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="media-body py-md-4">
						<div class="d-flex mb-3 align-items-center">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
							<div class="text">
								<h3 class="heading mb-0 pl-3">
									Fuel
									<span><?= $data_mobil['BBM'] ?></span>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 pills">
				<div class="bd-example bd-example-tabs">
					<div class="d-flex justify-content-center">
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							</li>
						</ul>
					</div>

					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
							<p><?= $data_mobil['deskripsi'] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>