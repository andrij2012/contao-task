<?php

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;

/**
 * Class ModuleMaterials
 */
class ModuleMaterials extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_materials';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if(TL_MODE == 'BE')
		{
			$objTemplates = new \BackendTemplate('be_wildcard');

			$objTemplates->wildcard = '### MATERIALS LIST ###';
			$objTemplates->title = $this->headline;
			$objTemplates->id = $this->id;
			$objTemplates->link = $this->name;
			$objTemplates->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplates->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		/**
		 * Add the CSS
		 */
		$GLOBALS['TL_CSS'][] = 'assets/css/mod_materials.css';

		/**
		 * Add JavaScript document
		 */
		$GLOBALS['TL_JAVASCRIPT'][] = 'assets/js/mod_materials.js';

		/**
		 * Get category ID
		 * @status - must be fixed
		 */ 
		$intCategory  = ($this->Input->get('category')) ? $this->Input->get('category') : 1;
		$arrMaterials = array();

		/**
		 * Database query
		 */
		$objMaterials 	= $this->Database->prepare("SELECT * FROM tl_materials WHERE pid=? ORDER BY title")->execute($intCategory);
		$objCategory  	= $this->Database->prepare("SELECT * FROM tl_materials_category WHERE id=?")->execute($intCategory);
		$objCategories  = $this->Database->execute("SELECT id, title FROM tl_materials_category ORDER BY title");
		
		while($objMaterials->next())
		{
			$arrMaterials[] = array
			(
				'title' => $objMaterials->title,
				'image' => $objMaterials->image,
				'src'   => $objMaterials->src
			);
		}

		while($objCategories->next())
		{
			$arrCategories[] = array
			(
				'id' 		=> $objCategories->id,
				'title'		=> $objCategories->title,
				'singleSRC' => $objCategories->singleSRC,
				'selected' 	=> $blnSelected
			);
		}


		/**
		 * Registrate arrays in Template
		 * @status - must be fixed
		 */
		$this->Template->materials     = $arrMaterials;
		$this->Template->categories    = $arrCategories;
		$this->Template->categoryTitle = $objCategory->title;
		$this->Template->categoryImage = $objCategory->singleSRC;
	}
}