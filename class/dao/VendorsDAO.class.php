<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-05-05 15:18
 */
interface VendorsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Vendors 
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
 	 * @param vendor primary key
 	 */
	public function delete($vendor_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Vendors vendor
 	 */
	public function insert($vendor);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Vendors vendor
 	 */
	public function update($vendor);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByAddress($value);

	public function queryByAddress2($value);

	public function queryByCity($value);

	public function queryByState($value);

	public function queryByPhone($value);


	public function deleteByName($value);

	public function deleteByAddress($value);

	public function deleteByAddress2($value);

	public function deleteByCity($value);

	public function deleteByState($value);

	public function deleteByPhone($value);


}
?>