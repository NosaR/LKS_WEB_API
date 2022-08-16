<?php
	ob_start();
// Create database connection using config file
include_once("../koneksi.php");
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Berkas DIgital | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">



<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
   
      <a href="" class="h1">Administrator</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan masukan username dan password anda</p>

      <?php
 if(isset($_POST['login'])){
 $username =  htmlspecialchars($_POST['username']);
 $password = md5(htmlspecialchars($_POST['password']));
 //$bagian = $_POST['bagian'];
 
	$sql="select * from admin where username='".$username."' AND password='".$password."'";
    $result=mysqli_query($mysqli, $sql);
    $num_rows=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if($num_rows>0){ 
	session_start();
    $_SESSION["id"]=$row['id'];
    $_SESSION["nama"]=$row['nama'];
    
		echo "<script>location='index.php';</script>";
    } else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:0;">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      User atau Password Salah.
                                  </div> <br>';
    }

}
?>

      <form method="post">
        <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
          <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
