<?php
/**
 * @version     1.0.0
 * @package     com_panel_graphs
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
$document->addStyleSheet('components/com_panels/assets/css/panel_graphs.css');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'panel_graph.cancel' || document.formvalidator.isValid(document.id('panel_graph-form'))) {
			Joomla.submitform(task, document.getElementById('panel_graph-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_panels&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="panel_graph-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_PANELS_LEGEND_PANEL_GRAPH'); ?></legend>
			<ul class="adminformlist">
                
				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('label'); ?>
				<?php echo $this->form->getInput('label'); ?></li>				
				<li><?php echo $this->form->getLabel('graph_63hz'); ?>
				<?php echo $this->form->getInput('graph_63hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_80hz'); ?>
				<?php echo $this->form->getInput('graph_80hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_100hz'); ?>
				<?php echo $this->form->getInput('graph_100hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_125hz'); ?>
				<?php echo $this->form->getInput('graph_125hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_160hz'); ?>
				<?php echo $this->form->getInput('graph_160hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_200hz'); ?>
				<?php echo $this->form->getInput('graph_200hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_250hz'); ?>
				<?php echo $this->form->getInput('graph_250hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_315hz'); ?>
				<?php echo $this->form->getInput('graph_315hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_400hz'); ?>
				<?php echo $this->form->getInput('graph_400hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_500hz'); ?>
				<?php echo $this->form->getInput('graph_500hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_630hz'); ?>
				<?php echo $this->form->getInput('graph_630hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_800hz'); ?>
				<?php echo $this->form->getInput('graph_800hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_1000hz'); ?>
				<?php echo $this->form->getInput('graph_1000hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_1250hz'); ?>
				<?php echo $this->form->getInput('graph_1250hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_1600hz'); ?>
				<?php echo $this->form->getInput('graph_1600hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_2000hz'); ?>
				<?php echo $this->form->getInput('graph_2000hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_2500hz'); ?>
				<?php echo $this->form->getInput('graph_2500hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_3150hz'); ?>
				<?php echo $this->form->getInput('graph_3150hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_4000hz'); ?>
				<?php echo $this->form->getInput('graph_4000hz'); ?></li>
				<li><?php echo $this->form->getLabel('graph_5000hz'); ?>
				<?php echo $this->form->getInput('graph_5000hz'); ?></li>				
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