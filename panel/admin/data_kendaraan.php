<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
			
<section class="content">
      <div class="container-fluid">
        <div class="row">
		
          <div class="col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-list"></i>
                  Data Kendaraan
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  <div class="modal fade" id="modal-default">
									<div class="modal-dialog">
									  <div class="modal-content">
										<div class="modal-header">
										  <h4 class="modal-title">Tambah Pengguna </h4>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
										</div>
										<div class="modal-body">	
										<form method="POST"  enctype="multipart/form-data">									
											<div class="form-group">
												<label for="exampleInputEmail1">Username</label>
												<input name='username' type="text" class="form-control"  >
											</div>
                                            <div class="form-group">
												<label for="exampleInputEmail1">NIP</label>
												<input name='nip' type="text" class="form-control"  >
											</div>

                                            <div class="form-group">
												<label for="exampleInputEmail1">Nama</label>
												<input name='nama' type="text" class="form-control"  >
											</div>

                                            <div class="form-group">
												<label for="exampleInputEmail1">Password</label>
												<input name='password' type="password" class="form-control"  >
											</div>
											
										
										</div>
										
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
										</div>
										</form>
									  </div>
									  <!-- /.modal-content -->
									</div>
									
				</div>
				<?php
				if(isset($_POST['tambah'])) {
                    $username=$_POST['username'];
					$nama=$_POST['nama'];
                    $nip=$_POST['nip'];
					$password=md5($_POST['password']);
                    
									
				    $s="INSERT INTO `user` (`id`, `nama`, `nip`, `username`, `password`, `bagian`, `aktif`) VALUES (NULL, '$nama', '$nip', '$username', '$password', '$_GET[sb]', '1');";
									$query = mysqli_query($mysqli,$s );
								if($query){
									echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Berhasil!.
												</div>';
								}else{
									echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:0;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Oh Tidak! GAGAL.
												</div>';
						        }
                            }
						?>



			<?php
				if(isset($_POST['ubah'])) {
                    $idu=$_POST['idu'];
                    $nopol=$_POST['nopol'];
                    $warna=$_POST['warna'];
                    $noka=$_POST['noka'];
                    $nosin=$_POST['nosin'];
                    $pemilik=$_POST['pemilik'];
                    $nomor_lp=$_POST['nomor_lp'];
                    $tempat_kejadian=$_POST['tempat_kejadian'];
                    $waktu_kejadian=$_POST['waktu_kejadian'];
                    $tempat_dilaporkan=$_POST['tempat_dilaporkan'];					
									
								$s="UPDATE `kendaraan` SET `nopol` = '$nopol', `warna` = '$warna', `noka` = '$noka', `nosin` = '$nosin', `pemilik` = '$pemilik', `nomor_lp` = '$nomor_lp', `tempat_kejadian` = '$tempat_kejadian', `waktu_kejadian` = '$waktu_kejadian', `tempat_dilaporkan` = '$tempat_dilaporkan' WHERE `kendaraan`.`id` = '$idu';";
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


               <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
					  <th>No.Pol</th>
                      <th>Nama Pemilik</th>
					  <th>Tahun</th>
					  <th style="width: 10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $n=1;
				   $q = mysqli_query($mysqli, "SELECT * from kendaraan where sampah=0");
											while($d = mysqli_fetch_array($q)){  
													
												?> 
                    <tr>
                      <td><?php echo $n++; ?></td>
					  <td><?php echo $d['nopol'];?></td>
					  <td><?php echo $d['pemilik'];?></td>
                      <td><?php echo $d['nomor_lp'];?></td>
                      <td>

											

					   <form method="POST">
								  
				
				
								  <span class="text-muted float-right">
                                 <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default<?php echo $d['id']; ?>" title="Edit Data"><i class="fas fa-edit"></i></button>
					  
								  <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
								  <button type="submit" name="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-tool" title="Hapus Kelas"><i class="fas fa-trash"></i></button>
								  
								  
								  </span>
								  
								  </form>
									  <?php
										if(isset($_POST['hapus'])) {
											
										$id = $_POST['id'];
										$sql2 = "update kendaraan set sampah='1' where id='$id'";
										$result2=mysqli_query($mysqli, $sql2);
                                        header("Refresh:0");
										
											}


										?>
					    
									  <!-- /.modal-content -->
									</div>
									
				</div>
				
                <div class="modal fade" id="modal-default<?php echo $d['id']; ?>">
										<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											<h4 class="modal-title">Lihat Data Kendaraan</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											<form method="POST"  enctype="multipart/form-data">									
											<div class="form-group">
												<label for="exampleInputEmail1">No.Pol</label>
												<input name='idu' type="hidden" class="form-control" value='<?php echo $d['id']; ?>' >
												<input name='nopol' type="text" class="form-control" value='<?php echo $d['nopol']; ?>' >
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Warna </label>
												<input name='warna' type="text" class="form-control" value='<?php echo $d['warna']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Noka </label>
												<input name='noka' type="text" class="form-control" value='<?php echo $d['noka']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Nosin </label>
												<input name='nosin' type="text" class="form-control" value='<?php echo $d['nosin']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Pemilik </label>
												<input name='pemilik' type="text" class="form-control" value='<?php echo $d['pemilik']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Nomor LP </label>
												<input name='nomor_lp' type="text" class="form-control" value='<?php echo $d['nomor_lp']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Tempat Kejadian </label>
												<input name='tempat_kejadian' type="text" class="form-control" value='<?php echo $d['tempat_kejadian']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Waktu Kejadian </label>
												<input name='waktu_kejadian' type="text" class="form-control" value='<?php echo $d['waktu_kejadian']; ?>' >
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Tempat Dilaporkan </label>
												<input name='tempat_dilaporkan' type="text" class="form-control" value='<?php echo $d['tempat_dilaporkan']; ?>' >
											</div>
											
										
										</div>
										
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="ubah" class="btn btn-primary">Update data</button>
										</div>
										</form>
										</div>
										<!-- /.modal-content -->
				</div>

                                
				
				
					  
					  
					  </td>
                    </tr>
					<?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>