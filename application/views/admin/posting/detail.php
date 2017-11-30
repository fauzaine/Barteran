<div class="clearfix"></div>
<style>
.kotak-atas {
    margin-top: 4px;
}
</style>

<!-- About Section -->

       
<p align="center"
                <big ><?php echo '<b>Author: </b>' .$posting->nama.' <b>Kategori : </b>'.$posting->nama_kategori_posting. ' <b>Status : </b>'.$posting->status_posting.'  <b>Tanggal : </b>'.$posting->tanggal; ?></big>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <p align="center"><img src="<?php echo base_url('assets/upload/image/'.$posting->gambar) ?>" alt="" width="500" height="500"></p><hr>
                        <font size ="4">    
                        <?php
                             echo '<h3>Deskripsi :</h3>'.$posting->isi;
                         ?>
        </div>
<hr>
    </a>
    </div>
