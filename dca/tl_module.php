<?php
/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['materials'] = '{title_legend},name,headline,type;{template_legend:hide},materials_layout;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['materials_layout'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['materials_layout'],
	'default'                 => 'mod_materials',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_materials', 'getListTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

/**
 * Class tl_module_materials
 */
class tl_module_materials extends Backend
{
	/**
	 * Return all list templates as array
	 * @return array
	 */
	public function getListTemplates()
	{
		return $this->getTemplateGroup('mod_materials');
	}
}