<html>
<body>
    
    <h1> University Students: </h1>
    
</body>

</html>
<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

//db connection
   $db = new mysqli("localhost", "root", "", "oss-cw2");


// Retrieve all the records from the student table
$sql = "SELECT studentid, firstname, lastname, dob, house, town, county, country, postcode FROM student";
$result = $db->query($sql);

// Display the records in an HTML table

echo"<form action='deletestudents.php' method='POST' onsubmit='return checkForm(this)'>";
if ($result->num_rows > 0) {
  echo "<table border=1; height=40%; width=80%>";
  echo "<tr><th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>House</th>
            <th>Town</th>
            <th>County</th>
            <th>Country</th>
            <th>Postcode</th>
            <th> X </th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>". $row["studentid"] . "</td>
    <td>". $row["firstname"] . "</td>
    <td>". $row["lastname"] . "</td>
    <td>" . $row["dob"] . "</td>
    <td>" . $row["house"] . "</td>
    <td>". $row["town"] . "</td>
    <td>". $row["county"] . "</td>
    <td>". $row["country"] . "</td>
    <td>". $row["postcode"] . "</td>
    <td> <input type = 'checkbox' name='students[]' value='$row[studentid]' </td></tr>";
  }
  echo "</table>";
  echo "<br>";
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<input type='button' value=' Back to Dashboard' onclick='window.location.href=\"index.php\"'>";
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<input type='submit' name='deletebtn' value='Delete'/>";
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<input type='button' value='Add New Student' onclick='window.location.href=\"addstudent2.php\"'>";
  echo"</form>";
} else {
  echo "No records found.";
}

$db->close();

?>

<script>
function checkForm(form) {
    // Check if at least one checkbox is selected
    var checkboxes = form.elements['students[]'];
    var checkboxChecked = false;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxChecked = true;
            break;
        }
    }
    if (!checkboxChecked) {
        alert('Please select at least one student to delete.');
        return false;
    }
    return true;
}
</script>
