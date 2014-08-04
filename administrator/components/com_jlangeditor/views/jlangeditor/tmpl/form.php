<?php
/**
 * form template file for jlangeditor view of jlangeditor component
 *
 * @version		$Id: form.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
// load tooltip behavior
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$file  		= $this->language;

$session    =& JFactory::getSession();
$lang       = $session->get('jlangselect');

$session    =& JFactory::getSession();
$lang       = $session->get('jlangselect');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			Joomla.submitform(task, document.getElementById('item-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form id="item-form" action="<?php echo JRoute::_('index.php?option=com_jlangeditor'); ?>" method="post" name="adminForm">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo $file->name; ?></legend>
			<input type="hidden" name="filename" id="filename" value="<?php echo base64_encode($file->name); ?>" />
			<textarea class="required" style="width: 800px; height: 400px;" name="lang_text" id="lang_text"><?php echo (!empty($file->details)) ? $file->details : ''; ?></textarea>
		</fieldset>
	</div>
	
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="return" value="<?php echo JRequest::getCmd('return');?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	
</form>
