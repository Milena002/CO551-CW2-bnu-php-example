<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   echo template("templates/partials/header.php");

   if (isset($_GET['return'])) {
      $msg = "";
      if ($_GET['return'] == "fail") {$msg = "Login Failed. Please try again.";}
      $data['message'] = "<p>$msg</p>";
   }

   if (isset($_SESSION['id'])) {
      $data['content'] .= "<h1 class='text-center mt-5 mb-15'>Welcome to your Student dashboard.</h1></br></br>";
  
      echo template("templates/partials/nav.php");
      echo template("templates/default.php", $data);
      //$data['content'] = "<img src ='ImageFiles/student.jpg' width='400' height='230' class='mt-20 mb-20 '>";
   } else {
      echo template("templates/login.php", $data);
   }
   
   echo template("templates/partials/footer.php");

   // another test edit

?>
<img src ='ImageFiles/student.jpg' width='400' height='230' class='mx-auto d-block mt-5 mb-5'>