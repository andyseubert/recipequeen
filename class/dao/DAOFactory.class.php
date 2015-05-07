<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
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