<?php
/**
 * @version     1.0.3
 * @package     com_distributors
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'distributor.cancel' || document.formvalidator.isValid(document.id('distributor-form'))) {
			Joomla.submitform(task, document.getElementById('distributor-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_distributors&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="distributor-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform adminform_distributors">
			<legend><?php echo JText::_('COM_DISTRIBUTORS_LEGEND_DISTRIBUTOR'); ?></legend>
			<ul class="adminformlist adminformlist_distributors">
                
				<fieldset class="door_form_left">
		        	<legend><?php echo JText::_('COM_DISTRIBUTORS_LEGEND_MAIN_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
					<li><?php echo $this->form->getLabel('name'); ?>
					<?php echo $this->form->getInput('name'); ?></li>
					<li><?php echo $this->form->getLabel('category'); ?>
					<?php echo $this->form->getInput('category'); ?></li>
					<li><?php echo $this->form->getLabel('image'); ?>
					<?php echo $this->form->getInput('image'); ?></li>
				</fieldset>
				
				<fieldset class="door_form_right">
		        	<legend><?php echo JText::_('COM_DISTRIBUTORS_LEGEND_ADDRESS'); ?></legend> 
					<li><?php echo $this->form->getLabel('address'); ?>
					<?php echo $this->form->getInput('address'); ?></li>
					<li><?php echo $this->form->getLabel('zippostalcode'); ?>
					<?php echo $this->form->getInput('zippostalcode'); ?></li>
					<li><?php echo $this->form->getLabel('city'); ?>
					<?php echo $this->form->getInput('city'); ?></li>
					<li><?php echo $this->form->getLabel('telephone'); ?>
					<?php echo $this->form->getInput('telephone'); ?></li>
					<li><?php echo $this->form->getLabel('country'); ?>
					<?php echo $this->form->getInput('country'); ?></li>
				</fieldset>
						
				<fieldset class="door_form_left"> 
					<legend><?php echo JText::_('COM_DISTRIBUTORS_LEGEND_WEB'); ?></legend>  
					<li><?php echo $this->form->getLabel('email'); ?>
					<?php echo $this->form->getInput('email'); ?></li>
					<li><?php echo $this->form->getLabel('website'); ?>
					<?php echo $this->form->getInput('website'); ?></li>
					<li><?php echo $this->form->getLabel('facebook'); ?>
					<?php echo $this->form->getInput('facebook'); ?></li>
				</fieldset>
					
				<fieldset class="door_form_right"> 	
					<legend><?php echo JText::_('COM_DISTRIBUTORS_LEGEND_PUBLISH'); ?></legend> 
					<li><?php echo $this->form->getLabel('music_broadcast'); ?>
					<?php echo $this->form->getInput('music_broadcast'); ?></li>
					<li><?php echo $this->form->getLabel('hifi_home_cinema'); ?>
					<?php echo $this->form->getInput('hifi_home_cinema'); ?></li>
					<li><?php echo $this->form->getLabel('building_construction'); ?>
					<?php echo $this->form->getInput('building_construction'); ?></li>
					
					<li><?php echo $this->form->getLabel('state'); ?>
					<?php echo $this->form->getInput('state'); ?></li>
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