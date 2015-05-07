<?php
// update item if passed in the stuff -- need the item_id with the other stuff

require_once('connect.php');
//{'item_id':item_id,'column':item_column,'value':new_value}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
print_r($request);

@$item_id = mysqli_real_escape_string($conn,($request->item_id));
@$column = mysqli_real_escape_string($conn,($request->column));
@$value = mysqli_real_escape_string($conn,($request->value));

printf("item id: $item_id\n");
printf("column name: $column\n");
printf("new value: $value\n");

if ($item_id < 1000000){
printf("update items set $column = '$value' where item_id = $item_id ");
    $sql="update items set $column = '$value' where item_id = $item_id ";
    $conn->query($sql);

}else{ // then add the item
   $sql = "insert into items ($column), values ($value) ";
   $conn->query($sql);
   if ($conn->error){ printf($conn->error); }
}

?>