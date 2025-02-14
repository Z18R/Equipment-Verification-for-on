<?php
session_start();

// Check if the user is not logged in or is not an admin
if (!isset($_SESSION["loggedin"])) {
    // Redirect the user to the login page or another appropriate page
    header("Location: ../index.php");
    exit;
}

// Include the SQL handler file
require_once 'SQLhandlerV.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../../images/LOGO.png" type="image/png">
    <link rel="stylesheet" href="../../styles/defaultCss.css">
    <link rel="stylesheet" href="../../styles.css">
    <section>
        <nav class="navbar navbar-expand-xl bg-dark navbar-dark p-2 fixed-top ">
        <span class="ml-5"></span><span href="#" class="navbar-brand"><img src="../../images/LOGO.png" alt="" style="width: 50px; height: 50px;"><span class="mr-2"></span>CENTRAL SYSTEMS - Self Support System</span>
            
    </section>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vishay Shipdate Updater</title>
    <link rel="stylesheet" href="../styles.css">
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include jQuery UI Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Include jQuery UI Datepicker JS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            font-size: 11px;
        }
        .update-form {
            display: flex;
            align-items: flex-end;
        }

        .update-form .form-group {
            margin-bottom: 0;
            margin-right: 10px;
        }

        .update-form .btn-update {
            margin-top: 5px;
        }

        .container {
            margin-top: 2%;
        }

        .footer {
            font-size: smaller;
            padding-top: 5px; /* Adjust the top padding as needed */
            padding-bottom: 5px; /* Adjust the bottom padding as needed */
        }

        .table-responsive {
            padding-bottom: 20px;
        }

        span {
            color: #fe5800;
            font-weight: bold;
            font-size: 30px;
            text-transform: uppercase;
            font-style: italic;
        }

        .div-container {
            font-size: 15px;
        }

        .button {
            display: inline-block;
            padding: 3px 15px;
            background-color: #f0f0f0;
            color: #000000;
            text-decoration: none;
            border: 0.15em solid #000000;
            cursor: pointer;
            border-radius: 5px; /* Optional: Add rounded corners */
            margin: 0 auto;
        }

        button:hover {
            background-color: #fe5800;
        }

        a.button {
            display: inline-block;
            padding: 3px 15px;
            background-color: #f0f0f0;
            color: #000000;
            text-decoration: none;
            border: 0.15em solid #000000;
            cursor: pointer;
            border-radius: 5px; /* Optional: Add rounded corners */
        }

        a.button:hover {
            background-color: #fe5800;
        }

        .Cfooter {
            margin-left: 80%;
        }

        @media only screen and (max-width: 1920px) {
            body {
                margin-top: 45px;
                padding-bottom: 3.74rem;
            }

            .AtecWebsite {
                margin: auto 50px;
            }

            .Cfooter {
                margin-left: 81%;
            }
        }

        @media only screen and (max-width: 1224px) {
            body {
                margin-top: 45px;
                padding-bottom: 3.74rem;
            }

            .AtecWebsite {
                margin: auto 50px;
            }

            .Cfooter {
                margin-left: 73%;
            }
        }

        /* Responsive styles */
        @media only screen and (max-width: 768px) {
            body {
                margin-top: 45px;
                padding-bottom: 4.74rem;
            }

            .AtecWebsite {
                margin: auto 50px;
            }

            .navbar-brand {
                font-size: 25px;
            }

            span {
                font-size: 25px;
            }

            .Cfooter {
                margin-left: 63%;
            }

        }

    </style>
</head>
<body>

<?php
// Display the lot number filter form with Bootstrap styling
echo "<div class='container mt-0'>";
echo "<form action='' method='post'>";
echo "<div class='form-group'>";
echo "<label for='lotnumber'>PoNumber:</label>";
echo "<input type='text' class='form-control' id='PoNumber' name='PoNumber'>";
echo "</div>";
echo "<div class='form-group'>";
echo "<label for='dateformat'>Date Format (e.g., Y-m-d):</label>";
echo "<input type='text' class='form-control' id='dateformat' name='dateformat' value='Y-m-d'>";
echo "</div>";
echo "<div class='form-group'>"; // Add a form field for datecode
echo "</div>";
echo "<button type='submit' class='btn button' name='submitFilter'>Filter</button>";
echo "<span class='ml-5'></span>";
echo "<button type='button' class='btn button' id='loadContent' name='submithelp'>Help</button>";
echo "</form>";
echo "</div>";

// Handle lot number filter submission
if (isset($_POST['submitFilter'])) {
    $PoNumberFilter = $_POST['PoNumber'];
    $dateFormat = $_POST['dateformat'];
    
    $sqlSelect = "SELECT TOP 20 ID, PO_ID, PONumber, Attention, Address, CreatedDate, ShippedDate, Type 
    FROM Vishay_Packing_List_Header
    WHERE Ponumber like '%$PoNumberFilter%'
    ORDER BY ID DESC";
    
    // Execute select query
    $data = executeSQLSelect($sqlSelect);
    
    // Display results with Bootstrap table styling
    if (!empty($data)) {
        echo "<div class='container'>";
        echo "<h2>Filtered Results</h2>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        // echo "<th>ID</th>";
        echo "<th>PO_ID</th>";
        echo "<th>PO Number</th>";
        echo "<th>Attention</th>";
        echo "<th>Address</th>";
        echo "<th>Created Date</th>";
        echo "<th>Shipped Date</th>";
        echo "<th>Type</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

//         foreach ($data as $row) {
//             // Convert the ShippedDate to the specified format if it's not null
//             // $formattedDate = $row['ShippedDate'] ? $row['ShippedDate']->format($dateFormat) : 'N/A';
//             $formattedDate = $row['ShippedDate']->format($dateFormat);

        
//             echo "<tr>";
//             echo "<td>" . $row['ID'] . "</td>";
//             echo "<td>" . $row['PO_ID'] . "</td>";
//             echo "<td>" . $row['PONumber'] . "</td>";
//             echo "<td>" . $row['Attention'] . "</td>";
//             echo "<td>" . $row['Address'] . "</td>";
//             echo "<td>" . $formattedDate . "</td>";
//             echo "<td>" . ($row['ShippedDate'] ? $row['ShippedDate']->format($dateFormat) : 'N/A') . "</td>";
//             echo "<td>" . $row['Type'] . "</td>";
//             echo "<td>";
//             echo "<input type='hidden' name='dateformat' value='" . $dateFormat . "'>";
//             echo "<div class='form-group'>";
//             echo "<input type='text' class='form-control' id='newdatecode' name='newdatecode' placeholder='New Shipped Date'>";
//             echo "</div>";
//             echo "<button type='submit' class='btn button btn-update' name='submitUpdate'>Update</button>";
//             echo "</form>";
//             echo "</td>";
//             echo "</tr>";
//         }
        
//         echo "</tbody>";
//         echo "</table>";
//         echo "</div>";
//         echo "</div>";
//         } else {
//             echo "<div class='container'>";
//             echo "<div class='alert alert-warning'>No records found.</div>";
//             echo "</div>";
//         }
        
//        // Handle update action
// if (isset($_POST['submitUpdate'])) {
//     $PoNumberUpdate = $_POST['PoNumber'];
//     $newDateCode = $_POST['ShippedDate'];

//     // Construct the SQL update query to update the datecode
//     $sqlUpdate = "UPDATE Vishay_Packing_List_Header 
//     SET ShippedDate = '$newDateCode' 
//     WHERE PoNumber = '$PoNumberUpdate'";
    
//     // Execute the update query
//     executeSQLUpdate($sqlUpdate);
// }

foreach ($data as $row) {
    // Convert the ShippedDate to the specified format if it's not null
    $formattedDate = $row['ShippedDate'] ? $row['ShippedDate']->format('Y-m-d H:i:s.v') : 'N/A';
    echo "<tr>";
    // echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['PO_ID'] . "</td>";
    echo "<td>" . $row['PONumber'] . "</td>";
    echo "<td>" . $row['Attention'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . $formattedDate . "</td>";
    echo "<td>" . $formattedDate . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>";
    echo "<form class='update-form' action='' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['ID'] . "'>";
    echo "<input type='hidden' name='PoNumber' value='" . $row['PONumber'] . "'>";
    echo "<input type='hidden' name='dateformat' value='" . $dateFormat . "'>";
    echo "<div class='form-group'>";
    echo "<input type='text' class='form-control' id='newdatecode' name='newdatecode' placeholder='New Shipped Date'>";
    echo "</div>";
    echo "<button type='submit' class='btn button btn-update' name='submitUpdate'>Update</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
} else {
    echo "<div class='container'>";
    echo "<div class='alert alert-warning'>No records found.</div>";
    echo "</div>";
}
}

// Handle update action
if (isset($_POST['submitUpdate'])) {
    $PoNumberUpdate = $_POST['PoNumber'];
    $newDateCode = $_POST['newdatecode'];

    // Construct the SQL update query to update the datecode
    $sqlUpdate = "UPDATE Vishay_Packing_List_Header 
    SET ShippedDate = '$newDateCode' 
    WHERE PoNumber like '%$PoNumberUpdate%'";
    
    // Execute the update query
    executeSQLUpdate($sqlUpdate);
}


        
?>

<div id="ajaxContent"></div>

<script src="js/scriptTSC.js"></script>
<footer class="footer bg-dark text-white fixed-bottom">
    <div class="container-sm">
        <p>Copyright © Automated Technology (Phil.), Inc</p>
        <p>IT Development Team 2024</p>
    </div>
</footer>
</body>
</html>
