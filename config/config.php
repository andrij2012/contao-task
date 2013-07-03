<?php
/** 
 * Backend module
 */
$GLOBALS['BE_MOD']['content']['materials'] = array
(
	'tables' =>  array('tl_materials_category', 'tl_materials'),
	'icon'   => 'system/modules/materials/assets/icon.png'
);
/**
 * Frontend module
 */
$GLOBALS['FE_MOD']['miscellaneous']['materials'] = 'ModuleMaterials';
