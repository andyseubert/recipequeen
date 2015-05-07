<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
interface ItemVendorXDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ItemVendorX 
	 */
	public function load($itemId, $vendorId);

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
 	 * @param itemVendorX primary key
 	 */
	public function delete($itemId, $vendorId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ItemVendorX itemVendorX
 	 */
	public function insert($itemVendorX);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ItemVendorX itemVendorX
 	 */
	public function update($itemVendorX);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPrice($value);

	public function queryByPartNumber($value);

	public function queryByItemName($value);


	public function deleteByPrice($value);

	public function deleteByPartNumber($value);

	public function deleteByItemName($value);


}
?>