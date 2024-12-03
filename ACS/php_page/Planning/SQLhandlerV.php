<?php

function executeSQLSelect($sql) {
    // Database connection information
    $serverName = "Navision-Server"; // Server name
    $connectionOptions = array(
        "Database" => "SmartTrack 3.25", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "25hpw2k30304$",      // Password
        "TrustServerCertificate" => true // Avoid error in login database
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
    $serverName = "Navision-Server"; // Server name
    $connectionOptions = array(
        "Database" => "SmartTrack 3.25", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "25hpw2k30304$",      // Password
        "TrustServerCertificate" => true // Avoid error in login database
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


