<?php 

class Catalog 
{
	// Retrieves all departments
	public static function GetDepartments() 
	{
		// Build SQL query
		$sql = 'CALL catalog_get_departments_list()';

		return DatabaseHandler::GetAll($sql);
	}
}
?>