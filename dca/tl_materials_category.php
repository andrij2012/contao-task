<?php

$GLOBALS['TL_LANG']['tl_materials_category']['title_legend'] = 'Type and Image';
/*	$GLOBALS['TL_LANG']['tl_materials_category']['imageURL'] = 'Image URL';
	$GLOBALS['TL_LANG']['tl_materials_category']['title'] = "Type name";
*/

$GLOBALS['TL_DCA']['tl_materials_category'] = array
(
	// Config
	'config' => array
	(
		'dataContainer' => 'Table',
		'ctable' 		=> array('tl_materials'),
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
		/*'global_operations' => array
		(
			'all' => array
			(
			'label'			=> &$GLOBALS['TL_LANG']['MSC']['all'],
			'href'			=> 'act=select',
			'class'			=> 'header_edit_all',
			'attributes'	=> 'onclick="Backend.getScrollOffset();"'
			)
		),*/
		
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
	
	'palettes' => array
	(
		'default'			=> '{title_legend},title,imageURL',
		
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

		'title' 	=> array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials_category']['title'],
			'inputType'		=> 'text',
			'eval'			=> array('mandatory'=>true ,'tl_class'=>'w50'),
			'sql'			=> "varchar(255) NOT NULL default ''"
		),
		
		'imageURL'	=> array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_materials_category']['imageURL'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'eval'          => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255),
			'sql'			=> "varchar(255) NOT NULL default ''"
		)
	)
);
