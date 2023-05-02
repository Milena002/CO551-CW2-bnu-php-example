<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

header("Content-type: image/jpeg");

//db connection
$db = new mysqli("localhost", "root", "", "oss-cw2");

$sql = "SELECT profileimg FROM student WHERE studentid='" .$_GET['studentid'] ."';";

$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$imagedata = $row['profileimg'];

$jpg = $row["profileimg"];

echo $jpg;

?>