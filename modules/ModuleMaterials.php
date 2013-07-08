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

		else
		{
			$file = \Input::get('file', true);

			// Send the file to the browser and do not send a 404 header (see #4632)
			if ($file != '')
			{
				$this->sendFileToBrowser($file);
				exit;
			}
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		/**
		 * Add the CSSs
		 */
		$GLOBALS['TL_CSS'][] = 'system/modules/materials/assets/css/mod_materials.css';

		/**
		 * Add JavaScripts document
		 */
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/materials/assets/js/mod_materials.js';

		/**
		 * Data arrays
		 */ 
		$arrayDocuments = array();
		$arrayCategory 	= array();

		/**
		 * Database query
		 */
		$objDocuments = $this->Database->prepare("SELECT * FROM tl_materials")->execute();
		$objCategory = $this->Database->prepare("SELECT * FROM tl_materials_category")->execute();

		while($objDocuments->next())
		{
			$arrayDocuments[] = array
			(
				'id'			=> $objDocuments->id,
				'pid'			=> $objDocuments->pid,
				'tstamp'		=> $objDocuments->tstamp,
				'title'			=> $objDocuments->title,
				'image'			=> \FilesModel::findByPk($objDocuments->image)->path,
				'src'			=> $_SERVER['PHP_SELF'] .'?file=' . \FilesModel::findByPk($objDocuments->src)->path,
				'size'			=> \Contao\System::getReadableSize(filesize(TL_ROOT . '/' . \FilesModel::findByPk($objDocuments->src)->path))
			);
		}

		
		while($objCategory->next())
		{
			$arrayCategory[] = array
			(
				'id'		=> $objCategory->id,
				'tstamp'	=> $objCategory->tstamp,
				'title'		=> $objCategory->title,
				'singleSRC'	=> $objCategory->singleSRC
			);
		}

		/**
		 * Registrate arrays in Template
		 */
		$this->Template->documents = $arrayDocuments;
		$this->Template->category  = $arrayCategory;
	}
}