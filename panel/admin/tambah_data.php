  <?php $p = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * from admin where id='$id'")); ?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">
                Tambah data kendaraan
              </h3>
              <!-- tools box -->
            
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
			
			<?php
				if(isset($_POST['simpan'])) {
					$nopol=$_POST['nopol'];
                    $warna=$_POST['warna'];
                    $noka=$_POST['noka'];
                    $nosin=$_POST['nosin'];
                    $pemilik=$_POST['pemilik'];
                    $nomor_lp=$_POST['nomor_lp'];
                    $tempat_kejadian=$_POST['tempat_kejadian'];
                    $waktu_kejadian=$_POST['waktu_kejadian'];
                    $tempat_dilaporkan=$_POST['tempat_dilaporkan'];

                       $s="INSERT INTO `kendaraan` (`id`, `nopol`, `warna`, `noka`, `nosin`, `pemilik`, `nomor_lp`, `tempat_kejadian`, `waktu_kejadian`, `tempat_dilaporkan`) VALUES (NULL, '$nopol', '$warna', '$noka', '$nosin', '$pemilik', '$nomor_lp', '$tempat_kejadian', '$waktu_kejadian', '$tempat_dilaporkan');";	
										$query = mysqli_query($mysqli,$s );
								if($query){
									echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Data berhasil di tambahkan!.
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
			 
                <form class="form-horizontal" method='POST'>

                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">No.Pol</label>
                        <div class="col-sm-10">
                          <input name='nopol' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Warna</label>
                        <div class="col-sm-10">
                          <input name='warna' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Noka</label>
                        <div class="col-sm-10">
                          <input name='noka' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Nosin</label>
                        <div class="col-sm-10">
                          <input name='nosin' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Pemilik</label>
                        <div class="col-sm-10">
                          <input name='pemilik' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Nomor_lp</label>
                        <div class="col-sm-10">
                          <input name='nomor_lp' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Tempat Kejadian</label>
                        <div class="col-sm-10">
                          <input name='tempat_kejadian' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Waktu Kejadian</label>
                        <div class="col-sm-10">
                          <input name='waktu_kejadian' type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Tempat Dilaporkan</label>
                        <div class="col-sm-10">
                          <input name='tempat_dilaporkan' type="text" class="form-control">
                        </div>
                      </div>


                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name='simpan' class="btn btn-primary">Tambah data</button>
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