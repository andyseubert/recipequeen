<?php
/**
 * Class that operate on table 'recipes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class RecipesMySqlDAO implements RecipesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RecipesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM recipes WHERE recipe_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM recipes';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM recipes ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param recipe primary key
 	 */
	public function delete($recipe_id){
		$sql = 'DELETE FROM recipes WHERE recipe_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recipe_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RecipesMySql recipe
 	 */
	public function insert($recipe){
		$sql = 'INSERT INTO recipes (name, description) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($recipe->name);
		$sqlQuery->set($recipe->description);

		$id = $this->executeInsert($sqlQuery);	
		$recipe->recipeId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RecipesMySql recipe
 	 */
	public function update($recipe){
		$sql = 'UPDATE recipes SET name = ?, description = ? WHERE recipe_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($recipe->name);
		$sqlQuery->set($recipe->description);

		$sqlQuery->setNumber($recipe->recipeId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM recipes';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM recipes WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM recipes WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM recipes WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM recipes WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RecipesMySql 
	 */
	protected function readRow($row){
		$recipe = new Recipe();
		
		$recipe->recipeId = $row['recipe_id'];
		$recipe->name = $row['name'];
		$recipe->description = $row['description'];

		return $recipe;
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
	 * @return RecipesMySql 
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