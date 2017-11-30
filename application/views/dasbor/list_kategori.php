<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
                       <?php foreach($listing_kategori as $lk){?>
                       <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
                       <a  href="<?php echo base_url('dasbor/kategori/'.$lk->id_kategori_posting)?>">
						<span class="badge pull-right"></span>
											<?php echo $lk->nama_kategori_posting ?>
										</a>
									</h4>
								</div>
								
							</div>
							<?php
                                                    }
                                                        ?>
						</div><!--/category-products-->				
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Postingan Terbaru</h2>
						<?php foreach($kategori as $posting){?>						
						<div class="col-sm-4">
						
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('assets/upload/image/thumbs/'.$posting->gambar) ?>" width="268" height="249">
											<h4><?php echo $posting->judul ?></h4>
											<p><?php echo $posting->isi ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Selengkapnya</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<p><b><?php echo $posting->judul ?><b></p>
												<p><?php echo $posting->isi ?></p>
												<a class="btn btn-default add-to-cart" href="<?php echo base_url('dasbor/read/'.$posting->slug_posting) ?>"><i class="fa fa-shopping-cart"></i>Selengkapnya</a>
											</div>
										</div>
								</div>
							<div>
						</div>
			

			</div>

		</div>
<?php } ?>	
	</section>
	
	