<?php
/**
 * @version     1.0.0
 * @package     com_isolation_solutions
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

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
        
		if (task == 'isolation.cancel' || document.formvalidator.isValid(document.id('isolation-form'))) {
			Joomla.submitform(task, document.getElementById('isolation-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_isolation_solutions&layout=edit&id='.(int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="isolation-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_ISOLATION_SOLUTIONS_LEGEND_ISOLATION'); ?></legend>
			<ul class="adminformlist">
                
				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('name'); ?>
				<?php echo $this->form->getInput('name'); ?></li>
				<li><?php echo $this->form->getLabel('ref'); ?>
				<?php echo $this->form->getInput('ref'); ?></li>
				<li><?php echo $this->form->getLabel('rw'); ?>
				<?php echo $this->form->getInput('rw'); ?></li>
				<li><?php echo $this->form->getLabel('stc'); ?>
				<?php echo $this->form->getInput('stc'); ?></li>
				<li><?php echo $this->form->getLabel('price'); ?>
				<?php echo $this->form->getInput('price'); ?></li>
				
				<li><?php echo $this->form->getLabel('solution_image'); ?>
				<?php echo $this->form->getInput('solution_image'); ?></li>
				<li><?php echo $this->form->getLabel('graph'); ?>
				<?php echo $this->form->getInput('graph'); ?></li>
				
				<li><?php echo $this->form->getLabel('category_id'); ?>
				<?php echo $this->form->getInput('category_id'); ?></li>

				<li><?php echo $this->form->getLabel('solution_data_sheet'); ?>
				<?php echo $this->form->getInput('solution_data_sheet'); ?></li>
				<li><?php echo $this->form->getLabel('technical_file1'); ?>
				<?php echo $this->form->getInput('technical_file1'); ?></li>
				<li><?php echo $this->form->getLabel('technical_file2'); ?>
				<?php echo $this->form->getInput('technical_file2'); ?></li>
				<li><?php echo $this->form->getLabel('technical_file3'); ?>
				<?php echo $this->form->getInput('technical_file3'); ?></li>
				<li><?php echo $this->form->getLabel('technical_file4'); ?>
				<?php echo $this->form->getInput('technical_file4'); ?></li>				

				<li><?php echo $this->form->getLabel('antivibratic_id1'); ?>
				<?php echo $this->form->getInput('antivibratic_id1'); ?>
				<?php echo $this->form->getLabel('blanket_id1'); ?>
				<?php echo $this->form->getInput('blanket_id1'); ?></li>

				<li><?php echo $this->form->getLabel('antivibratic_id2'); ?>
				<?php echo $this->form->getInput('antivibratic_id2'); ?>
				<?php echo $this->form->getLabel('blanket_id2'); ?>
				<?php echo $this->form->getInput('blanket_id2'); ?></li>

				<li><?php echo $this->form->getLabel('antivibratic_id3'); ?>
				<?php echo $this->form->getInput('antivibratic_id3'); ?>
				<?php echo $this->form->getLabel('blanket_id3'); ?>
				<?php echo $this->form->getInput('blanket_id3'); ?></li>

				<li><?php echo $this->form->getLabel('antivibratic_id4'); ?>
				<?php echo $this->form->getInput('antivibratic_id4'); ?>
				<?php echo $this->form->getLabel('blanket_id4'); ?>
				<?php echo $this->form->getInput('blanket_id4'); ?></li>

				<li><?php echo $this->form->getLabel('antivibratic_id5'); ?>
				<?php echo $this->form->getInput('antivibratic_id5'); ?>
				<?php echo $this->form->getLabel('blanket_id5'); ?>
				<?php echo $this->form->getInput('blanket_id5'); ?></li>
				

				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>				

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