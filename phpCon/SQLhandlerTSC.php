<?php

function executeSQLSelect($sql) {
    // Database connection information
    $serverName = "MSDynamics-DB\AXDB"; // Server name
    $connectionOptions = array(
        "Database" => "MES_ATEC", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "p@ssw0rd",        // Password
        "TrustServerCertificate" => true
    );

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // Check connection
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Execute the select query
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        // Fetch and return results
        $data = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Clean up statement and close connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

function executeSQLUpdate($sql) {
    // Database connection information
    $serverName = "MSDynamics-DB\AXDB"; // Server name
    $connectionOptions = array(
        "Database" => "MES_ATEC", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "p@ssw0rd",        // Password
        "TrustServerCertificate" => true
    );

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // Check connection
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Execute the update query
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "<br>";
        echo "<div class='container'><div class='alert alert-success'>Update executed successfully</div></div>";
    }

    // Clean up statement and close connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}