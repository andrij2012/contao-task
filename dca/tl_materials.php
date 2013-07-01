<?php

/**
 * Table tl_materials
 */
$GLOBALS['TL_DCA']['tl_materials'] = array
(	
	// Config
	'config' => array
	(
		'dataContainer' => 'Table',
		'ptable' 		=> 'tl_materials_category',
		'sql' 			=> array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),
	
	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'					=> 4,
			'fields'				=> array('title'),
			'flag'					=> 1,
			'headerFields'			=> array('title'),
			'panelLayout'			=> 'filter, sort; search, limit',
			'child_record_callback'	=> array('tl_materials', 'listMaterials')
		),

		'operations'		=> array
		(
			'edit'			=> array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_materials']['edit'],
				'href'		=> 'act=edit',
				'icon'		=> 'edit.gif'
			),
			
			'copy'			=> array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_materials']['copy'],
				'href'		=> 'act=copy',
				'icon'		=> 'copy.gif'
			),

			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_materials_category']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'			=> '{title_legend}, title, size, src; {image_legend}, image'
	),

	// Fields
	'fields' => array
	(
		'id' 	=> array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['id'],
			'sql'			=> "int(10) unsigned NOT NULL auto_increment"
		),

		'pid' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['pid'],
			'sql'			=> "int(10) unsigned NOT NULL default '0'"
		),

		'tstamp' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['tstamp'],
			'sql'			=> "int(10) unsigned NOT NULL default '0'"
		),

		'title' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['title'],
			'search'		=> true,
			'inputType'		=> 'text',
			'eval'			=> array('mandatory' => true, 'maxlength' => 255),
			'sql'			=> "varchar(255) NOT NULL default ''"
		),

		'image' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['image'],
			'exclude'		=> true,
			'inputType'		=> 'fileTree',
			'eval'          => array('filesOnly' => true, 'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes'], 'fieldType' => 'radio',
							   'path' => 'files/materials/materials_documents_img'),
			'sql'           => "varchar(64) NOT NULL default ''"
		),

		'src' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['src'],
			'exclude'		=> true,
			'inputType'		=> 'fileTree',
			'eval'			=> array('filesOnly' => true, 'path' => 'files/materials/materials_documents', 'fieldType' => 'radio', 'mandatory' =>true),
			'sql'			=> "varchar(64) NOT NULL default ''"
		),

	)
);


/**
 * Class tl_materials
 * 
 * Provide method, that show the list of materials in certain category
 */
class tl_materials extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Generate list of materials in Backend
	 */
	public function listMaterials($arrRow)
	{
			$objModel = \FilesModel::findByPk($arrRow['image']);
			$objDownSrc = \FilesModel::findByPk($arrRow['src']);
			$size = \Contao\System::getReadableSize(filesize(TL_ROOT . '/' . $objDownSrc->path));
			return '<div>
				<img src=" ' . $objModel->path . ' " style= "height: 100px; width: 100px; float: left; margin-right: 12px;" /><p><strong>' . $arrRow['title'] .' ('. $size .')</strong></p>
		 		</div>' . "\n";
	}
}
