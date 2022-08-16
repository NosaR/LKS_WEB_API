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
	
			
			
			
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Laporan</h3>
				<div class="card-tools">
							  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default" title="Tambah guru"><i class="fas fa-plus"></i></button>
							  <a href="?p=u_guru" class="btn btn-tool" title="Import Guru"><i class="fas fa-upload"></i></a>
							 <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
										  <h4 class="modal-title">Tambah Guru </h4>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
										</div>
										<div class="modal-body">
										 <form method="POST">
										<input name="userguru" type="text" class="form-control" placeholder="Masukan User Guru"><br>
										<input name="passwordguru" type="text" class="form-control" placeholder="Masukan Password guru"><br>
										<input name="namaguru" type="text" class="form-control" placeholder="Masukan Nama Guru"><br>
										
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
					$userguru=$_POST['userguru'];
					$passwordguru=md5($_POST['passwordguru']);
					$namaguru=$_POST['namaguru'];
					$sql = "INSERT INTO `guru` (`id_guru`, `nama_guru`, `user_guru`, `password_guru`, `status_guru`) VALUES (NULL, '$namaguru', '$userguru', '$passwordguru', '1');"; 
					$result=mysqli_query($mysqli, $sql);

				}
				?>


               <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Bagian</th>
                      <th>Bulanan</th>
					  <th>Triwulan</th>
					  <th>Semester</th>
					  <th>Tahunan</th>
					  <th style="width: 100px"></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $n=1;
				   $q = mysqli_query($mysqli, "SELECT * from berkas, bagian where berkas.id_bagian=bagian.id and berkas.id_bagian='$bagian'");
											while($d = mysqli_fetch_array($q)){  
												$tipe=$d['tipe_berkas'];  
													
												?> 
                    <tr>
                      <td><?php echo $n++; ?></td>
					  <td><?php echo $d['nama_bagian']; ?></td>
                      <td><?php if($tipe=='1'){echo $d['judul_berkas'];}else{}?></td>
					  <td><?php if($tipe=='3'){echo $d['judul_berkas'];}else{}?> </td>
                      <td><?php if($tipe=='6'){echo $d['judul_berkas'];}else{}?> </td>
					  <td><?php if($tipe=='12'){echo $d['judul_berkas'];}else{}?> </td>
                      <td>
					
					   <form method="POST">
								  
				
				
								  <span class="text-muted float-right">
								  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default<?php echo $d['id_guru']; ?>" title="Edit Data"><i class="fas fa-plus"></i></button>
								  <a href="?p=akses_mapel&ig=<?php echo $d['id_guru']; ?>" class="btn btn-tool" title="Detail Siswa"><i class="fas fa-list-alt"></i></a>
								  <!--<a href="?p=t_modul&i=<?php echo $sid_mapel; ?>" class="btn btn-tool" title="Edit Modul"><i class="fas fa-pencil-alt"></i></a> -->
								  
								  <input type="hidden" name="id_guru" value="<?php echo $d['id_guru']; ?>">
								  <button type="submit" name="hapus" class="btn btn-tool" title="Hapus Kelas"><i class="fas fa-trash"></i></button>
								  
								  
								  </span></form>
									  <?php
										if(isset($_POST['hapus'])) {
											
										$id_guru = $_POST['id_guru'];
										$sql2 = "delete from akses where id_guru='$id_guru'";
										$result2=mysqli_query($mysqli, $sql2);
										$sql = "delete from guru where id_guru='$id_guru'";
										$result=mysqli_query($mysqli, $sql);

										
											}


										?>
					     <div class="modal fade" id="modal-default<?php echo $d['id_guru']; ?>">
									<div class="modal-dialog">
									  <div class="modal-content">
										<div class="modal-header">
										  <h4 class="modal-title">Ubah Data <?php echo $d['nama_guru']; ?></h4>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
										</div>
										<div class="modal-body">
										 <form method="POST">
										<input type="hidden" name="idguru" value="<?php echo $d['id_guru']; ?>">
										<input name="userguru" type="text" class="form-control"  value="<?php echo $d['user_guru']; ?>"><br>
										<input name="passwordguru" type="text" class="form-control" placeholder="Masukan Password Baru"><br>
										<input name="namaguru" type="text" class="form-control"  value="<?php echo $d['nama_guru']; ?>"><br>
										
										</div>
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
										</div>
										</form>
									  </div>
									  <!-- /.modal-content -->
									</div>
									
				</div>
					  
					   <?php
						if(isset($_POST['edit'])) {
							$idguru = $_POST['idguru'];
							$userguru=$_POST['userguru'];
							$passwordguru=md5($_POST['passwordguru']);
							$namaguru=$_POST['namaguru'];
							echo $sql = "update guru set nama_guru='$namaguru', user_guru='$userguru', password_guru='$passwordguru' where id_guru='$idguru';"; 
							$result=mysqli_query($mysqli, $sql);

						}
						?>
					  
					  
					  
					  
					  
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