<?php

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\Materials'            		=> 'system/modules/materials/classes/Materials.php',

	// Models
	'Contao\MaterialsModel'       		=> 'system/modules/materials/models/MaterialsModel.php',
	'Contao\MaterialsCategoryModel' 	=> 'system/modules/materials/models/MaterialsCategoryModel.php',

	// Modules
	'Contao\ModuleMaterials'      		=> 'system/modules/materials/modules/ModuleMaterials.php'
));



/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_materials'        				=> 'system/modules/materials/templates/materials'
));