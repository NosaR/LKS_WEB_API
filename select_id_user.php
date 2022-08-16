<?php
$serverName = "DESKTOP-OGQRBL1\RPL_123"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.

$connectionInfo = array( "Database"=>"db_restaurant_2");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$sql = "SELECT * FROM user3";
$result = sqlsrv_query($conn, $sql);

$array["user"] = array();

    while ($row = sqlsrv_fetch_array($result)) {
        array_push($array["user"], 
        $data = array(
            'Iduser' => $row["Iduser"],
            "Namauser" => $row["Namauser"],
        ));
    }
echo json_encode($array);

?>