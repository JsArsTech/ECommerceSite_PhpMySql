<?php 
class StoreFront 
{
	public $mSiteUrl;
	// Define the template file for the page contents
	public $mContentsCell = 'first_page_contents.tpl';

	// Define the template file for the categories cell
	public $mCategoriesCell = 'blank.tpl';



	// Class constructor
	public function __construct()
	{
		$this->mSiteUrl = Link::Build('');
	}

	// Initialize presentation object
	public function init() 
	{
		// Load department details of visiting a department
		if (isset($_GET['DepartmentId']))
		{
			$this->mContentsCell = 'department.tpl';
			$this->mCategoriesCell = 'categories_list.tpl';
		}
	}
}
?>