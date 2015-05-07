<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
interface ProcessDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Process 
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
 	 * @param proces primary key
 	 */
	public function delete($process_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Process proces
 	 */
	public function insert($proces);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Process proces
 	 */
	public function update($proces);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProcessName($value);

	public function queryByProcessDescription($value);


	public function deleteByProcessName($value);

	public function deleteByProcessDescription($value);


}
?>