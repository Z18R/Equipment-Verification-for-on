<?php
session_start();

// Check if the user is not logged in or is not an admin
if (!isset($_SESSION["loggedin"])) {
    // Redirect the user to the login page or another appropriate page
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/LOGO.ico" type="image/png">
    <title>Planning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/defaultCss.css">
    <style>
        li a{
            font-size: 16px;
        }
    </style>

</head>
<section>
    <nav class="navbar navbar-expand-xl bg-dark navbar-dark p-1 fixed-top">
        <!-- <span href="#" class="navbar-brand"><span>ATEC </span>CENTRAL SYSTEMS</span> -->
        <span class="ml-5"></span><span href="#" class="navbar-brand"><img src="../images/LOGO.png" alt="" style="width: 90px; height: 90px;"><span class="mr-2"></span>CENTRAL SYSTEMS</span>
        <p class="text-white">Hi <?php echo $_SESSION["username"]; ?></p>
        <ul class="navbar-nav ml-auto">
         <li class="nav-item mr-3">
                <a class="nav-link go-back text-white" href="../login.php"><strong>Go Back</strong></a>
            </li>
        </ul>
    </nav>
</section>  

<div class="AtecWebsite">
    <?php
    // Include the SQL handler function
    include_once '../phpCon/SqlHandler.php';

    // Example SQL query
    $sql = "[dbo].[sys_Planning]";

    // Execute the SQL query
    $results = executeSQLQuery($sql);
    ?>
    <div class="container mt-5">
    <div class="row">
    <?php
    foreach ($results as $row) {
        echo "<div class='col-md-6 col-lg-4 mb-4'>";
        echo "<div class='card'>";
        echo "<div class='card-body' style='height: 150px;'>";
        echo "<h5 class='card-title'>{$row['Title']}</h5>";
        echo "<ul class='list-unstyled'>";

        // Check if redirect_link1 exists and is not null
        if (!empty($row['redirect_link1'])) {
            echo "<li><a href='" . $row['redirect_link1'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link1'] . "</a></li>";
        }

        if (!empty($row['redirect_link2'])) {
            echo "<li><a href='" . $row['redirect_link2'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link2'] . "</a></li>";
        }

        if (!empty($row['redirect_link3'])) {
            echo "<li><a href='" . $row['redirect_link3'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link3'] . "</a></li>";
        }

        if (!empty($row['redirect_link4'])) {
            echo "<li><a href='" . $row['redirect_link4'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link4'] . "</a></li>";
        }
        echo "</ul>";
        echo "</div>"; // Close card-body div
        echo "</div>"; // Close card div
        echo "</div>"; // Close col div
    }
    ?>
    </div> 
</div> 


<!-- Footer -->
<footer class="footer bg-dark text-white p-1 fixed-bottom">
    <div class="container Cfooter">
        <p>Copyright © Automated Technology (Phil.), Inc</p>
        <p>IT Development Team 2024</p>
    </div>
</footer>
    <script src="script.js"></script>
</body>
</html>
</body>
</html>