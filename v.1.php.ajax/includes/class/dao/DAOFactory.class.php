<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return InventoryItemsDAO
	 */
	public static function getInventoryItemsDAO(){
		return new InventoryItemsMySqlExtDAO();
	}

	/**
	 * @return ItemVendorXDAO
	 */
	public static function getItemVendorXDAO(){
		return new ItemVendorXMySqlExtDAO();
	}

	/**
	 * @return ItemsDAO
	 */
	public static function getItemsDAO(){
		return new ItemsMySqlExtDAO();
	}

	/**
	 * @return LocationsDAO
	 */
	public static function getLocationsDAO(){
		return new LocationsMySqlExtDAO();
	}

	/**
	 * @return ProcessDAO
	 */
	public static function getProcessDAO(){
		return new ProcessMySqlExtDAO();
	}

	/**
	 * @return ProductsDAO
	 */
	public static function getProductsDAO(){
		return new ProductsMySqlExtDAO();
	}

	/**
	 * @return RecipeItemXDAO
	 */
	public static function getRecipeItemXDAO(){
		return new RecipeItemXMySqlExtDAO();
	}

	/**
	 * @return RecipesDAO
	 */
	public static function getRecipesDAO(){
		return new RecipesMySqlExtDAO();
	}

	/**
	 * @return VendorsDAO
	 */
	public static function getVendorsDAO(){
		return new VendorsMySqlExtDAO();
	}


}
?>