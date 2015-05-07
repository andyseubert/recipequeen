<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/InventoryItemsDAO.class.php');
	require_once('class/dto/InventoryItem.class.php');
	require_once('class/mysql/InventoryItemsMySqlDAO.class.php');
	require_once('class/mysql/ext/InventoryItemsMySqlExtDAO.class.php');
	require_once('class/dao/ItemVendorXDAO.class.php');
	require_once('class/dto/ItemVendorX.class.php');
	require_once('class/mysql/ItemVendorXMySqlDAO.class.php');
	require_once('class/mysql/ext/ItemVendorXMySqlExtDAO.class.php');
	require_once('class/dao/ItemsDAO.class.php');
	require_once('class/dto/Item.class.php');
	require_once('class/mysql/ItemsMySqlDAO.class.php');
	require_once('class/mysql/ext/ItemsMySqlExtDAO.class.php');
	require_once('class/dao/LocationsDAO.class.php');
	require_once('class/dto/Location.class.php');
	require_once('class/mysql/LocationsMySqlDAO.class.php');
	require_once('class/mysql/ext/LocationsMySqlExtDAO.class.php');
	require_once('class/dao/ProcessDAO.class.php');
	require_once('class/dto/Proces.class.php');
	require_once('class/mysql/ProcessMySqlDAO.class.php');
	require_once('class/mysql/ext/ProcessMySqlExtDAO.class.php');
	require_once('class/dao/ProductsDAO.class.php');
	require_once('class/dto/Product.class.php');
	require_once('class/mysql/ProductsMySqlDAO.class.php');
	require_once('class/mysql/ext/ProductsMySqlExtDAO.class.php');
	require_once('class/dao/RecipeItemXDAO.class.php');
	require_once('class/dto/RecipeItemX.class.php');
	require_once('class/mysql/RecipeItemXMySqlDAO.class.php');
	require_once('class/mysql/ext/RecipeItemXMySqlExtDAO.class.php');
	require_once('class/dao/RecipesDAO.class.php');
	require_once('class/dto/Recipe.class.php');
	require_once('class/mysql/RecipesMySqlDAO.class.php');
	require_once('class/mysql/ext/RecipesMySqlExtDAO.class.php');
	require_once('class/dao/VendorsDAO.class.php');
	require_once('class/dto/Vendor.class.php');
	require_once('class/mysql/VendorsMySqlDAO.class.php');
	require_once('class/mysql/ext/VendorsMySqlExtDAO.class.php');

?>