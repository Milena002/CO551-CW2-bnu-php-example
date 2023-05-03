<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

//db connection
$db = new mysqli("localhost", "root", "", "oss-cw2");

$image = $_FILES['profileimg']['tmp_name'];

$imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));
$studentid = $_POST['studentid'];

$sql = "UPDATE student SET profileimg='$imagedata' WHERE studentid='$studentid'";



mysqli_query($db, $sql);

header("location: students.php");
exit();