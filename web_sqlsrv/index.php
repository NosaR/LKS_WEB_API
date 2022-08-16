<?php
//MEMANGGIL KONEKSI
include "koneksi2.php";

if (isset($_POST['submit']) == true) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <title>Daftar Menu</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        width: 100%;
        min-height: 100vh;
        background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(bg.jpg);
        background-position: center;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-table {
        width: 1000px;
        min-height: 1000px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,.3);
        padding: 10px 30px;
        display: flex;
        flex-direction: column;    
    }

    .content-table {
        border-collapse: collapse;
        font-size: 0.9em;
        min-width: 300px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .content-table th, 
    .content-table td {
        padding: 12px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .btn-export, 
    .btn-logout {
        background-color: #009879;
        color: white;
        border-radius: 5px;
        border: none;
        width: 100px;
        height: 40px;
        margin: 10px 0 20px 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    a {
        text-decoration: none;
        color: white;
    }
</style>
<body>

<div class="container-table">

    <h2>Dafar Menu</h2>
    <!-- TOMBOL UNTUK EXPORT TABLE KE EXCEL -->
    <div class="input-button">
        <button class="btn-export" onclick="window.open('export-excel.php')">Export Excel</button>
        <button class="btn-logout" name="submit"><a href="login.php">Log Out</a></button>
    </div>
    
    <!-- TABLE DATA -->
    <table class="content-table" id="myTable">

        <!-- HEADER TABLE -->
        <thead>
            <tr>
                <td>Id Menu</td>
                <td>Nama Menu</td>
                <td>Harga</td>
            </tr>
        </thead>
    
        <!-- MENAMPILKAN DATA DARI DATABASE -->
        <?php
        $sql = "SELECT * FROM menu";
        $result = sqlsrv_query($conn, $sql);
    
        // JIKA HANYA MENAMPILKAN DATA, TIDAK PERLU MENGGUNAKAN WHILE
        while ($row = sqlsrv_fetch_array($result)) { ?>
        <tbody>
            <tr>
                <td><?php echo $row['Idmenu']; ?></td>
                <td><?php echo $row['Namamenu']; ?></td>
                <td><?php echo $row['Harga']; ?></td>
            </tr>
        </tbody>

        <!-- UNTUK MENUTUP TAG TABLE AGAR DATA DAPAT MUNCUL -->
        <?php
        }
        ?>
    </table>
</div>
</body>
</html>