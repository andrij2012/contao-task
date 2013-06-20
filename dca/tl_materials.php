<?php
$GLOBALS['TL_DCA']['tl_materials'] = array
(	
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

	
	'palettes' => array
	(
		'default'			=> '{title_legend}, title, size; {image_legend}, image, width, height'
	),

	
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
			'eval'			=> array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
			'sql'			=> "varchar(255) NOT NULL default ''"
		),

		'size' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['size'],
			'inputType'		=> 'text',
			'eval'			=> array('mandatory' => true, 'maxlength' => 10, 'tl_class' => 'w50'),
			'sql'			=> "float(10) unsigned NOT NULL"
		),

		'image' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['image'],
			'exclude'		=> true,
			'inputType'		=> 'fileTree',
			'eval'          => array('filesOnly' => true, 'files' => true, 'fieldType' => 'radio', 'mandatory' => true,
							   'path' => 'files/materials_documents'),
			'sql'           => "varchar(255) NOT NULL default ''"
		),

		'width' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['width'],
			'inputType'		=> 'text',
			'eval'			=> array('mandatory' => true, 'maxlength' => 3, 'tl_class' => 'w50'),
			'sql'			=> "int(3) unsigned NOT NULL"
		),

		'height' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['height'],
			'inputType'		=> 'text',
			'eval'			=> array('mandatory' => true, 'maxlength' => 3, 'tl_class' => 'w50'),
			'sql'			=> "int(3) unsigned NOT NULL"
		)
	)
);

class tl_materials extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function listMaterials($arrRow)
	{
		return '<div>
		<img src=" ' . $arrRow['image'] . ' " style=" height:'. $arrRow['height']. 'px; width:' . $arrRow['width'] .'px; float:left; margin-right: 10px;" /><p><strong>' . $arrRow['title'] . ' (' . $arrRow['size'] . ' mb)</strong></p>
		 </div>' . "\n";
	}
}
