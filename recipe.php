<?php
include('head.html');
require_once('connect.php');
?>

    
<div class="container-fluid">
    
    <div id="recipe"><br>
    	<form id="recipename" >
    		Recipe: <input type="text" list="recipes" id="recipe_name" name="recipe_name" placeholder="recipe name" value="" />
		<datalist id="recipes">
		<?php
		$recipes = $conn->query("select distinct name from recipes");
		while($row = $recipes->fetch_assoc()){
                  echo '<option>'.$row['name'];
              } ?>
		</datalist>
    		Description: <input type="text" name="description" placeholder="recipe description" value="">
		
	<input type="button" onClick="addRecipe()" value="Add Recipe">
    	</form>
	
	<input type="button" onClick="loadRecipe()" value="Select This Recipe">
    </div>
<div id="response"></div>


<hr/>

<div class="edit" id="itemadder">
<form name="additemtorecipe">
    <select name="item_name" id="item_name" onchange="selectItem()">
	<option ></option>
	<?php
	$items = $conn->query("select * from items");
	while($row = $items->fetch_assoc()){
	  echo '<option value="'.$row['item_id']. '">' .$row['name']. '</option>';
      } ?>
    </select>
                
</form>
</div>
<div id="additemresult">...</div>

<center><h2>items</h2></center>
<div id="itemlist">
    items from chosen recipe will display here
</div>


</div>
</body>
</html>

