<html>
<body>
    
    <h1> Confirmation </h1>
    
</body>

</html>
<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

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
    $confirm_msg  = "Are You sure you want to delete Student - " . $studentID . "   ?";
    $confirm_msg .= "<br><br>";
    $confirm_msg .= "<form method='POST'>";
    }
  }
}
    if(!empty($_POST['students'])){
        foreach ($_POST ['students'] as $studentID) {
            $confirm_msg .= "<input type='hidden'name='students[]' value='$studentID'>";
        }
        $confirm_msg .= "<input type='submit'name='delete' value='Yes'>";
        $confirm_msg .= "&nbsp;&nbsp;&nbsp;   ";
        $confirm_msg .="<input type='button' value='No ' onclick='window.location.href=\"students.php\"'>";
        $confirm_msg .="</form>";
        echo $confirm_msg;
    }else {
        
    header("Location: students.php");
    }
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

    