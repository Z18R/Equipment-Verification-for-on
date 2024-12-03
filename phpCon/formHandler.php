<?php
session_start();

// Initialize $error_message variable
$error_message = "";

// Include the SQL handler function
include_once 'SqlHandler.php';

// Retrieve form data
$username = $_POST["username"];
$password = $_POST["password"];

// Prepare SQL query
$sql = "SELECT * FROM Users A
        LEFT JOIN sys_Department_Inventory b ON A.Remarks = b.ID
        WHERE username = ? AND password = ?";

// Execute the SQL query
$params = array($username, $password);
$results = executeSQLQuery($sql, $params);

// Check if any rows were returned
if (!empty($results)) {
    // Retrieve the first row
    $row = $results[0];

    // Set session variables (assuming login is successful)
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $username;

    // Redirect based on user's Remarks
    switch ($row['Remarks']) {
        case '1':
            // header("Location: ../admin.php");
            echo "<script>window.location='../view/home.php';</script>";
            exit;
        case '2':
            header("Location: ../php_page/Tech.php");
            exit;
        case '3':
            header("Location: ../php_page/planning.php");
            exit;
        case '4':
            header("Location: ../php_page/engineering.php");
            exit;
        case '5':
            header("Location: ../php_page/Prod.php");
            exit;
        default:
            header("Location: ../login.php");
            exit;
    }
} else {
    // No rows returned, handle accordingly
    header("Location: ../index.php?error=no_rows");
}
?>
