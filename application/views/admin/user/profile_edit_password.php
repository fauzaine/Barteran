 <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                   
                    </div>
               
                  	</header>
					<?php
					echo validation_errors('<div class="alert alert-warning">','</div>');

					if(isset($error)){
						echo '<div class="alert alert-warning">';
						echo $error;
						echo '</div>';
					}

					echo form_open_multipart(base_url('admin/user/profile_edit_password/'.$user->id_user));
					?>							
					<div class="col-md-6">
					<div class="form-group">
						<label><br/>Masukkan Password Lama Anda</label>
						<input type="password" name="password_lama" class="form-control" >
					</div>
					
					<div class="form-group">
						<label><br/>Password Baru</label>
						<input type="password" name="password" class="form-control" >
					</div>
					<div class="form-group">
						<label>Konfirmasi Password Baru</label>
						<input type="password" name="password2" class="form-control">
					</div>	
					<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
					</div>				
				</div>							
					<?php form_close()?>
                </div>
              </div>
            </div><!-- /.row -->