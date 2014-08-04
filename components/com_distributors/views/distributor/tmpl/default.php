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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_distributors', JPATH_ADMINISTRATOR);
?>

<?php if( $this->item ) : ?>

    
<?php else: ?>
    Could not load the item
<?php endif; ?>
