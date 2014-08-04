<?php
/**
 * @version     1.0.0
 * @package     com_accessories
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
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
		if (task == 'accessory.cancel' || document.formvalidator.isValid(document.id('accessory-form'))) {
			Joomla.submitform(task, document.getElementById('accessory-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_accessories&layout=edit&id='.(int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="accessory-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform adminform_accessories">
			<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_ACCESSORY'); ?></legend>
			<ul class="adminformlist">
                
                <fieldset class="panel_form_left">
                	<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_MAIN_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
					<li><?php echo $this->form->getLabel('name'); ?>
					<?php echo $this->form->getInput('name'); ?></li>
					<li><?php echo $this->form->getLabel('family'); ?>
					<?php echo $this->form->getInput('family'); ?></li>
					<li><?php echo $this->form->getLabel('recycle_coefficient'); ?>
					<?php echo $this->form->getInput('recycle_coefficient'); ?></li>
				</fieldset>
					
				<fieldset class="panel_form_right"> 
					<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_CODES'); ?></legend>
					<li><?php echo $this->form->getLabel('ref'); ?>
					<?php echo $this->form->getInput('ref'); ?></li>
					<li><?php echo $this->form->getLabel('ean13'); ?>
					<?php echo $this->form->getInput('ean13'); ?></li>
					<li><?php echo $this->form->getLabel('hs_code'); ?>
					<?php echo $this->form->getInput('hs_code'); ?></li>
				</fieldset>

				<fieldset class="panel_form_right"> 
					<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_SHIPPING'); ?></legend>	
					<li><?php echo $this->form->getLabel('units_per_box'); ?>
					<?php echo $this->form->getInput('units_per_box'); ?></li>
					<li><?php echo $this->form->getLabel('box_length'); ?>
					<?php echo $this->form->getInput('box_length'); ?></li>
					<li><?php echo $this->form->getLabel('box_width'); ?>
					<?php echo $this->form->getInput('box_width'); ?></li>
					<li><?php echo $this->form->getLabel('box_height'); ?>
					<?php echo $this->form->getInput('box_height'); ?></li>
					<li><?php echo $this->form->getLabel('box_volume'); ?>
					<?php echo $this->form->getInput('box_volume'); ?></li>
					<li><?php echo $this->form->getLabel('box_weight'); ?>
					<?php echo $this->form->getInput('box_weight'); ?></li>
					<li><?php echo $this->form->getLabel('box_msrp'); ?>
					<?php echo $this->form->getInput('box_msrp'); ?></li>
				</fieldset>

				<fieldset class="panel_form_left door_form_descriptions">  
					<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_DESCRIPTIONS'); ?></legend>
					<li><?php echo $this->form->getLabel('description1'); ?>
					<?php echo $this->form->getInput('description1'); ?></li>
					<li><?php echo $this->form->getLabel('description2'); ?>
					<?php echo $this->form->getInput('description2'); ?></li>
				</fieldset>								
				
				<fieldset class="panel_form_right panel_form_files">  
					<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_FILES'); ?></legend>
					
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
				</fieldset>

				<fieldset class="panel_form_right panel_form_photos">  
					<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_PHOTOS_VIDEOS'); ?></legend>
					<li><?php echo $this->form->getLabel('video'); ?>
					<?php echo $this->form->getInput('video'); ?></li>
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
				</fieldset>
				
				<fieldset class="panel_form_left">  
					<legend><?php echo JText::_('COM_ACCESSORIES_LEGEND_PUBLISH'); ?></legend>
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