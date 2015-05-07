<?php

require_once('connect.php');

if (!$conn){die ('no connection');}

$name = mysqli_real_escape_string($conn,($_POST['name']));
$description = mysqli_real_escape_string($conn,($_POST['description']));

$insertsql="INSERT INTO recipes (name,description) VALUES ( \"".$name."\",\"".$description."\" )";

$conn->query($insertsql);

if ($conn->error) { printf ("error %s",$conn->error); }

echo 'added '.$name.'<br/>';	



?>