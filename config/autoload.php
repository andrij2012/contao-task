<?php

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\Materials'            => 'system/modules/materials/classes/Materials.php',

	// Models
	'Contao\MaterialsModel'       => 'system/modules/materials/models/MaterialsModel.php',

	// Modules
	'Contao\ModuleMaterials'      => 'system/modules/materials/modules/ModuleMaterials.php',
));



/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mat_default'        => 'system/modules/materials/templates/materials',
	'mat_mini'           => 'system/modules/materials/templates/materials',
));