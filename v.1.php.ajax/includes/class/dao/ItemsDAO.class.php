<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
interface ItemsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Items 
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
 	 * @param item primary key
 	 */
	public function delete($item_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Items item
 	 */
	public function insert($item);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Items item
 	 */
	public function update($item);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByDescription($value);

	public function queryByType($value);

	public function queryByUnit($value);

	public function queryByQuantity($value);

	public function queryByVendor($value);

	public function queryByVendorpartno($value);

	public function queryByOrigin($value);

	public function queryByCost($value);


	public function deleteByName($value);

	public function deleteByDescription($value);

	public function deleteByType($value);

	public function deleteByUnit($value);

	public function deleteByQuantity($value);

	public function deleteByVendor($value);

	public function deleteByVendorpartno($value);

	public function deleteByOrigin($value);

	public function deleteByCost($value);


}
?>