<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <?php $bg=$_GET['sb'];	?>
			
			
			
<section class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Jenis Laporan
                </h3>
              </div>
              <div class="card-body">
			 
                <a href='?p=pengguna&sb=1' class="btn btn-success">UMUM & KEUANGAN</a>
                <a href='?p=pengguna&sb=2' class="btn btn-danger">PTIP</a>
                <a href='?p=pengguna&sb=3' class="btn btn-warning">KEPEGAWAIAN</a>
                
                <div class="text-muted mt-3">
                  Pilih salah satu jenis laporan di atas
                 
                </div>
              </div>
              <!-- /.card -->
            </div>

           
          </div>
          <div class="col-md-12">

		  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Jenis Laporan <?php $qd=mysqli_fetch_array(mysqli_query($mysqli, "SELECT * from bagian where id='$bg'"));echo $qd['nama_bagian']; 	?> </h3>
				<div class="card-tools">
							  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default" title="Tambah Laporan"><i class="fas fa-plus"></i></button>
							 <!-- <a href="?p=u_guru" class="btn btn-tool" title="Import Guru"><i class="fas fa-upload"></i></a>
							  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
							  </button>
							  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
							  </button> -->
							</div>
						
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
					$username=$_POST['username'];
					$nama=$_POST['nama'];
					$password=md5($_POST['password']);
					$idu=$_POST['idu'];

						
					
									
										$s="update user set username='$username', nama='$nama', password='$password' where id='$idu'";
										//$s="update tugas set file_tugas='$nama', waktu_kumpul=current_timestamp() where id_siswa='$id_siswa' and id_kelas='$id_kelas' and id_mapel='$id_mapel';";
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
					  <th>NIP</th>
                      <th>Username</th>
					  <th>Nama</th>
					  <th style="width: 6%"></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $n=1;
				   $q = mysqli_query($mysqli, "SELECT * from user WHERE bagian='$_GET[sb]' and aktif='1'");
											while($d = mysqli_fetch_array($q)){  
													
												?> 
                    <tr>
                      <td><?php echo $n++; ?></td>
					  <td><?php echo $d['nip'];?></td>
					  <td><?php echo $d['username'];?></td>
                      <td><?php echo $d['nama'];?></td>
                      <td>

											

					   <form method="POST">
								  
				
				
								  <span class="text-muted float-right">
								  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default<?php echo $d['id']; ?>" title="Edit Data"><i class="fas fa-edit"></i></button>
					  
								  <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
								  <button type="submit" name="hapus" onclick="return confirm('Are you sure you want to Remove?');" class="btn btn-tool" title="Hapus Kelas"><i class="fas fa-trash"></i></button>
								  
								  
								  </span>
								  
								  </form>
									  <?php
										if(isset($_POST['hapus'])) {
											
										$id = $_POST['id'];
										echo $sql2 = "update user set aktif='0' where id='$id'";
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
											<h4 class="modal-title">Ubah Data Pengguna</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											<form method="POST"  enctype="multipart/form-data">									
											<div class="form-group">
												<label for="exampleInputEmail1">Username</label>
												<input name='idu' type="hidden" class="form-control" value='<?php echo $d['id']; ?>' >
												<input name='username' type="text" class="form-control" value='<?php echo $d['username']; ?>' >
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Nama </label>
												<input name='nama' type="text" class="form-control" id="exampleInputPassword1" placeholder="nama" value='<?php echo $d['nama']; ?>'>
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Password </label>
												<input name='password' type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukan password baru" >
											</div>
											
										
										</div>
										
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="ubah" class="btn btn-primary">Ubah data</button>
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