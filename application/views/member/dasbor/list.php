<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>BARTER</span>-AN</h1>
									<h2>Barterin barangmu disini</h2>
									<p>Kamu punya barang bekas yang tak terpakai? atau sedang mencari barang yang kamu inginkan. Gabung aja disini!</p>
									
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url()?>assets/member/images/home/barters.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>BARTER</span>-AN</h1>
									<h2>Temukan barang yang kamu cari</h2>
									<p>Tidak perlu bersusah payah untuk mencari orang yang ingin membarterkan barangnya</p>
									
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url()?>assets/member/images/home/Discover_ICON_CIRCLE-2.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>BARTER</span>-AN</h1>
									<h2>Hanya sekali klik</h2>
									<p>Jika menemukan barang yang kamu inginkan, segeralah menawarkan barangmu untuk dibarterkan</p>
								
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url()?>assets/member/images/home/icon-3.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
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
<h4  class="panel-title">
<a href="<?php echo base_url('member/dasbor/kategori/'.$lk->id_kategori_posting)?>">
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
				
				<div class="col-sm-9 padding-right ">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Postingan Terbaru</h2>
						<?php foreach($posting as $posting){?>						
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
												<a class="btn btn-default add-to-cart" href="<?php echo base_url('member/dasbor/read/'.$posting->slug_posting) ?>"><i class="fa fa-shopping-cart"></i>Selengkapnya</a>
											</div>
										</div>
								</div>
							<div>
						</div>
			

			</div>

		</div>
<?php } ?>	
</div>
<h2>

<div>
	</section>
	
	