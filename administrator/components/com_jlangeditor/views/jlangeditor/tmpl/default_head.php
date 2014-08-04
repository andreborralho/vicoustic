<?php
/**
 * default head template file for HelloWorlds view of HelloWorld component
 *
 * @version		$Id: default_head.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?><tr>
	<th width="5%" align="center">
		<?php echo JText::_('COM_JLANGEDITOR_HEADING_ID'); ?>
	</th>
	<th width="5%" align="center">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th width="70%" style="text-align: left;">
		<?php echo JText::_('COM_JLANGEDITOR_HEADING_FILENAME'); ?>
	</th>
	<th width="10%" style="text-align: left;">
		<?php echo JText::_('COM_JLANGEDITOR_HEADING_FILESIZE'); ?>
	</th>
	<th width="10%" style="text-align: left;">
		<?php echo JText::_('COM_JLANGEDITOR_HEADING_FILEPERMISSION'); ?>
	</th>
</tr>

