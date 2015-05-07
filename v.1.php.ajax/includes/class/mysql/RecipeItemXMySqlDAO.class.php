<?php
/**
 * Class that operate on table 'recipe_item_x'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class RecipeItemXMySqlDAO implements RecipeItemXDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RecipeItemXMySql 
	 */
	public function load($recipeId, $itemId){
		$sql = 'SELECT * FROM recipe_item_x WHERE recipe_id = ?  AND item_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recipeId);
		$sqlQuery->setNumber($itemId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM recipe_item_x';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM recipe_item_x ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param recipeItemX primary key
 	 */
	public function delete($recipeId, $itemId){
		$sql = 'DELETE FROM recipe_item_x WHERE recipe_id = ?  AND item_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recipeId);
		$sqlQuery->setNumber($itemId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RecipeItemXMySql recipeItemX
 	 */
	public function insert($recipeItemX){
		$sql = 'INSERT INTO recipe_item_x (amount, recipe_id, item_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($recipeItemX->amount);

		
		$sqlQuery->setNumber($recipeItemX->recipeId);

		$sqlQuery->setNumber($recipeItemX->itemId);

		$this->executeInsert($sqlQuery);	
		//$recipeItemX->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RecipeItemXMySql recipeItemX
 	 */
	public function update($recipeItemX){
		$sql = 'UPDATE recipe_item_x SET amount = ? WHERE recipe_id = ?  AND item_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($recipeItemX->amount);

		
		$sqlQuery->setNumber($recipeItemX->recipeId);

		$sqlQuery->setNumber($recipeItemX->itemId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM recipe_item_x';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAmount($value){
		$sql = 'SELECT * FROM recipe_item_x WHERE amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAmount($value){
		$sql = 'DELETE FROM recipe_item_x WHERE amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RecipeItemXMySql 
	 */
	protected function readRow($row){
		$recipeItemX = new RecipeItemX();
		
		$recipeItemX->recipeId = $row['recipe_id'];
		$recipeItemX->itemId = $row['item_id'];
		$recipeItemX->amount = $row['amount'];

		return $recipeItemX;
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
	 * @return RecipeItemXMySql 
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