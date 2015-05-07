<?php
/**
 * Class that operate on table 'products'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class ProductsMySqlDAO implements ProductsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProductsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM products WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM products';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM products ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param product primary key
 	 */
	public function delete($product_id){
		$sql = 'DELETE FROM products WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($product_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProductsMySql product
 	 */
	public function insert($product){
		$sql = 'INSERT INTO products (product_name, product_description, product_msrp, product_wsp) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($product->productName);
		$sqlQuery->set($product->productDescription);
		$sqlQuery->set($product->productMsrp);
		$sqlQuery->set($product->productWsp);

		$id = $this->executeInsert($sqlQuery);	
		$product->productId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProductsMySql product
 	 */
	public function update($product){
		$sql = 'UPDATE products SET product_name = ?, product_description = ?, product_msrp = ?, product_wsp = ? WHERE product_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($product->productName);
		$sqlQuery->set($product->productDescription);
		$sqlQuery->set($product->productMsrp);
		$sqlQuery->set($product->productWsp);

		$sqlQuery->setNumber($product->productId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM products';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProductName($value){
		$sql = 'SELECT * FROM products WHERE product_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductDescription($value){
		$sql = 'SELECT * FROM products WHERE product_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductMsrp($value){
		$sql = 'SELECT * FROM products WHERE product_msrp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductWsp($value){
		$sql = 'SELECT * FROM products WHERE product_wsp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProductName($value){
		$sql = 'DELETE FROM products WHERE product_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductDescription($value){
		$sql = 'DELETE FROM products WHERE product_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductMsrp($value){
		$sql = 'DELETE FROM products WHERE product_msrp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductWsp($value){
		$sql = 'DELETE FROM products WHERE product_wsp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProductsMySql 
	 */
	protected function readRow($row){
		$product = new Product();
		
		$product->productId = $row['product_id'];
		$product->productName = $row['product_name'];
		$product->productDescription = $row['product_description'];
		$product->productMsrp = $row['product_msrp'];
		$product->productWsp = $row['product_wsp'];

		return $product;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ProductsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>