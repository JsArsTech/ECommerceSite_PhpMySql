<?php 
class Link 
{
	public static function Build($link) 
	{
		// $base = 'http://' . getenv('SERVER_NAME');

		if (isset($_SERVER['HTTP_HOST'])) 
		{
			$base = 'http://' . $_SERVER['HTTP_HOST'];
		}
		
		// If HTTP_SERVER_PORT is defined and different than default
		if (defined('HTTP_SEVER_PORT') && HTTP_SERVER_PORT != '80')
		{
			// Append server port
			$base .= ':' . HTTP_SERVER_PORT;
		}

		$link = $base . VIRTUAL_LOCATION . $link;

		// Escape html
		return htmlspecialchars($link, ENT_QUOTES);
	}

	public static function ToDepartment($departmentId)
	{
		$link = 'index.php?DepartmentId=' . $departmentId;

		return self::Build($link);
	}
}
?>