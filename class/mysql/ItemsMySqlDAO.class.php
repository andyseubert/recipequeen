<?php
/**
 * Class that operate on table 'items'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-05-05 15:18
 */
class ItemsMySqlDAO implements ItemsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ItemsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM items WHERE item_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM items';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM items ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param item primary key
 	 */
	public function delete($item_id){
		$sql = 'DELETE FROM items WHERE item_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($item_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ItemsMySql item
 	 */
	public function insert($item){
		$sql = 'INSERT INTO items (name, description, type, unit, quantity, vendor, vendorpartno, origin, cost) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($item->name);
		$sqlQuery->set($item->description);
		$sqlQuery->set($item->type);
		$sqlQuery->set($item->unit);
		$sqlQuery->setNumber($item->quantity);
		$sqlQuery->set($item->vendor);
		$sqlQuery->set($item->vendorpartno);
		$sqlQuery->set($item->origin);
		$sqlQuery->set($item->cost);

		$id = $this->executeInsert($sqlQuery);	
		$item->itemId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ItemsMySql item
 	 */
	public function update($item){
		$sql = 'UPDATE items SET name = ?, description = ?, type = ?, unit = ?, quantity = ?, vendor = ?, vendorpartno = ?, origin = ?, cost = ? WHERE item_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($item->name);
		$sqlQuery->set($item->description);
		$sqlQuery->set($item->type);
		$sqlQuery->set($item->unit);
		$sqlQuery->setNumber($item->quantity);
		$sqlQuery->set($item->vendor);
		$sqlQuery->set($item->vendorpartno);
		$sqlQuery->set($item->origin);
		$sqlQuery->set($item->cost);

		$sqlQuery->setNumber($item->itemId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM items';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM items WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM items WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM items WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnit($value){
		$sql = 'SELECT * FROM items WHERE unit = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM items WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVendor($value){
		$sql = 'SELECT * FROM items WHERE vendor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVendorpartno($value){
		$sql = 'SELECT * FROM items WHERE vendorpartno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrigin($value){
		$sql = 'SELECT * FROM items WHERE origin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCost($value){
		$sql = 'SELECT * FROM items WHERE cost = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM items WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM items WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM items WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnit($value){
		$sql = 'DELETE FROM items WHERE unit = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM items WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVendor($value){
		$sql = 'DELETE FROM items WHERE vendor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVendorpartno($value){
		$sql = 'DELETE FROM items WHERE vendorpartno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrigin($value){
		$sql = 'DELETE FROM items WHERE origin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCost($value){
		$sql = 'DELETE FROM items WHERE cost = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ItemsMySql 
	 */
	protected function readRow($row){
		$item = new Item();
		
		$item->itemId = $row['item_id'];
		$item->name = $row['name'];
		$item->description = $row['description'];
		$item->type = $row['type'];
		$item->unit = $row['unit'];
		$item->quantity = $row['quantity'];
		$item->vendor = $row['vendor'];
		$item->vendorpartno = $row['vendorpartno'];
		$item->origin = $row['origin'];
		$item->cost = $row['cost'];

		return $item;
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
	 * @return ItemsMySql 
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