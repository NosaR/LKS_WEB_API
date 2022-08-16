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
			 
                <a href='?p=data_jenis&sb=1' class="btn btn-success">UMUM & KEUANGAN</a>
                <a href='?p=data_jenis&sb=2' class="btn btn-danger">PTIP</a>
                <a href='?p=data_jenis&sb=3' class="btn btn-warning">KEPEGAWAIAN</a>
                
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
										  <h4 class="modal-title">Tambah Jenis </h4>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
										</div>
										<div class="modal-body">	
										<form method="POST"  enctype="multipart/form-data">									
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Jenis</label>
												<input name='nama' type="text" class="form-control"  >
											</div>
											
											<div class="form-group">
												<label for="exampleInputPassword1">Laporan</label>
												<select name='laporan' class="form-control">
												<option value='bulanan'>Bulanan</option>
												<option value='triwulan'>Triwulan</option>
												<option value='semester'>Semester</option>
												<option value='tahunan'>Tahunan</option>
												</select>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Batas Waktu</label>
												<select name='batas_tgl' class="form-control">
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
												<option value='7'>7</option>
												<option value='8'>8</option>
												<option value='9'>9</option>
												<option value='10'>10</option>
												<option value='11'>11</option>
												<option value='12'>12</option>
												<option value='13'>13</option>
												<option value='14'>14</option>
												<option value='15'>15</option>
												<option value='16'>16</option>
												<option value='17'>17</option>
												<option value='18'>18</option>
												<option value='19'>19</option>
												<option value='20'>20</option>
												<option value='21'>21</option>
												<option value='22'>22</option>
												<option value='23'>23</option>
												<option value='24'>24</option>
												<option value='25'>25</option>
												<option value='26'>26</option>
												<option value='27'>27</option>
												<option value='28'>28</option>
												<option value='29'>29</option>
												<option value='30'>30</option>
												<option value='31'>31</option>

												</select>
											</div>
                                            <div class="form-group">
												<label for="exampleInputPassword1">Warna</label>
												<select name='class' class="form-control">
												<option value='default'>Abu - abu</option>
												<option value='warning'>Kuning</option>
												<option value='danger'>Merah</option>
												<option value='primary'>Biru</option>
												<option value='success'>Hijau</option>
												</select>
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
					$nama=$_POST['nama'];
					$laporan=$_POST['laporan'];
                    $class=$_POST['class'];
					$batas_tgl=$_POST['batas_tgl'];
									
				    $s="INSERT INTO `jenis` (`id`, `id_bagian`, `laporan`, `nama_jenis`,`class`,`batas_tgl`, `aktif`) VALUES (NULL, '$bg', '$laporan', '$nama',  '$class','$batas_tgl', '1');";
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
					$judul=$_POST['judul'];
					$bulan=$_POST['bulan'];
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
									
										$s="update `bulanan` set `judul_berkas`='$judul', `bulan`='$bulan', `tahun`='$tahun', `link_berkas`='$nama2',`status`='0',`waktu_unggah`=current_timestamp() where id='$idb' ";
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


               <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
					  <th>Laporan</th>
                      <th>Nama</th>
					  <th>Bagian</th>
					  <th>Batas Waktu</th>
					  <th style="width: 6%"></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $n=1;
				   $q = mysqli_query($mysqli, "SELECT * from jenis WHERE id_bagian='$_GET[sb]' and aktif='1'");
											while($d = mysqli_fetch_array($q)){  
													
												?> 
                    <tr>
                      <td><?php echo $n++; ?></td>
					  <td><?php echo $d['laporan'];?></td>
					  <td><a class="btn btn-<?php echo $d['class'];?>"><?php echo $d['nama_jenis'];?></a></td>					  
					  <td><?php echo $qd['nama_bagian'];?></td>
					  <td><?php echo $d['batas_tgl'];?></td>
                      <td>

											

					   <form method="POST">
								  
				
				
								  <span class="text-muted float-right">
								 <!-- <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default<?php echo $d['id']; ?>" title="Edit Data"><i class="fas fa-edit"></i></button>
					  -->
								  <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
								  <button type="submit" name="hapus" onclick="return confirm('Are you sure you want to Remove?');" class="btn btn-tool" title="Hapus Kelas"><i class="fas fa-trash"></i></button>
								  
								  
								  </span>
								  
								  </form>
									  <?php
										if(isset($_POST['hapus'])) {
											
										$id = $_POST['id'];
										echo $sql2 = "update jenis set aktif='0' where id='$id'";
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
											<h4 class="modal-title">Ubah Data</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											<form method="POST"  enctype="multipart/form-data">									
											<div class="form-group">
												<label for="exampleInputEmail1">Judul Laporan</label>
												<input name='idb' type="hidden" class="form-control" value='<?php echo $d['id']; ?>' >
												<input name='judul' type="text" class="form-control" value='<?php echo $d['judul_berkas']; ?>' >
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Bulan</label>
												<select name='bulan' class="form-control">
												<option value='1' <?php if($bln=='1'){echo "selected";}?>>Januari</option>
												<option value='2' <?php if($bln=='2'){echo "selected";}?>>Februari</option>
												<option value='3' <?php if($bln=='3'){echo "selected";}?>>Maret</option>
												<option value='4' <?php if($bln=='4'){echo "selected";}?>>April</option>
												<option value='5' <?php if($bln=='5'){echo "selected";}?>>Mei</option>
												<option value='6' <?php if($bln=='6'){echo "selected";}?>>Juni</option>
												<option value='7' <?php if($bln=='7'){echo "selected";}?>>Juli</option>
												<option value='8' <?php if($bln=='8'){echo "selected";}?>>Agustus</option>
												<option value='9' <?php if($bln=='9'){echo "selected";}?>>September</option>
												<option value='10' <?php if($bln=='10'){echo "selected";}?>>Oktober</option>
												<option value='11' <?php if($bln=='11'){echo "selected";}?>>November</option>
												<option value='12' <?php if($bln=='12'){echo "selected";}?>>Desember</option>
												</select>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Tahun</label>
												<input name='tahun' type="text" class="form-control" id="exampleInputPassword1" placeholder="Tahun" value='<?php echo $d['tahun']; ?>'>
											</div>
											<div class="form-group">
												<label for="exampleInputFile">Berkas Laporan</label>
												<div class="input-group">
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="file" id="exampleInputFile">
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
												
											</div>
										</div>
										
										</div>
										
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="ubah" class="btn btn-primary">Tambah</button>
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