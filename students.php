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
            <th>Student Postcode</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["studentid"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["house"] . "</td><td>" . $row["town"] . "</td><td>" . $row["county"] . "</td><td>" . $row["country"] . "</td><td>" . $row["postcode"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No records found.";
}

$db->close();

?>
