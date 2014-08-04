<?php
/**
 * default template file for jlangeditor view of jlangeditor component
 *
 * @version		$Id: default.php 177 2011-06-10 10:00:00 rajug $
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

$languages 	= $this->languages;

$session    =& JFactory::getSession();
$lang       = $session->get('jlangselect');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jlangeditor'); ?>" method="post" name="adminForm">
	<fieldset id="filter-bar">
		<div class="filter-select fltrt">
			<label for="filter_language" style="float: left;"><?php echo JText::_( 'Language' ); ?> :</label> 
			<select name="filter_language" class="inputbox" onchange="this.form.submit()" style="width: 200px;">
				<option value="">-- Languages --</option>
				<?php foreach($languages as $language):?>
				<option value="<?php echo $language; ?>"<?php echo ($lang == $language) ? '  selected=""' : ''; ?>><?php echo $language; ?></option>
				<?php endforeach;?>
			</select>
		</div>
	</fieldset>
	
	<div class="clr"> </div>
	
	<table class="adminlist">
		<thead><?php echo $this->loadTemplate('head');?></thead>
		<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
