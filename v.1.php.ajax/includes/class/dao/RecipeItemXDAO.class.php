<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
interface RecipeItemXDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RecipeItemX 
	 */
	public function load($recipeId, $itemId);

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
 	 * @param recipeItemX primary key
 	 */
	public function delete($recipeId, $itemId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RecipeItemX recipeItemX
 	 */
	public function insert($recipeItemX);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RecipeItemX recipeItemX
 	 */
	public function update($recipeItemX);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAmount($value);


	public function deleteByAmount($value);


}
?>