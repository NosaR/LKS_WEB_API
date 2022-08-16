<?php
include "koneksi2.php";
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

    .container {
        display: flex;
        flex-direction: row;
    }

    input {
        background-color: #009879;
        color: white;
        border-radius: 5px;
        border: none;
        width: 70px;
        height: 40px;
        margin: 0 40px;
    }
</style>
<body>

<!-- EXPORT KE DALAM BENTUK EXCEL -->
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-excel.xls");
?>

<div class="container">
    
    <table class="content-table" id="myTable">
        <thead>
            <tr>
                <td>Id Menu</td>
                <td>Nama Menu</td>
                <td>Harga</td>
            </tr>
        </thead>
    
        <?php
        $sql = "SELECT * FROM menu";
        $result = sqlsrv_query($conn, $sql);
    
        while ($row = sqlsrv_fetch_array($result)) { ?>
        <tbody>
            <tr>
                <td><?php echo $row['Idmenu']; ?></td>
                <td><?php echo $row['Namamenu']; ?></td>
                <td><?php echo $row['Harga']; ?></td>
            </tr>
        </tbody>
        <?php
        }
        ?>
    </table>
</div>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>