<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
interface ProductsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Products 
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
 	 * @param product primary key
 	 */
	public function delete($product_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Products product
 	 */
	public function insert($product);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Products product
 	 */
	public function update($product);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProductName($value);

	public function queryByProductDescription($value);

	public function queryByProductMsrp($value);

	public function queryByProductWsp($value);


	public function deleteByProductName($value);

	public function deleteByProductDescription($value);

	public function deleteByProductMsrp($value);

	public function deleteByProductWsp($value);


}
?>