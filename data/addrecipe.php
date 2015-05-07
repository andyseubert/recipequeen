<?php

require_once('connect.php');

if (!$conn){die ('no connection');}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
//print_r($request);

@$recipe_name = mysqli_real_escape_string($conn,($request->recipe_name));

$insertsql="INSERT INTO recipes (name) VALUES ( \"".$recipe_name."\")";

$conn->query($insertsql);

if ($conn->error) { printf ("error %s",$conn->error); }

//echo 'added '.$recipe_name;

// return recipe_id
$idsql="SELECT * FROM recipes WHERE name='".$recipe_name."'";
$recipe = $conn->query($idsql);

$rows = array();

while($row = $recipe->fetch_assoc()){
    $rows[] = $row;
}

print json_encode($rows);




?>