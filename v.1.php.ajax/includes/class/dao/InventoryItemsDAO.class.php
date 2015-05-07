<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
interface InventoryItemsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return InventoryItems 
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
 	 * @param inventoryItem primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InventoryItems inventoryItem
 	 */
	public function insert($inventoryItem);
	
	/**
 	 * Update record in table
 	 *
 	 * @param InventoryItems inventoryItem
 	 */
	public function update($inventoryItem);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByDescription($value);


	public function deleteByName($value);

	public function deleteByDescription($value);


}
?>