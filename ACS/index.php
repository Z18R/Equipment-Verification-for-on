<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/LOGO.ico" type="image/png">
    <title>ATEC Central System - Default</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/defaultCss.css">
    <style>
      a strong{
        font-size:15px;
      }
      li a {
        font-size:16px
      }
    .card {
        height: 100%; 
    }

    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        cursor: pointer; 
    }

    .card:hover .card-img { 
        opacity: 0.8; 
    }

    .card-img {
        width: 100%; 
        height: 200px; 
        object-fit: cover; 
        transition: opacity 0.3s; 
    }


    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atec Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/defaultCss.css">
</head>
<body>
<section>
    <nav class="navbar navbar-expand-xl bg-dark navbar-dark p-1 fixed-top">
        <!-- <span href="#" class="navbar-brand"><span>ATEC </span>CENTRAL SYSTEMS</span> -->
        <span class="ml-5"></span><span href="#" class="navbar-brand"><img src="images/LOGO.png" alt="" style="width: 90px; height: 90px;"><span class="mr-2"></span>CENTRAL SYSTEMS</span>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <a class="nav-link go-back text-white" href="../login.php"><strong>LOGIN</strong></a>
            </li>
        </ul>
    </nav>
</section>

<!-- ATEC E-LOGSHEET (LIVE) -->

<!-- <div class="AtecWebsite">
    <h5>ATEC E-LOGSHEET (LIVE)</h5>
  <nav>
    <ul>
      <li><a href="http://192.168.1.66:408/Account/Login.aspx" id="Prod" target="_blank" rel="noopener noreferrer">E-LOGSHEET</a></li>
      <li><a href="#" target="_blank" rel="noopener noreferrer">E-LOGSHEET (Full Access)</a></li>  
    </ul>
    </div>
  </nav> -->

<!-- ATEC WEBMES (LIVE) -->

    <!-- <div class="AtecWebsite">
    <h5>ATEC WEBMES (LIVE)</h5>
  <nav>
    <ul>
      <li><a href="http://192.168.5.9:400" id="Prod" target="_blank" rel="noopener noreferrer">WEBMES PROD</a></li>
    </ul>
    </div>
  </nav> -->
  
<!-- ATEC WEBMES SUPPORT -->

    <!-- <div class="AtecWebsite">
    <h5>ATEC WEBMES SUPPORT</h5>
  <nav>
    <ul>
      <li><a href="http://192.168.5.12:200" target="_blank" rel="noopener noreferrer">WEBMES SUPPORT</a></li>
    </ul>
    </div>
  </nav> -->


<!-- ATEC CONNECTIVITY SYSTEMS WebMES -->

<!-- <div class="AtecWebsite">
  <h5>ATEC CONNECTIVITY SYSTEMS</h5>
<nav>
  <ul>
    <li><a href=" http://192.168.101.68:400/" target="_blank" rel="noopener noreferrer">WEBMES</a></li>
    <li><a href="http://192.168.101.68:100/Login.aspx?" target="_blank" rel="noopener noreferrer">KITTING APP</a></li>
    <li><a href="http://192.168.101.68:400/" target="_blank" rel="noopener noreferrer">CONNECTIVITY PORTAL</a></li>
  </ul>
  </div>
</nav> -->


<div class="AtecWebsite">
    <?php
    // Include the SQL handler function
    include_once 'phpCon/SqlHandler.php';

    // Example SQL query
    $sql = "[dbo].[sys_Default]";

    // Execute the SQL query
    $results = executeSQLQuery($sql);
    ?>
    <div class="container mt-1">
    <div class="row">
    <?php
  foreach ($results as $row) {

    echo "<div class='col-md-6 col-lg-4 mb-4 mt-3'>";
    echo "<div class='card'>";
    echo "<div class='col-md-6 col-lg-4 mb-4 mt-3'>";
    if (!empty($row['Department_image'])) {
      echo "<img src='" . $row['Department_image'] . "' alt='Hello Image'>";
  } else {
      echo "no image";
      continue;
  }
    echo "</div>";
    echo "<div class='card-body' style='height: 150px;'>";
    echo "<h5 class='card-title'>{$row['Title']}</h5>";
    echo "<ul class='list-unstyled'>";
    
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