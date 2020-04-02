<?php 
class ProductsList
{
	// Public variables to be read from Smarty template
	public $mPage = 1;
	public $mrTotalPages;
	public $mLinkToNextPage;
	public $mLinkToPreviousPage;
	public $mProducts;

	// Private members
	private $_mDepartmentId;
	private $_mCategoryId;

	// Class constructor
	public function __construct()
	{
		// Get DepartmentId from query string casting it to int
		if (isset($_GET['DepartmentId']))
		{
			$this->_mDepartmentId = (int)$_GET['DepartmentId'];
		}

		// Get CategoryId from query string casting it to int
		if (isset($_GET['CategoryId']))
		{
			$this->_mCategoryId = (int)$_GET['CategoryId'];
		}

		// Get Page number from query string casting it to int
		if (isset($_GET['Page']))
		{
			$this->mPage = (int)$_GET['Page'];
		}

		if ($this->mPage < 1)
		{
			trigger_error('Incorrect Page value');
		}

		// Save page request for continue shopping functionality 
		if (array_key_exists('QUERY_STRING', $_SERVER)) 
		{
			$_SESSION['link_to_continue_shopping'] = $_SERVER['QUERY_STRING'];
		}		

	}

	public function init()
	{
		/* If browsing a category, get the list of products by calling the GetProductsInCategory() bussiness tier method */

		if (isset($this->_mCategoryId))
		{
			$this->mProducts = Catalog::GetProductsInCategory($this->_mCategoryId, $this->mPage, $this->mrTotalPages);
			/* If browsing a department, get the list of products by calling the GetProductsOnDepartment()  business tier method */			
		}
		elseif (isset($this->_mDepartmentId)) 
		{
			$this->mProducts = Catalog::GetProductsOnDepartment($this->_mDepartmentId, $this->mPage, $this->mrTotalPages);
			/* If browsing the first page, get the list of products by calling the GetProductsOnCatalog() business tier method*/
		}
		else 
		{
			$this->mProducts = Catalog::GetProductsOnCatalog($this->mPage, $this->mrTotalPages);
		}

		/* If there are subpages of products, display navigation controls */
		if ($this->mrTotalPages > 1)
		{
			// Build the Next Link
			if ($this->mPage < $this->mrTotalPages)
			{
				if (isset($this->_mCategoryId))
				{
					$this->mLinkToNextPage = 
						Link::ToCategory($this->_mDepartmentId, $this->_mCategoryId, $this->mPage + 1);					
				}
				elseif (isset($this->_mDepartmentId))
				{
					$this->mLinkToNextPage =
						Link::ToDepartment($this->_mDepartmentId, $this->mPage + 1);
				}
				else 
				{
					$this->mLinkToNextPage = Link::ToIndex($this->mPage + 1);
				}
			}

			// Build the Previous Link
			if ($this->mPage > 1)
			{
				if (isset($this->_mCategoryId))
				{
					$this->mLinkToPreviousPage =
						Link::ToCategory($this->_mDepartmentId, $this->_mCategoryId, $this->mPage - 1);
				}
				elseif (isset($this->_mDepartmentId)) 
				{
					$this->mLinkToPreviousPage =
						Link::ToDepartment($this->_mDepartmentId, $this->mPage - 1);
				}
				else 
				{
					$this->mLinkToNextPage = Link::ToIndex($this->mPage - 1);
				}
			}
		}

		// Build links for product details page
		for ($i = 0; $i < count($this->mProducts); $i++)
		{
			$this->mProducts[$i]['link_to_product'] =
				Link::ToProduct($this->mProducts[$i]['product_id']);

			if ($this->mProducts[$i]['thumbnail'])
			{
				$this->mProducts[$i]['thumbnail'] =
					Link::Build('product_images/' . $this->mProducts[$i]['thumbnail']);
			}

			$this->mProducts[$i]['attributes'] =
				Catalog::GetProductAttributes($this->mProducts[$i]['product_id']);
		}
	}
}
?>