<?php 
// Class providing generic data access functionality
class DatabaseHandler 
{
	private static $_mHandler;

	// Prevent direct creation of object
	private function __construct() 
	{}

	// Return an initialized database handler
	private static function GetHandler() 
	{
		if (!isset(self::$_mHandler)) 
		{
			try 
			{
				self::$_mHandler = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD,
						array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY)); 
				// Configure PDO to thorw exceptions 
				self::$_mHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e)
			{
				self::Close();
				trigger_error($e->getMessage(), E_USER_ERROR);
			}
		}

		return self::$_mHandler;
	}

	// Clear the PDO class instance
	public static function Close()
	{
		self::$_mHandler = null;
	}

	// Wrapper method for PDOStatement::execute()
	public static function Execute($sqlQuery, $params = null)
	{
		try 
		{
			// Get the database handler
			$database_handler = self::GetHandler();

			// Prepare the query for execution
			$statement_handler = $database_handler->prepare($sqlQuery);

			// Execute query
			$statement_handler->execute($params);
		}
		catch (PDOException $e) 
		{
			self::Close();
			trigger_error($e->getMessage(), E_USER_ERROR);
		}
	}

	// Wrapper method for PDOStatement::fetchAll()
	public static function GetAll($sqlQuery, $params = null,
		$fetchStyle = PDO::FETCH_ASSOC)	
	{
		// Initialize the return value to null
		$result = null;

		try 
		{		
			// Get the database handler	
			$database_handler = self::GetHandler();

			// Prepare the query for execution
			$statement_handler = $database_handler->prepare($sqlQuery);

			// Execute the query
			$statement_handler->execute($params); 

			// Fetch result
			$result = $statement_handler->fetchAll($fetchStyle);
		}
		catch (PDOException $e) 
		{
			self::Close();
			trigger_error($e->getMessage(), E_USER_ERROR);
		} 

		return $result;
	}

	// Wrapper method for PDOStatement::fetch()
	public static function GetRow($sqlQuery, $params = null,
		$fetchStyle = PDO::FETCH_ASSOC)
	{
		// Initialize the return value to null
		$result = null;

		try 
		{		
			// Get the database handler	
			$database_handler = self::GetHandler();

			// Prepare the query for execution
			$statement_handler = $database_handler->prepare($sqlQuery);

			// Execute the query
			$statement_handler->execute($params); 

			// Fetch result
			$result = $statement_handler->fetch($fetchStyle);
		}
		catch (PDOException $e) 
		{
			self::Close();
			trigger_error($e->getMessage(), E_USER_ERROR);
		} 

		return $result;
	}

	// Return the first column value from a row 
	public static function GetOne($sqlQuery, $params = null) 
	{
		$result = null;

		try 
		{		
			// Get the database handler	
			$database_handler = self::GetHandler();

			// Prepare the query for execution
			$statement_handler = $database_handler->prepare($sqlQuery);

			// Execute the query
			$statement_handler->execute($params); 

			// Fetch result
			$result = $statement_handler->fetch(PDO::FETCH_NUM); 

			// Save the first value of the result
			$result = $result[0];
		}
		catch (PDOException $e) 
		{
			self::Close();
			trigger_error($e->getMessage(), E_USER_ERROR);
		} 

		return $result;
	}
}
?>