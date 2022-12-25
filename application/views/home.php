	<!-- Hero/Header -->

	<section class="hero">
		<div class="container">
			<div class="row">
				<?php foreach ($heros as $hero) : ?>
					<div class="col-md-6 col-sm-12 d-flex align-items-center">
						<div class="content">
							<h1><?= $hero->title ?></h1>
							<p>
								<?= $hero->sub_title ?>
							</p>
							<button class="main-btn"><a href="#coffe-build">VIEW DETAILS</a>
							</button>
						</div>
					</div>
					<div class="col-md-6">

						<div class="image-header" data-aos="fade-left">
							<img src="<?= base_url() . '/upload/hero/' . $hero->hero_img ?>" alt="" width="95%">
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<!-- Coffe Build Section -->

	<section class="coffe-build" id="coffe-build">
		<div class="container">
			<div class="title" data-aos="fade-up">
				<h1>Coffe To Build Your Day!</h1>
			</div>
			<div class="row">
				<div class="col-md-5" data-aos="fade-up">
					<div class="content-left">
						<div class="row">
							<div class="col-md-9 col-sm-9 col-9">
								<h3>The perfect coffe</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipis elit. Aliquet est quisque consectetur</p>
							</div>
							<div class="col-md col-sm-3 col-3 d-flex align-items-center justify-content-center">
								<div class="image">
									<img src="<?= base_url() ?>./assets/images/icons-1.svg" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="content-left mleft">
						<div class="row">
							<div class="col-md-9 col-sm-9  col-9">
								<h3>The Moka Pot</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipis elit. Aliquet est quisque consectetur</p>
							</div>
							<div class="col-md-3 col-sm-3  col-3 d-flex align-items-center justify-content-center">
								<div class="image">
									<img src="<?= base_url() ?>./assets/images/icons-2.svg" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="content-left">
						<div class="row">
							<div class="col-md-9 col-sm-9  col-9">
								<h3>French Press</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipis elit. Aliquet est quisque consectetur</p>
							</div>
							<div class="col-md-3 col-sm-3  col-3 d-flex align-items-center justify-content-center">
								<div class="image">
									<img src="<?= base_url() ?>./assets/images/icons-3.svg" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 d-sm-none d-md-block d-none d-sm-block pe-md-5" data-aos="fade-up">
					<div class="image-cup">
						<img src="<?= base_url() ?>./assets/images/cup.png" width="130%" alt="">
					</div>
				</div>
				<div class="col-md-5" data-aos="fade-up">
					<div class="content-right">
						<div class="row">
							<div class="col-md-3 col-sm-3  col-3 d-flex align-items-center justify-content-center">
								<div class="image">
									<img src="<?= base_url() ?>./assets/images/icons-4.svg" alt="">
								</div>
							</div>
							<div class="col-md-9 col-sm-9  col-9">
								<h3>Supreme Powder</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipis elit. Aliquet est quisque consectetur</p>
							</div>
						</div>
					</div>
					<div class="content-right mright ">
						<div class="row">
							<div class="col-md-3 col-sm-3  col-3 d-flex align-items-center justify-content-center">
								<div class="image">
									<img src="<?= base_url() ?>./assets/images/icons-5.svg" alt="">
								</div>
							</div>
							<div class="col-md-9 col-sm-9  col-9">
								<h3>Coffe Machine</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipis elit. Aliquet est quisque consectetur</p>
							</div>
						</div>
					</div>
					<div class="content-right">
						<div class="row">
							<div class="col-md-3 col-sm-3  col-3 d-flex align-items-center justify-content-center">
								<div class="image">
									<img src="<?= base_url() ?>./assets/images/icons-6.svg" alt="">
								</div>
							</div>
							<div class="col-md-9 col-sm-9 col-9">
								<h3>Coffe to go</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipis elit. Aliquet est quisque consectetur</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Story Section -->

	<section class="story">
		<div class="container">
			<div class="row">
				<?php foreach ($storys as $story) : ?>
					<div class="col-md-7 d-flex align-items-center" data-aos="fade-up">
						<div class="story-title">
							<h1><?= $story->title_3 ?></h1>
							<p><?= $story->deskripsi_3 ?></p>
							<button class="main-btn"><a href="<?= site_url('home/story') ?>">full story </a>
								<img src="<?= base_url() ?>./assets/images/arrow-right.svg" style="margin-left: 10px;" alt="">
							</button>
						</div>
					</div>
					<div class="col-md-5" data-aos="fade-up">
						<div class="image-story d-flex align-items-center justify-content-end">
							<img src="<?= base_url() . '/upload/hero/' . $story->hero_img_3 ?>" width="90%" alt="">
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<!-- Product Section -->

	<section class="product">
		<div class="container">
			<div class="title-product">
				<h1>product</h1>
			</div>
			<div class="row">
				<?php foreach ($products as $product) : ?>
					<div class="col-md-4 pb-4" data-aos="fade-up">
						<div class="card">
							<div class="flip">
								<div class="card-front">
									<img src="<?= base_url() . '/upload/product/' . $product->foto ?>" width="100%" alt="">
								</div>
								<div class="card-back">
									<div class="content-back">
										<h2 class="title">
											description
										</h2>
										<p>
											<?= $product->deskripsi ?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-title">
							<h4 style="text-align:center;"><?= $product->nama_minuman ?></h4>
						</div>
					</div>
				<?php endforeach ?>
			</div>

			<div class="button-product pt-4" data-aos="fade-up">
				<button class="main-btn"><a href="<?= site_url('home/menu') ?>">all product </a>
					<img src="<?= base_url() ?>./assets/images/arrow-right.svg" style="margin-left: 10px;" alt="">
				</button>
			</div>
		</div>
		</div>
	</section>

	<!-- Quote Section -->

	<section class="quote">
		<div class="box-background">
			<div class="container">
				<div class="row">
					<?php foreach ($quotes as $q) : ?>
						<div class="col-md-5" data-aos="fade-up">
							<div class="image-quote">
								<img src="<?= base_url() . '/upload/hero/' . $q->quote_img ?>" width="100%" alt="">
							</div>
						</div>
						<div class="col-md-7" data-aos="fade-up">
							<p>
								<?= $q->quote ?>
							</p>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Loation Section -->

	<section class="locations">
		<div class="container">
			<div class="row">
				<?php foreach ($locations as $lct) : ?>
					<div class="col-md-7 d-flex align-items-center" style="padding-left: 0px;" data-aos="fade-up">
						<div class="locations-title">
							<h1><?= $lct->title_1 ?></h1>
							<p><?= $lct->deskripsi_2 ?></p>
							<button class="main-btn"><a href="<?= $lct->link_alamat ?>" target="_blank" rel="noopener noreferrer">google maps</a>
								<img src="../assets/images/arrow-right.svg" style="margin-left: 10px;" alt="">
							</button>
						</div>
					</div>
					<div class="col-md-5" data-aos="fade-up">
						<div class="image-locations d-flex align-items-center justify-content-end">
							<img src="<?= base_url() . '/upload/hero/' . $lct->hero_img_2 ?>" width="90%" alt="">
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<!-- Merchandise Section -->

	<section class="merchandise">
		<div class="container">
			<div class="title-merchandise" data-aos="fade-up">
				<h1>merchandise</h1>
			</div>
			<div class="row justify-content-center">
				<?php foreach ($merchandise as $mcd) : ?>
					<div class="col-md-4" data-aos="fade-up">
						<div class="card-merchandise">
							<div class="image-card" style="overflow: hidden; object-fit: cover;">
								<img src="<?= base_url() . '/upload/merchandise/' . $mcd->foto ?>" width="100%" alt="">
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="button-merchandise">
				<div class="d-md-flex d-sm-flex justify-content-center">
					<button class="btn-main me-md-3 me-sm-3" type="button">
						<a href="./pages/merchandise-page.html">order now</a>
					</button>
					<button class="btn-second" type="button">
						<a href="./pages/merchandise-page.html">all items</a>
					</button>
				</div>
			</div>
		</div>
	</section>

	<!-- Promotion Section -->

	<section class="promotion">
		<div class="box-background">
			<div class="container">
				<div class="row">
					<?php foreach ($promo as $pm) : ?>
						<div class="col-md-6" data-aos="fade-up">
							<div class="ads">
								<div class="row">
									<div class="col-5">
										<div class="image-ads" style="overflow: hidden; object-fit: cover;">
											<img src="<?= base_url() . '/upload/promo/' . $pm->foto ?>" width="250px" alt="">
										</div>
									</div>
									<div class="col-7">
										<div class="content">
											<h3><?= $pm->title ?></h3>
											<p class="title">
												<?= $pm->deskripsi ?>
											</p>
											<p class="time">
												<?= $pm->masa_promo ?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>