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
                                    <a  href="<?php echo base_url('member/dasbor/kategori/'.$lk->id_kategori_posting)?>">
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
                        <h2><?php echo $posting->judul ?></h2>
                 <hr>
                <big><b>Author :</b>
              <?php echo  $posting->nama ?></a>
                <?php echo ' <b>Kategori : </b>'.$posting->nama_kategori_posting.' <b>Kota : </b>'.$posting->kota.'  <b>Status : </b>'.$posting->status_posting.' <b>Tanggal : </b>'.$posting->tanggal; ?></big>
                
                <hr>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <p align="center"><img src="<?php echo base_url('assets/upload/image/'.$posting->gambar) ?>" alt="" width="500" height="500"><hr>
            
            <?php if($posting->status_posting=="Sold"){ echo '<h3 align="center">Barang Tidak Tersedia</h3>';
            }else{ 
            if($this->session->userdata('id_user')!=$posting->id_user){ ?><hr><div align="center"><a href="<?php echo base_url('member/pesan/tambah/'.$posting->id_posting) ?>" class="btn btn-success btn-lg"> Lakukan Penawaran Barter</a></div><?php }} ?>   
            </p><hr>
             <font size ="4">           
            <?php
                echo '<h3>Deskripsi :</h3>'.$posting->isi;
            ?></font>
            </div>

            </div><!--/.row-->
            <hr>                                            
                        
    </section>
    
 