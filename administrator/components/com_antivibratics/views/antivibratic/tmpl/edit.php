<?php
/**
 * @version     1.0.0
 * @package     com_antivibratics
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
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
		if (task == 'antivibratic.cancel' || document.formvalidator.isValid(document.id('antivibratic-form'))) {
			Joomla.submitform(task, document.getElementById('antivibratic-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_antivibratics&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="antivibratic-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform adminform_antivibratics">
			<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_ANTIVIBRATIC'); ?></legend>
			<ul class="adminformlist adminformlist_antivibratics">
                
                <fieldset class="antivibratic_form_left">
		        	<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_MAIN_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
					<li><?php echo $this->form->getLabel('name'); ?>
					<?php echo $this->form->getInput('name'); ?></li>
					<li><?php echo $this->form->getLabel('family'); ?>
					<?php echo $this->form->getInput('family'); ?></li>					
					<li><?php echo $this->form->getLabel('recycle_coefficient'); ?>
					<?php echo $this->form->getInput('recycle_coefficient'); ?></li>
				</fieldset>
				
				<fieldset class="antivibratic_form_right"> 
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_CODES'); ?></legend>
					<li><?php echo $this->form->getLabel('ref'); ?>
					<?php echo $this->form->getInput('ref'); ?></li>					
					<li><?php echo $this->form->getLabel('ean13'); ?>
					<?php echo $this->form->getInput('ean13'); ?></li>					
					<li><?php echo $this->form->getLabel('hs_code'); ?>
					<?php echo $this->form->getInput('hs_code'); ?></li>
				</fieldset>
				
				<fieldset class="antivibratic_form_right"> 
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_PERFORMANCE'); ?></legend>
					<li><?php echo $this->form->getLabel('mounting_width'); ?>
					<?php echo $this->form->getInput('mounting_width'); ?></li>
					<li><?php echo $this->form->getLabel('rupture_point'); ?>
					<?php echo $this->form->getInput('rupture_point'); ?></li>
					<li><?php echo $this->form->getLabel('load_weight_min'); ?>
					<?php echo $this->form->getInput('load_weight_min'); ?></li>
					<li><?php echo $this->form->getLabel('load_weight_max'); ?>
					<?php echo $this->form->getInput('load_weight_max'); ?></li>

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

					<li><?php echo $this->form->getLabel('steel'); ?>
					<?php echo $this->form->getInput('steel'); ?></li>					
					<li><?php echo $this->form->getLabel('rubber_color'); ?>
					<?php echo $this->form->getInput('rubber_color'); ?></li>
					<li><?php echo $this->form->getLabel('angle_adaptation'); ?>
					<?php echo $this->form->getInput('angle_adaptation'); ?></li>
					<li><?php echo $this->form->getLabel('hooking_system'); ?>
					<?php echo $this->form->getInput('hooking_system'); ?></li>
					<li><?php echo $this->form->getLabel('security_devices'); ?>
					<?php echo $this->form->getInput('security_devices'); ?></li>
					<li><?php echo $this->form->getLabel('fire_security_devices'); ?>
					<?php echo $this->form->getInput('fire_security_devices'); ?></li>
					<li><?php echo $this->form->getLabel('plate_thickness'); ?>
					<?php echo $this->form->getInput('plate_thickness'); ?></li>
					<li><?php echo $this->form->getLabel('plate_length'); ?>
					<?php echo $this->form->getInput('plate_length'); ?></li>
				</fieldset>	
								
				
				<fieldset class="antivibratic_form_left door_form_descriptions">  
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_DESCRIPTIONS'); ?></legend>  
					<li><?php echo $this->form->getLabel('description1'); ?>
					<?php echo $this->form->getInput('description1'); ?></li>
					<li><?php echo $this->form->getLabel('description2'); ?>
					<?php echo $this->form->getInput('description2'); ?></li>
				</fieldset>
				
				<fieldset class="antivibratic_form_right"> 
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_INSTALLATION'); ?></legend>										
					<li><?php echo $this->form->getLabel('installation_wall'); ?>
					<?php echo $this->form->getInput('installation_wall'); ?></li>
					<li><?php echo $this->form->getLabel('installation_ceiling'); ?>
					<?php echo $this->form->getInput('installation_ceiling'); ?></li>
					<li><?php echo $this->form->getLabel('installation_floor'); ?>
					<?php echo $this->form->getInput('installation_floor'); ?></li>
					<li><?php echo $this->form->getLabel('installation_division_wall'); ?>
					<?php echo $this->form->getInput('installation_division_wall'); ?></li>
					
				</fieldset>

				<fieldset class="antivibratic_form_right"> 
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_SHIPPING_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('msrp'); ?>
					<?php echo $this->form->getInput('msrp'); ?></li>
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
				
				<fieldset class="antivibratic_form_left antivibratic_form_photos">  
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_PHOTOS_VIDEOS'); ?></legend> 
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
					</div>
					
					<div id="portfolio_preview">
						<img alt="Portfolio Photo">
					</div>										
				
				</fieldset>
				
				<fieldset class="antivibratic_form_right antivibratic_form_files">  
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_FILES'); ?></legend>
					
					<li><?php echo $this->form->getLabel('catalog_page'); ?>
					<?php echo $this->form->getInput('catalog_page'); ?></li>
					<li><?php echo $this->form->getLabel('installation_manual'); ?>
					<?php echo $this->form->getInput('installation_manual'); ?></li>					
					<li><?php echo $this->form->getLabel('warranty'); ?>
					<?php echo $this->form->getInput('warranty'); ?></li>
					<li><?php echo $this->form->getLabel('drawings'); ?>
					<?php echo $this->form->getInput('drawings'); ?></li>
					<li><?php echo $this->form->getLabel('safety_data'); ?>
					<?php echo $this->form->getInput('safety_data'); ?></li>				
				</fieldset>			

				<fieldset class="antivibratic_form_right">  
					<legend><?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_PUBLISH'); ?></legend>  
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
</script>