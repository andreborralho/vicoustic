<?php
/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre Borralho <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'panel.cancel' || document.formvalidator.isValid(document.id('panel-form'))) {
			Joomla.submitform(task, document.getElementById('panel-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
	
</script>

<form action="<?php echo JRoute::_('index.php?option=com_panels&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="panel-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform adminform_panels">
			<legend><?php echo JText::_('COM_PANELS_LEGEND_PANEL'); ?></legend>
			<ul class="adminformlist adminformlist_panels">
                
                <fieldset class="panel_form_left">
		        	<legend><?php echo JText::_('COM_PANELS_LEGEND_MAIN_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
					<li><?php echo $this->form->getLabel('name'); ?>
					<?php echo $this->form->getInput('name'); ?></li>
					<li><?php echo $this->form->getLabel('family'); ?>
					<?php echo $this->form->getInput('family'); ?></li>
					<li><?php echo $this->form->getLabel('length'); ?>
					<?php echo $this->form->getInput('length'); ?></li>
					<li><?php echo $this->form->getLabel('width'); ?>
					<?php echo $this->form->getInput('width'); ?></li>
					<li><?php echo $this->form->getLabel('diameter'); ?>
					<?php echo $this->form->getInput('diameter'); ?></li>
					<li><?php echo $this->form->getLabel('thickness'); ?>
					<?php echo $this->form->getInput('thickness'); ?></li>
					<li><?php echo $this->form->getLabel('weight'); ?>
					<?php echo $this->form->getInput('weight'); ?></li>					
					<li><?php echo $this->form->getLabel('density'); ?>
					<?php echo $this->form->getInput('density'); ?></li>					
					<li><?php echo $this->form->getLabel('scratch_resistance'); ?>
					<?php echo $this->form->getInput('scratch_resistance'); ?></li>
					<li><?php echo $this->form->getLabel('washable'); ?>
					<?php echo $this->form->getInput('washable'); ?></li>
					<li><?php echo $this->form->getLabel('recycle_coefficient'); ?>
					<?php echo $this->form->getInput('recycle_coefficient'); ?></li>					
				</fieldset>
				
				<fieldset class="panel_form_right"> 
					<legend><?php echo JText::_('COM_PANELS_LEGEND_CODES'); ?></legend>
					<li><?php echo $this->form->getLabel('ref'); ?>
					<?php echo $this->form->getInput('ref'); ?></li>					
					<li><?php echo $this->form->getLabel('ean13'); ?>
					<?php echo $this->form->getInput('ean13'); ?></li>
					<li><?php echo $this->form->getLabel('hs_code'); ?>
					<?php echo $this->form->getInput('hs_code'); ?></li>
				</fieldset>
													
				<fieldset class="panel_form_right"> 
					<legend><?php echo JText::_('COM_PANELS_LEGEND_SHIPPING_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('units_per_box'); ?>
					<?php echo $this->form->getInput('units_per_box'); ?></li>
					<li><?php echo $this->form->getLabel('box_length'); ?>
					<?php echo $this->form->getInput('box_length'); ?></li>
					<li><?php echo $this->form->getLabel('box_width'); ?>
					<?php echo $this->form->getInput('box_width'); ?></li>
					<li><?php echo $this->form->getLabel('box_height'); ?>
					<?php echo $this->form->getInput('box_height'); ?></li>
					<li><?php echo $this->form->getLabel('box_weight'); ?>
					<?php echo $this->form->getInput('box_weight'); ?></li>
					<li><?php echo $this->form->getLabel('box_volume'); ?>
					<?php echo $this->form->getInput('box_volume'); ?></li>
					<li><?php echo $this->form->getLabel('box_msrp'); ?>
					<?php echo $this->form->getInput('box_msrp'); ?></li>
					<li><?php echo $this->form->getLabel('mastercarton_box_length'); ?>
					<?php echo $this->form->getInput('mastercarton_box_length'); ?></li>
					<li><?php echo $this->form->getLabel('mastercarton_box_width'); ?>
					<?php echo $this->form->getInput('mastercarton_box_width'); ?></li>
					<li><?php echo $this->form->getLabel('mastercarton_box_height'); ?>
					<?php echo $this->form->getInput('mastercarton_box_height'); ?></li>
					<li><?php echo $this->form->getLabel('mastercarton_box_msrp'); ?>
					<?php echo $this->form->getInput('mastercarton_box_msrp'); ?></li>	
				</fieldset>
				
				<fieldset class="panel_form_left"> 
					<legend><?php echo JText::_('COM_PANELS_LEGEND_PERFORMANCE'); ?></legend>
					<li><?php echo $this->form->getLabel('functionality'); ?>
					<?php echo $this->form->getInput('functionality'); ?></li>
					<li><?php echo $this->form->getLabel('absorption_frequency'); ?>
					<?php echo $this->form->getInput('absorption_frequency'); ?></li>
					<li><?php echo $this->form->getLabel('absorption_class'); ?>
					<?php echo $this->form->getInput('absorption_class'); ?></li>
					<li><?php echo $this->form->getLabel('aw'); ?>
					<?php echo $this->form->getInput('aw'); ?></li>
					<li><?php echo $this->form->getLabel('nrc'); ?>
					<?php echo $this->form->getInput('nrc'); ?></li>
					<li><?php echo $this->form->getLabel('absorption_class_2'); ?>
					<?php echo $this->form->getInput('absorption_class_2'); ?></li>
					<li><?php echo $this->form->getLabel('aw_2'); ?>
					<?php echo $this->form->getInput('aw_2'); ?></li>
					<li><?php echo $this->form->getLabel('nrc_2'); ?>
					<?php echo $this->form->getInput('nrc_2'); ?></li>
					<li><?php echo $this->form->getLabel('fire_class_en'); ?>
					<?php echo $this->form->getInput('fire_class_en'); ?></li>					
					<li><?php echo $this->form->getLabel('fire_class_din'); ?>
					<?php echo $this->form->getInput('fire_class_din'); ?></li>
					<li><?php echo $this->form->getLabel('fire_class_nf_p'); ?>
					<?php echo $this->form->getInput('fire_class_nf_p'); ?></li>
					<li><?php echo $this->form->getLabel('fire_class_uni'); ?>
					<?php echo $this->form->getInput('fire_class_uni'); ?></li>
					<li><?php echo $this->form->getLabel('fire_class_bs'); ?>
					<?php echo $this->form->getInput('fire_class_bs'); ?></li>
					<li><?php echo $this->form->getLabel('humidity_class'); ?>
					<?php echo $this->form->getInput('humidity_class'); ?></li>	
					<li><?php echo $this->form->getLabel('light_reflection'); ?>
					<?php echo $this->form->getInput('light_reflection'); ?></li>
					<li><?php echo $this->form->getLabel('humidity_resistance'); ?>
					<?php echo $this->form->getInput('humidity_resistance'); ?></li>
					<li><?php echo $this->form->getLabel('thermal_conductivity'); ?>
					<?php echo $this->form->getInput('thermal_conductivity'); ?></li>
				</fieldset>									
				
				<fieldset class="panel_form_right"> 
					<legend><?php echo JText::_('COM_PANELS_LEGEND_MATERIALS'); ?></legend>
					<li><?php echo $this->form->getLabel('wood'); ?>
					<?php echo $this->form->getInput('wood'); ?></li>
					<li><?php echo $this->form->getLabel('metal'); ?>
					<?php echo $this->form->getInput('metal'); ?></li>
					<li><?php echo $this->form->getLabel('fabric'); ?>
					<?php echo $this->form->getInput('fabric'); ?></li>
					<li><?php echo $this->form->getLabel('foam'); ?>
					<?php echo $this->form->getInput('foam'); ?></li>
					<li><?php echo $this->form->getLabel('polystyrene'); ?>
					<?php echo $this->form->getInput('polystyrene'); ?></li>
					
					<li><?php echo $this->form->getLabel('wood_color'); ?>
					<?php echo $this->form->getInput('wood_color'); ?></li>
					<li><?php echo $this->form->getLabel('wood_type'); ?>
					<?php echo $this->form->getInput('wood_type'); ?></li>
					<li><?php echo $this->form->getLabel('metal_color'); ?>
					<?php echo $this->form->getInput('metal_color'); ?></li>
					<li><?php echo $this->form->getLabel('fabric_color'); ?>
					<?php echo $this->form->getInput('fabric_color'); ?></li>
					<li><?php echo $this->form->getLabel('fabric_type'); ?>
					<?php echo $this->form->getInput('fabric_type'); ?></li>
					<li><?php echo $this->form->getLabel('foam_type'); ?>
					<?php echo $this->form->getInput('foam_type'); ?></li>
					<li><?php echo $this->form->getLabel('polystyrene_color'); ?>
					<?php echo $this->form->getInput('polystyrene_color'); ?></li>
					<li><?php echo $this->form->getLabel('polystyrene_density'); ?>
					<?php echo $this->form->getInput('polystyrene_density'); ?></li>
					
					<li><?php echo $this->form->getLabel('edge_leveled'); ?>
					<?php echo $this->form->getInput('edge_leveled'); ?></li>
					<li><?php echo $this->form->getLabel('edge_angled'); ?>
					<?php echo $this->form->getInput('edge_angled'); ?></li>
				</fieldset>

				<fieldset class="panel_form_right"> 
					<legend><?php echo JText::_('COM_PANELS_LEGEND_INSTALLATION'); ?></legend>					
					<li><?php echo $this->form->getLabel('installation_wall'); ?>
					<?php echo $this->form->getInput('installation_wall'); ?></li>
					<li><?php echo $this->form->getLabel('installation_ceiling'); ?>
					<?php echo $this->form->getInput('installation_ceiling'); ?></li>
					<li><?php echo $this->form->getLabel('installation_vas'); ?>
					<?php echo $this->form->getInput('installation_vas'); ?></li>
					<li><?php echo $this->form->getLabel('installation_floor'); ?>
					<?php echo $this->form->getInput('installation_floor'); ?></li>
					<li><?php echo $this->form->getLabel('installation_corner'); ?>
					<?php echo $this->form->getInput('installation_corner'); ?></li>
					<li><?php echo $this->form->getLabel('fixing_type_standard15'); ?>
					<?php echo $this->form->getInput('fixing_type_standard15'); ?></li>
					<li><?php echo $this->form->getLabel('fixing_type_standard24'); ?>
					<?php echo $this->form->getInput('fixing_type_standard24'); ?></li>
					<li><?php echo $this->form->getLabel('fixing_type_clipin'); ?>
					<?php echo $this->form->getInput('fixing_type_clipin'); ?></li>
					<li><?php echo $this->form->getLabel('fixing_type_screwed'); ?>
					<?php echo $this->form->getInput('fixing_type_screwed'); ?></li>
					<li><?php echo $this->form->getLabel('fixing_type_glued'); ?>
					<?php echo $this->form->getInput('fixing_type_glued'); ?></li>
					<li><?php echo $this->form->getLabel('fixing_type_adhesive'); ?>
					<?php echo $this->form->getInput('fixing_type_adhesive'); ?></li>
					<li><?php echo $this->form->getLabel('load_weight'); ?>
					<?php echo $this->form->getInput('load_weight'); ?></li>
				</fieldset>
							
				<fieldset class="panel_form_left door_form_descriptions">  
					<legend><?php echo JText::_('COM_PANELS_LEGEND_DESCRIPTIONS'); ?></legend>  
					<li><?php echo $this->form->getLabel('description1'); ?>
					<?php echo $this->form->getInput('description1'); ?></li>
					<li><?php echo $this->form->getLabel('description2'); ?>
					<?php echo $this->form->getInput('description2'); ?></li>
				</fieldset>												

				<fieldset class="panel_form_right panel_form_photos">  
					<legend><?php echo JText::_('COM_PANELS_LEGEND_PHOTOS_VIDEOS'); ?></legend>

					<li><?php echo $this->form->getLabel('video'); ?>
					<?php echo $this->form->getInput('video'); ?></li>
					<li><?php echo $this->form->getLabel('photo_row_material'); ?>
					<?php echo $this->form->getInput('photo_row_material'); ?></li>								
					<li><?php echo $this->form->getLabel('photo_150px'); ?>
					<?php echo $this->form->getInput('photo_150px'); ?></li>
					<li><?php echo $this->form->getLabel('photo_300px'); ?>
					<?php echo $this->form->getInput('photo_300px'); ?></li>
					<li><?php echo $this->form->getLabel('photo_1024px'); ?>
					<?php echo $this->form->getInput('photo_1024px'); ?></li>
					<li><?php echo $this->form->getLabel('photo_detail1'); ?>
					<?php echo $this->form->getInput('photo_detail1'); ?></li>
					<li><?php echo $this->form->getLabel('photo_detail2'); ?>
					<?php echo $this->form->getInput('photo_detail2'); ?></li>
					<li><?php echo $this->form->getLabel('photo_detail3'); ?>
					<?php echo $this->form->getInput('photo_detail3'); ?></li>
					<li><?php echo $this->form->getLabel('photo_detail4'); ?>
					<?php echo $this->form->getInput('photo_detail4'); ?></li>
					<li><?php echo $this->form->getLabel('photo_detail5'); ?>
					<?php echo $this->form->getInput('photo_detail5'); ?></li>
					
					<div id="portfolio_li">
						<li><?php echo $this->form->getLabel('portfolio_photo_id1'); ?>
						<?php echo $this->form->getInput('portfolio_photo_id1'); ?></li>
						<li><?php echo $this->form->getLabel('portfolio_photo_id2'); ?>
						<?php echo $this->form->getInput('portfolio_photo_id2'); ?></li>
						<li><?php echo $this->form->getLabel('portfolio_photo_id3'); ?>
						<?php echo $this->form->getInput('portfolio_photo_id3'); ?></li>
					</div>
					
					<div id="portfolio_preview">
						<img />
					</div>
					
					<script type="text/javascript">
						jQuery('#jform_portfolio_photo_id1').hover(function(e){
							var $target = jQuery(e.target);
							if($target.is('option')){
								jQuery('#portfolio_preview img').attr("src", "../"+ $target.text());
							}
						});
						jQuery('#jform_portfolio_photo_id2').hover(function(e){
							var $target = jQuery(e.target);
							if($target.is('option')){
								jQuery('#portfolio_preview img').attr("src", "../"+ $target.text());
							}
						});
						jQuery('#jform_portfolio_photo_id3').hover(function(e){
							var $target = jQuery(e.target);
							if($target.is('option')){
								jQuery('#portfolio_preview img').attr("src", "../"+ $target.text());
							}
						});
						
					</script>
				
				</fieldset>				

				<fieldset class="panel_form_right panel_form_files">  
					<legend><?php echo JText::_('COM_PANELS_LEGEND_FILES'); ?></legend>
					
					<li><?php echo $this->form->getLabel('catalog_page'); ?>
					<?php echo $this->form->getInput('catalog_page'); ?></li>
					<li><?php echo $this->form->getLabel('installation_manual'); ?>
					<?php echo $this->form->getInput('installation_manual'); ?></li>
					<li><?php echo $this->form->getLabel('sketchup'); ?>
					<?php echo $this->form->getInput('sketchup'); ?></li>
					<li><?php echo $this->form->getLabel('warranty'); ?>
					<?php echo $this->form->getInput('warranty'); ?></li>
					<li><?php echo $this->form->getLabel('drawings'); ?>
					<?php echo $this->form->getInput('drawings'); ?></li>
					<li><?php echo $this->form->getLabel('safety_data'); ?>
					<?php echo $this->form->getInput('safety_data'); ?></li>
					<li><?php echo $this->form->getLabel('acoustic_report'); ?>
					<?php echo $this->form->getInput('acoustic_report'); ?></li>

					<li><?php echo $this->form->getLabel('graph_id'); ?>
					<?php echo $this->form->getInput('graph_id'); ?></li>
				</fieldset>

				<fieldset class="panel_form_left">  
					<legend><?php echo JText::_('COM_PANELS_LEGEND_PUBLISH'); ?></legend>
					<li><?php echo $this->form->getLabel('music_broadcast'); ?>
					<?php echo $this->form->getInput('music_broadcast'); ?></li>
					<li><?php echo $this->form->getLabel('hifi_home_cinema'); ?>
					<?php echo $this->form->getInput('hifi_home_cinema'); ?></li>
					<li><?php echo $this->form->getLabel('building_construction'); ?>
					<?php echo $this->form->getInput('building_construction'); ?></li>
					 
					<li><?php echo $this->form->getLabel('state'); ?>
					<?php echo $this->form->getInput('state'); ?></li>
					<li><?php echo $this->form->getLabel('state_featured'); ?>
					<?php echo $this->form->getInput('state_featured'); ?></li>
				</fieldset>
						
            </ul>
		</fieldset>
	</div>


	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>