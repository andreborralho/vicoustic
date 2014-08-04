<?php
/**
 * @version     1.0.0
 * @package     com_doors
 * @copyright   Copyright (C) 2012. All rights reserved.
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
		if (task == 'door.cancel' || document.formvalidator.isValid(document.id('door-form'))) {
			Joomla.submitform(task, document.getElementById('door-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_doors&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="door-form" class="form-validate">
	<div class="width-60 fltlft">
		
		<fieldset class="adminform adminform_doors">
			<legend><?php echo JText::_('COM_DOORS_TITLE_DOOR'); ?></legend>
				<ul class="adminformlist adminformlist_doors">
	           
		        <fieldset class="door_form_left">
		        	<legend><?php echo JText::_('COM_DOORS_LEGEND_MAIN_INFO'); ?></legend>   
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
					<li><?php echo $this->form->getLabel('name'); ?>
					<?php echo $this->form->getInput('name'); ?></li>
				  
					<li><?php echo $this->form->getLabel('family'); ?>
					<?php echo $this->form->getInput('family'); ?></li>
					
					<div class="measures">
						<li><?php echo $this->form->getLabel('width'); ?>
						<?php echo $this->form->getInput('width'); ?> mm</li>
						<li><?php echo $this->form->getLabel('height'); ?>
						<?php echo $this->form->getInput('height'); ?> mm</li>						
					</div>
					
					<li><?php echo $this->form->getLabel('number_of_doors'); ?>
					<?php echo $this->form->getInput('number_of_doors'); ?></li>
					<li><?php echo $this->form->getLabel('gross_weight'); ?>
					<?php echo $this->form->getInput('gross_weight'); ?> kg</li>
					<li><?php echo $this->form->getLabel('finish'); ?>
					<?php echo $this->form->getInput('finish'); ?></li>
				</fieldset>
				

				<fieldset class="door_form_right"> 
					<legend><?php echo JText::_('COM_DOORS_LEGEND_CODES'); ?></legend>  
					<li><?php echo $this->form->getLabel('ref'); ?>
					<?php echo $this->form->getInput('ref'); ?></li>
					<li><?php echo $this->form->getLabel('ean13'); ?>
					<?php echo $this->form->getInput('ean13'); ?></li>
					<li><?php echo $this->form->getLabel('upc'); ?>
					<?php echo $this->form->getInput('upc'); ?></li>
					<li><?php echo $this->form->getLabel('hs_code'); ?>
					<?php echo $this->form->getInput('hs_code'); ?></li>
				</fieldset>
				

				<fieldset class="door_form_right"> 
					<legend><?php echo JText::_('COM_DOORS_LEGEND_PERFORMANCE'); ?></legend>  
					<li><?php echo $this->form->getLabel('fire_resistance'); ?>
					<?php echo $this->form->getInput('fire_resistance'); ?> minutes</li>
					<li><?php echo $this->form->getLabel('rw'); ?>
					<?php echo $this->form->getInput('rw'); ?> dB</li>
					<li><?php echo $this->form->getLabel('dnfw'); ?>
					<?php echo $this->form->getInput('dnfw'); ?> dB</li>
				</fieldset>


				<fieldset class="door_form_left"> 
					<legend><?php echo JText::_('COM_DOORS_LEGEND_INSTALLATION'); ?></legend>  
					<li><?php echo $this->form->getLabel('outer_width'); ?>
					<?php echo $this->form->getInput('outer_width'); ?></li>
					<li><?php echo $this->form->getLabel('outer_height'); ?>
					<?php echo $this->form->getInput('outer_height'); ?></li>
					<li><?php echo $this->form->getLabel('recommended_construction_width'); ?>
					<?php echo $this->form->getInput('recommended_construction_width'); ?></li>
					<li><?php echo $this->form->getLabel('recommended_construction_height'); ?>
					<?php echo $this->form->getInput('recommended_construction_height'); ?></li>
				</fieldset>


				<fieldset class="door_form_right"> 
					<legend><?php echo JText::_('COM_DOORS_LEGEND_SHIPPING_INFO'); ?></legend>  
					<li><?php echo $this->form->getLabel('units_per_pallet'); ?>
					<?php echo $this->form->getInput('units_per_pallet'); ?></li>
					
					<div class="measures">
						<li><?php echo $this->form->getLabel('pallet_length'); ?>
						<?php echo $this->form->getInput('pallet_length'); ?> mm</li>
						<li><?php echo $this->form->getLabel('pallet_width'); ?>
						<?php echo $this->form->getInput('pallet_width'); ?> mm</li>
						<li><?php echo $this->form->getLabel('pallet_height'); ?>
						<?php echo $this->form->getInput('pallet_height'); ?> mm</li>
					</div>
					
					<li><?php echo $this->form->getLabel('pallet_volume'); ?>
					<?php echo $this->form->getInput('pallet_volume'); ?> m<span style="vertical-align:super">3</span></li>
					
					<li><?php echo $this->form->getLabel('pallet_weight'); ?>
					<?php echo $this->form->getInput('pallet_weight'); ?> kg</li>
					<li><?php echo $this->form->getLabel('msrp'); ?>
					<?php echo $this->form->getInput('msrp'); ?> &euro;</li>
					<li><?php echo $this->form->getLabel('msrp_state'); ?>
					<?php echo $this->form->getInput('msrp_state'); ?></li>
				</fieldset>	


				<fieldset class="door_form_left door_form_descriptions">  
					<legend><?php echo JText::_('COM_DOORS_LEGEND_DESCRIPTIONS'); ?></legend>  
					<li><?php echo $this->form->getLabel('description1'); ?>
					<?php echo $this->form->getInput('description1'); ?></li>
					<li><?php echo $this->form->getLabel('description2'); ?>
					<?php echo $this->form->getInput('description2'); ?></li>
				</fieldset>																																		
				

				<fieldset class="door_form_right"> 
					<legend><?php echo JText::_('COM_DOORS_LEGEND_OPTIONS'); ?></legend>  					
					
					<div class="door_options">
						<li><?php echo $this->form->getLabel('keylock'); ?>
						<?php echo $this->form->getInput('keylock'); ?></li>
						<li><?php echo $this->form->getLabel('keylock_ref'); ?>
						<?php echo $this->form->getInput('keylock_ref'); ?></li>
						<li><?php echo $this->form->getLabel('keylock_msrp'); ?>
						<?php echo $this->form->getInput('keylock_msrp'); ?> &euro;</li>
					</div>
						
					<div class="door_options">
						<li><?php echo $this->form->getLabel('antipanic_bar'); ?>
						<?php echo $this->form->getInput('antipanic_bar'); ?></li>					
						<li><?php echo $this->form->getLabel('antipanic_bar_ref'); ?>
						<?php echo $this->form->getInput('antipanic_bar_ref'); ?></li>
						<li><?php echo $this->form->getLabel('antipanic_bar_msrp'); ?>
						<?php echo $this->form->getInput('antipanic_bar_msrp'); ?> &euro;</li>
					</div>
					
					<div class="door_options">
						<li class="li_50"><?php echo $this->form->getLabel('keylock_antipanicbar_ref'); ?>
						<?php echo $this->form->getInput('keylock_antipanicbar_ref'); ?></li>
						
						<li class="li_50"><?php echo $this->form->getLabel('keylock_antipanicbar_msrp'); ?>
						<?php echo $this->form->getInput('keylock_antipanicbar_msrp'); ?> &euro;</li>
					</div>
					
					<div class="door_options">
						<li><?php echo $this->form->getLabel('circular_double_window'); ?>
						<?php echo $this->form->getInput('circular_double_window'); ?></li>										
						<li><?php echo $this->form->getLabel('circular_double_window_ref'); ?>
						<?php echo $this->form->getInput('circular_double_window_ref'); ?></li>
						<li><?php echo $this->form->getLabel('circular_double_window_msrp'); ?>
						<?php echo $this->form->getInput('circular_double_window_msrp'); ?> &euro;</li>				
					</div>
						
					<div class="door_options">
						<li><?php echo $this->form->getLabel('without_floor_frame'); ?>
						<?php echo $this->form->getInput('without_floor_frame'); ?></li>
						<li><?php echo $this->form->getLabel('without_floor_frame_ref'); ?>
						<?php echo $this->form->getInput('without_floor_frame_ref'); ?></li>
						<li><?php echo $this->form->getLabel('without_floor_frame_msrp'); ?>
						<?php echo $this->form->getInput('without_floor_frame_msrp'); ?> &euro;</li>
				
					</div>
						
					<div class="door_options">
						<li><?php echo $this->form->getLabel('autoclose_system'); ?>
						<?php echo $this->form->getInput('autoclose_system'); ?></li>
						<li><?php echo $this->form->getLabel('autoclose_system_ref'); ?>
						<?php echo $this->form->getInput('autoclose_system_ref'); ?></li>
						<li><?php echo $this->form->getLabel('autoclose_system_msrp'); ?>
						<?php echo $this->form->getInput('autoclose_system_msrp'); ?> &euro;</li>
					</div>
				</fieldset>


				<fieldset class="door_form_right">  
					<legend><?php echo JText::_('COM_DOORS_LEGEND_FILES'); ?></legend>
					
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
				</fieldset>


				<fieldset class="door_form_right">  
					<legend><?php echo JText::_('COM_DOORS_LEGEND_PHOTOS_VIDEOS'); ?></legend> 
					
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


				<fieldset class="door_form_left"> 
					<legend><?php echo JText::_('COM_DOORS_LEGEND_PUBLISH'); ?></legend>
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