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


<form action="<?php echo JRoute::_('index.php?option=com_portfolios&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="portfolio_photo-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_PORTFOLIOS_LEGEND_PORTFOLIO_PHOTO'); ?></legend>
			<ul class="adminformlist">
                
				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('portfolio_id'); ?>
				<?php echo $this->form->getInput('portfolio_id'); ?></li>
				
				<li><?php echo $this->form->getLabel('label'); ?>
				<?php echo $this->form->getInput('label'); ?></li>
				<li><?php echo $this->form->getLabel('photo'); ?>
				<?php echo $this->form->getInput('photo'); ?></li>	
				<li><?php echo $this->form->getLabel('thumbnail'); ?>
				<?php echo $this->form->getInput('thumbnail'); ?></li>	
				
				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>
			
          </ul>
		</fieldset>
	</div>


	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>

    <script type="text/javascript">
		Joomla.submitbutton = function(task)
		{
			if (task == 'portfolio_photo.cancel' || document.formvalidator.isValid(document.id('portfolio_photo-form'))) {
				Joomla.submitform(task, document.getElementById('portfolio_photo-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
			}
		}
	</script>
</form>