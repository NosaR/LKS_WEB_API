  <?php $p = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * from admin where id='$id'")); ?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
       
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                Data Profil Administrator
              </h3>
              <!-- tools box -->
            
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
			
			<?php
				if(isset($_POST['simpan'])) {
					$username=$_POST['username'];
					$nama=$_POST['nama'];
					$password=md5($_POST['password']);

						
                    if(empty($_POST['password'])) {
                       $s="update admin set username='$username', nama='$nama' where id='$id'";
                    }else{
                        $s="update admin set username='$username', nama='$nama', password='$password' where id='$id'";
                    }
										
										$query = mysqli_query($mysqli,$s );
								if($query){
									echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													berhasil di perbaharui!.
												</div>';
								}else{
									echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:0;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Oh Tidak! GAGAL .
												</div>';
								}

                            }
						?>

			
			<div class="card-body">
			
                <p>Silahkan perbaharui profil anda di bawah ini :</p>
                
                <form class="form-horizontal" method='POST'>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input name='nama' type="text" class="form-control" id="inputName" placeholder="Name" value='<?php echo $p['nama'];?>'>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input name='username' type="text" class="form-control" id="inputUsername"  value='<?php echo $p['username'];?>'>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input name='password' type="password" class="form-control" id="inputName2" placeholder="Kosongkan jika tidak ingin merubah Password">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name='simpan' class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                </a>
                
              </div>

              
			
			
          </div>
        </div>
        <!-- /.col-->
      </div>

      
      <!-- ./row -->
    </section>