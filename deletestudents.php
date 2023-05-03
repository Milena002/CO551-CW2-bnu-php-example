
<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
echo template("templates/partials/header.php");
echo template("templates/partials/nav.php");

if (isset($_SESSION['id'])){

  if (isset($_POST['delete']) && !empty($_POST['students'])) {

    // foreach loop needed for looping all the students and deleting the students if wanted
    //then searching for particular student id and deleting that using sql query 'delete'
    foreach($_POST['students'] as $studentID){

    $sql = "DELETE FROM student WHERE studentid = '$studentID'";
    // running actual query
    $result = mysqli_query($conn,$sql);

    }
    //location to the students - previous page
    header("Location:students.php");

   
  } else {
    foreach($_POST['students'] as $studentID){
      $confirm_msg = " <h1> Confirmation </h1>";
      $confirm_msg .= "<div class='text-center d-flex justify-content-center'>";
      $confirm_msg  = "<h4 class=' mt-5 text-center'> Are You sure you want to delete Student - " . $studentID . "   ?</h4>";
    $confirm_msg .= "<br><br>";
    $confirm_msg .= "<form method='POST'>";
    }
  }
}
    if(!empty($_POST['students'])){
        foreach ($_POST ['students'] as $studentID) {
            $confirm_msg .= "<input type='hidden'name='students[]' value='$studentID'>";
        }
        $confirm_msg .= "<center>";
        $confirm_msg .= "<input type='submit'name='delete' value=' Yes ' class='btn btn-success'>";
        $confirm_msg .= "&nbsp;&nbsp;&nbsp;   ";
        $confirm_msg .="<input type='button' value=' No ' class='btn btn-danger' onclick='window.location.href=\"students.php\"'>";
        $confirm_msg .="</form>";
        $confirm_msg .= "</center>";
        $confirm_msg .= "</div>";
        echo $confirm_msg;
    }else {
        
    header("Location: students.php");
    }
    echo template("templates/partials/footer.php");
?>

<script>
        function showConfirm() {
         confirm_msg = "Are You sure you want to delete this Student ?";
        if (confirm(confirm_msg)) {
          document.forms[0].submit();
        }
    }
    </script>

<script>

    