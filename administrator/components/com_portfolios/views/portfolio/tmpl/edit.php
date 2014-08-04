<?php
/**
 * @version     1.0.0
 * @package     com_portfolios
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
?>


<form action="<?php echo JRoute::_('index.php?option=com_portfolios&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="portfolio-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform adminform_portfolios">
			<legend><?php echo JText::_('COM_PORTFOLIOS_LEGEND_PORTFOLIO'); ?></legend>
			<ul class="adminformlist adminformlist_portfolios">
                
                <fieldset class="portfolio_form_left">  
					<legend><?php echo JText::_('COM_PORTFOLIOS_LEGEND_MAIN_INFO'); ?></legend> 
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
					<li><?php echo $this->form->getLabel('title'); ?>
					<?php echo $this->form->getInput('title'); ?></li>
					<li><?php echo $this->form->getLabel('icon'); ?>
					<?php echo $this->form->getInput('icon'); ?></li>
					<li><?php echo $this->form->getLabel('country'); ?>
					<?php echo $this->form->getInput('country'); ?></li>

					<li><?php echo $this->form->getLabel('category_education'); ?>
					<?php echo $this->form->getInput('category_education'); ?></li>	
					<li><?php echo $this->form->getLabel('category_healthcare'); ?>
					<?php echo $this->form->getInput('category_healthcare'); ?></li>	
					<li><?php echo $this->form->getLabel('category_transports'); ?>
					<?php echo $this->form->getInput('category_transports'); ?></li>	
					<li><?php echo $this->form->getLabel('category_retail_leisure'); ?>
					<?php echo $this->form->getInput('category_retail_leisure'); ?></li>	
					<li><?php echo $this->form->getLabel('category_office'); ?>
					<?php echo $this->form->getInput('category_office'); ?></li>	
					<li><?php echo $this->form->getLabel('category_hifi_home_cinema'); ?>
					<?php echo $this->form->getInput('category_hifi_home_cinema'); ?></li>	
					<li><?php echo $this->form->getLabel('category_theatre'); ?>
					<?php echo $this->form->getInput('category_theatre'); ?></li>	
					<li><?php echo $this->form->getLabel('category_outdoor'); ?>
					<?php echo $this->form->getInput('category_outdoor'); ?></li>	

					<li><?php echo $this->form->getLabel('description'); ?>
					<?php echo $this->form->getInput('description'); ?></li>
				</fieldset>						

				<fieldset class="portfolio_form_right">  
					<legend><?php echo JText::_('COM_PORTFOLIOS_LEGEND_PRODUCTS'); ?></legend> 
					<li><?php echo $this->form->getLabel('panel_id1'); ?>
					<?php echo $this->form->getInput('panel_id1'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id2'); ?>
					<?php echo $this->form->getInput('panel_id2'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id3'); ?>
					<?php echo $this->form->getInput('panel_id3'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id4'); ?>
					<?php echo $this->form->getInput('panel_id4'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id5'); ?>
					<?php echo $this->form->getInput('panel_id5'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id6'); ?>
					<?php echo $this->form->getInput('panel_id6'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id7'); ?>
					<?php echo $this->form->getInput('panel_id7'); ?></li>
					<li><?php echo $this->form->getLabel('panel_id8'); ?>
					<?php echo $this->form->getInput('panel_id8'); ?></li>
					
					<li><?php echo $this->form->getLabel('door_id'); ?>
					<?php echo $this->form->getInput('door_id'); ?></li>
					<li><?php echo $this->form->getLabel('blanket_id'); ?>
					<?php echo $this->form->getInput('blanket_id'); ?></li>
					<li><?php echo $this->form->getLabel('antivibratic_id1'); ?>
					<?php echo $this->form->getInput('antivibratic_id1'); ?></li>
					<li><?php echo $this->form->getLabel('antivibratic_id2'); ?>
					<?php echo $this->form->getInput('antivibratic_id2'); ?></li>
				</fieldset>

				<fieldset class="portfolio_form_right">  
					<legend><?php echo JText::_('COM_PORTFOLIOS_LEGEND_PUBLISH'); ?></legend>
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
    
    <script type="text/javascript">
		Joomla.submitbutton = function(task)
		{
			if (task == 'portfolio.cancel' || document.formvalidator.isValid(document.id('portfolio-form'))) {
				Joomla.submitform(task, document.getElementById('portfolio-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
			}
		}
	</script>
</form>