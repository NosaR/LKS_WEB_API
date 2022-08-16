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
			  <?php 
				  $n=1;
				   $m = mysqli_query($mysqli, "SELECT * from jenis where id_bagian='$bg' and laporan='tahunan' and aktif='1'");
											while($n = mysqli_fetch_array($m)){  
												?>
                <a href='?p=data_laporan_tahunan&sb=<?php echo $bg;?>&jb=<?php echo $n['id'];?>' style="margin-bottom: 10px;" class="btn btn-<?php echo $n['class'];?>">
				<?php echo $n['nama_jenis'];?>
                </a>
                
                <?php } ?>
                <div class="text-muted mt-3">
                  Pilih salah satu jenis laporan di atas
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Laporan tahunan</h3>
				<div class="card-tools">
							
							</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
				


			<?php
				if(isset($_POST['uddbah'])) {
					$judul=$_POST['judul'];
					$tahunan=$_POST['tahunan'];
					$tahun=$_POST['tahun'];
					$idb=$_POST['idb'];

						
						$ekstensi_diperbolehkan	= array('pdf', 'png', 'jpeg', 'ppt', 'pptx', 'xlsx', 'xls', 'doc', 'docx', 'jpg'); 
						$nama = $_FILES['file']['name'];
						$x = explode('.', $nama);
						$ekstensi = strtolower(end($x));
						$ukuran	= $_FILES['file']['size'];
						$file_tmp = $_FILES['file']['tmp_name'];	

						function generate_uuid() {
						return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
						mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
						mt_rand( 0, 0xffff ),
						mt_rand( 0, 0x0fff ) | 0x4000,
						mt_rand( 0, 0x3fff ) | 0x8000,
						mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
						);
						}

						$randomUUID = generate_uuid();
						$nama2 = $randomUUID."-".$nama;

						if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
							if($ukuran < 6000000){
							
								move_uploaded_file($file_tmp, 'berkas/'.$nama2);
									
										$s="update `tahunan` set `judul_berkas`='$judul', `tahunan`='$tahunan', `tahun`='$tahun', `link_berkas`='$nama2',`status`='0',`waktu_unggah`=current_timestamp() where id='$idb' ";
										//$s="update tugas set file_tugas='$nama', waktu_kumpul=current_timestamp() where id_siswa='$id_siswa' and id_kelas='$id_kelas' and id_mapel='$id_mapel';";
										$query = mysqli_query($mysqli,$s );
								if($query){
									echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													File laporan berhasil di perbaharui!.
												</div>';
								}else{
									echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:0;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Oh Tidak! GAGAL Mengupload Modul.
												</div>';
								}
							}else{
								echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:0;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Oh Tidak! UKURAN FILE TERLALU BESAR.
												</div>';
							}
						}else{
							echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:0;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													Oh Tidak! EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN.
												</div>';
						}
						}
						?>

<?php if(empty($_GET['jb'])){}else{?>
               <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Judul</th>
					  <th>Petugas</th>
					  <th>Laporan</th>
					  <th>Bagian</th>
					  <th>Tahun</th>
					  <th style="width: 10%">Nama File</th>
					  <th>Waktu</th>
					  <th>Status</th>
					  <th style="width: 6%"></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $n=1;
				  $q = mysqli_query($mysqli, "SELECT tahunan.*,bagian.nama_bagian,user.nama,jenis.nama_jenis from tahunan, bagian, user, jenis where tahunan.id_bagian=bagian.id and tahunan.id_jenis = jenis.id and tahunan.id_bagian='$bg' and tahunan.id_jenis='$jb' and tahunan.id_user=user.id and tahunan.aktif='1'");
				  while($d = mysqli_fetch_array($q)){  
												$status=$d['status'];
												$bln=$d['tahun'];
												$alasan=$d['alasan'];  
												  
													
												?> 
                    <tr>
                      <td><?php echo $n++; ?></td>
					  <td><?php echo $d['judul_berkas']; ?></td>
					  <td><?php echo $d['nama']; ?></td>
					  <td><?php echo $d['nama_jenis']; ?></td>
					  <td><?php echo $d['nama_bagian']; ?></td>
					  <td><?php echo $d['tahun'];?> </td>
                      <td><a href='berkas/<?php echo $d['link_berkas'];?>' class="btn btn-success btn-block btn-sm"><i class="fa fa-download"></i> unduh berkas</a> </td>
					  <td><?php echo $d['waktu_unggah'];?> </td>
					  <td width='5%'>
					  <?php 
					  if($status==0){echo '<span class="badge badge-warning">Menunggu</span>';}
					  elseif($status==1){echo '<span class="badge badge-success">Diterima</span>';}
					  elseif($status==2){echo '<span class="badge badge-danger" title="'.$alasan.'">Ditolak</span>';}
					  ?>
					  </td>
                      <td>
					
								  
				
				
								 <center>
								  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default<?php echo $d['id']; ?>" title="Edit Data"><i class="fas fa-edit"></i></button>
												</center>
									  <?php
										if(isset($_POST['ubah'])) {
											
										$id = $_POST['idb'];
										$status = $_POST['status'];
										$alasan = $_POST['alasan'];
										$sql2 = "update tahunan set status='$status', alasan='$alasan' where id='$id'";
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
											<h4 class="modal-title">Verifikasi Data</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											<form method="POST"  enctype="multipart/form-data">									
											<div class="form-group">
												<label for="exampleInputEmail1">Judul Laporan</label>
												<input name='idb' type="hidden" class="form-control" value='<?php echo $d['id']; ?>' >
												<input name='judul' type="text" class="form-control" value='<?php echo $d['judul_berkas']; ?>' disabled >
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">tahunan</label>
												<select name='tahunan' class="form-control" disabled>
												<option value='1' <?php if($bln=='1'){echo "selected";}?>>1</option>
												<option value='2' <?php if($bln=='2'){echo "selected";}?>>2</option>
												<option value='3' <?php if($bln=='3'){echo "selected";}?>>3</option>
												<option value='4' <?php if($bln=='4'){echo "selected";}?>>4</option>
												</select>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Tahun</label>
												<input name='tahun' type="text" class="form-control" id="exampleInputPassword1" placeholder="Tahun" value='<?php echo $d['tahun']; ?>' disabled>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Status</label>
												<select name='status' class="form-control">
												<option value=''>- Pilih Status -</option>
												<option value='1' >Setujui & Terima</option>
												<option value='2' >Tolak </option>
												</select>
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Alasan</label>
												<textarea name='alasan' class="form-control" rows="3" placeholder="Alasan ..."></textarea>
											</div>
										
										</div>
										
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="ubah" class="btn btn-success">Varifiksi</button>
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
				<?php } ?>
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