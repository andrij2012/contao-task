<?php
System::loadLanguageFile('tl_materials');
$GLOBALS['TL_DCA']['tl_materials_category'] = array
(
	'config' => array
	(
		'dataContainer' 	=> 'Table',
		'ctable' 			=> array('tl_materials'),
		'enableVersioning'	=> true,
		'sql' 				=> array
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
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag' 					  => 1
		),

		'label' => array
		(
			'fields' => array('title'),
			'format' => '%s'
		),

		'operations' => array
		(
			'edit'	=> array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_materials_category']['edit'],
				'href'		=> 'act=edit',
				'icon'		=> 'edit.gif'
			),
			
			'copy'	=> array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_materials_category']['copy'],
				'href'		=> 'act=copy',
				'icon'		=> 'copy.gif'
			),

			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_materials_category']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick = "if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),

			'documents' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_materials_category']['documents'],
				'href'				=> 'table=tl_materials',
				'icon'				=> 'store.gif'
			)
		)
	),
	
	'palettes' => array
	(	
		'default'			=> '{title_legend},title, singleSRC',
		
	),
	
	'fields' => array
	(
		'id' 		=> array
		(
			'label' 		=> &$GLOBALS['TL_LANG']['tl_materials_category']['id'],
			'sql'			=> "int(10) unsigned NOT NULL auto_increment"
		),
	
		'tstamp' 	=> array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials_category']['tstamp'],
			'sql'			=> "int(10) unsigned NOT NULL default '0'"
		),

		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_materials_category']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('filesOnly' => true, 'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes'], 'fieldType' => 'radio', 'mandatory' => true, 'path' => 'files/materials_content'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'title' 	=> array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials_category']['title'],
			'inputType'		=> 'text',
			'search'		=> true,
			'eval'			=> array('mandatory' => true, 'maxlength' =>255),
			'sql'			=> "varchar(255) NOT NULL default ''"
		)
	)
);

class tl_materials_category extends Backend
{

	
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
}
