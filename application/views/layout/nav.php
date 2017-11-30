		<div class="header-middle"><!--header-middle-->
			
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/member/images/home/logo3.png')  ?>" alt="" /></a>
						</div>
					
					</div>
					<div class="col-sm-9">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							
							
								<li><a href="<?php echo base_url('login')?>"><i class="fa fa-sign-out"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	

		<footer id="footer"><!--Footer-->
			
		
				
				
		<!--header-bottom-->
		<div class="container">
                    <?php 
				//echo validation_errors();
				echo form_open_multipart('dasbor/search');  
				?>
				<div class="row center">
					<div class="col-sm-9">
						
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
					 <form method="get" action="<?php echo base_url("dasbor/search/")?>">
					<div class="col-sm-4">
						<div>
                         <input type="text" name="cari" class="form-control" placeholder="Cari Barang disini"/>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
							<select class="form-control"  name="nama_kategori_posting" placeholder="Kategori">
								<option value="3">Otomotif</option>
								<option value="4">Mainan</option>
								<option value="7">Makanan</option>
								<option value="8">Pakaian</option>
								<option value="9">Elektronik</option>
								<option value="10">Interior</option>
								<option value="12">Tas</option>
								<option value="13">Sepatu</option>
								<option value="14">Lainnya</option>
							</select>
						
					</div>
				</div>

				<div class="col-sm-1">
						<div>
							<input type="submit" name="submit" class="btn btn-warning" value="Cari">
						</div>
					</div>
				</div>
				<hr>
			
		<!--/header-bottom-->
	</header><!--/header-->