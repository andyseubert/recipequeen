<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-05-05 15:18
 */
interface RecipesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Recipes 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param recipe primary key
 	 */
	public function delete($recipe_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Recipes recipe
 	 */
	public function insert($recipe);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Recipes recipe
 	 */
	public function update($recipe);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByDescription($value);

	public function queryByRecipeCost($value);

	public function queryByRecipeSize($value);

	public function queryByRecipeUnits($value);


	public function deleteByName($value);

	public function deleteByDescription($value);

	public function deleteByRecipeCost($value);

	public function deleteByRecipeSize($value);

	public function deleteByRecipeUnits($value);


}
?>