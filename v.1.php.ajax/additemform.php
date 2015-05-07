<?php
	//DAO is PITA
	require_once('connect.php');
?>
<form name="items" id="items" action="javascript:addItem();" >
<table  class="table table-condensed">
    <tr>
        <th>Item Name</th>
        <th>Vendor</th>
        <th>Vendor Part</th>
        <th>type</th>
        <th>cost per unit</th>
        <th>unit</th>
        <th>QTY</th>
        <th>origin</th>
        <th>description</th>
    </tr>
<tr>
  <td><input type="text" name="name" placeholder="item name"></td>
  
  <td>
    <input type=text list=vendors name="vendor" placeholder="vendor">
  <datalist id="vendors" > <!-- change to select -->
       <?php
              $vendorsql="select distinct vendor from items";
              $vendors = $conn->query($vendorsql);
              while($row = $vendors->fetch_assoc()){
                  echo '<option>'.$row['vendor'];
              }
        ?>
  </datalist>
  </td>

   <td><input type="text" name="vendorpartno" placeholder="vendor part no."></td>
   
   <td>
    <input type=text list=types name="type" placeholder="type">
  <datalist id=types >
       <?php
              $typessql="select distinct type from items";
              $types = $conn->query($typessql);
              while($row = $types->fetch_assoc()){
                  echo '<option>'.$row['type'];
              }
          ?>
  </datalist>
  </td>
   
   <td><input type="text" name="cost" placeholder="cost" size="6" > </td>
   <td>
    <input type="text" list="units" name="unit" placeholder="units" size="12" >
    <datalist id="units">
       <?php
              $unitssql="select distinct unit from items";
              $units = $conn->query($unitssql);
              while($row = $units->fetch_assoc()){
                  echo '<option>'.$row['unit'];
              }
          ?>
    </datalist>
   </td>
   <td><input type="text" name="quantity" placeholder="QTY" size="8"></td>
   
   <td>
    <input type="text" list="origins" name="origin" placeholder="origin" size="8" value = "" >
    <datalist id="origins">
       <?php
              $originssql="select distinct origin from items";
              $origins = $conn->query($originssql);
              while($row = $origins->fetch_assoc()){
                  echo '<option>'.$row['origin'];
              }
          ?>
    </datalist>
   </td>
   
   
   <td><input type="text" name="description" placeholder="description"  value = ""></td>
</div>
</tr>
<tr>
<td colspan=4><input type="button" onClick="addItem()" value="Add Item"></td>
</tr>
</table>
</form>
 