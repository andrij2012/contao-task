<?php
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
		/*'sorting' => array
		(
			'mode'			=> 1,
			'fields'		=> array('title'),
			'flag'			=> 1,
			'panelLayout'	=> 'filter;search,limit',
		),
		
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),*/
		
		'global_operations' => array
		(
			'all' => array
			(
			'label'			=> &$GLOBALS['TL_LANG']['MSC']['all'],
			'href'			=> 'act=select',
			'class'			=> 'header_edit_all',
			'attributes'	=> 'onclick="Backend.getScrollOffset();"'
			)
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
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'			=> '{title_legent},title,size;{image_legent},image'
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
			'sql'			=> "varchar(64) NOT NULL default ''"
		),

		'size' 	=> array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['size'],
			'search'		=> true,
			'inputType'		=> 'text',
			'sql'			=> "int(10) unsigned NOT NULL default '0'"
		),

		'image' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['image'],
			'inputType'		=> 'fileTree',
			'sql'			=> "varchar(64) NOT NULL default ''"
		),
		
		'type' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['type'],
			'inputType'		=> 'text',
			'sql'			=> "varchar(64) NOT NULL default ''"
		),
		
		'src' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials']['type'],
			'sql'			=> "varchar(64) NOT NULL default ''"
		)
		
	)
);

class tl_materials extends Backend
{
	// Constructor of tl_materials
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
}

