<?php
/**
 * default body template file for HelloWorlds view of HelloWorld component
 *
 * @version		$Id: default_body.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

$session    =& JFactory::getSession();
$lang       = $session->get('jlangselect');
$path 		= JPATH_ROOT . '/language/' . $lang . "/";

$files 		= $this->items;
$i 			= 0;
?>
<?php foreach($files as $file): ?>
	<?php
	$row = &$this->items[$i];
	$checked 	= '<input type="checkbox" onclick="isChecked(this.checked);" value="' . base64_encode($file) . '" name="cid[]" id="cb' . $i . '">';
	$link_e = JRoute::_('index.php?option=com_jlangeditor&&task=edit&file[]=' . base64_encode($file) );
	$filesize = filesize($path . $file);
	?>
	<tr class="row<?php echo $i % 2; ?>">
		<td align="center">
			<?php echo ($i + 1);?>
		</td>
		<td align="center">
			<?php echo $checked;?>
		</td>
		<td>
			<a href="<?php echo $link_e; ?>">
				<?php echo $file; ?>
			</a>
		</td>
		<td><?php echo $filesize; ?> bytes</td>
		<td>
			<?php if(is_writable($path . $file)):?>
			<span style="color: green;font-weight: bold;"><?php echo JText::_( 'Writable' ); ?></span>
			<?php else: ?>
			<span style="color: red;font-weight: bold;"><?php echo JText::_( 'Writable' ); ?></span>
			<?php endif; ?>
		</td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>

