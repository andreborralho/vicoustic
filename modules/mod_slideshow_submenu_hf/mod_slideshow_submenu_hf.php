<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;


$m = JFactory::getApplication()->getMenu();

$active	= $m->getActive();
$active_id = isset($active) ? $active->id : $m->getDefault()->id;
$path	= isset($active) ? $active->tree : array();

$menu = $m->getMenu();

// Note. It is important to remove spaces between elements.
?>

<ul class="menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
<?php
$parentId = $params->get("menuitem");
$products_parent_id = 9793;
$tools_id = 9769;
$slideshow_parent_id = 10612;

foreach($menu as $item){

	$class = 'item-'.$item->id;
	if ($item->id == $active_id) {
		$class .= ' current';
	}
	if (in_array($item->id, $path)) {
		$class .= ' active';
	}	
	
	$flink = $item->link;
	
	if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false)) {
		$item->flink = $item->link.'&Itemid='.$item->id;
	
		if (strcasecmp(substr($item->flink, 0, 4), 'http') && (strpos($item->flink, 'index.php?') !== false)) {
			$item->flink = JRoute::_($item->flink, true, $item->params->get('secure'));
		}
		else {
			$item->flink = JRoute::_($item->flink);
		}
	}
	$first_token = explode('?', $item->flink);
	
	$url1 = explode('/', $first_token[0]);
	
	$url = implode('/', $url1);
	
	
		
	if($item->level == 3 && $parentId == $slideshow_parent_id && $item->id >=10629 && $item->id <= 10636){		
		echo '<li class="'.$class.'"><a href="'.$first_token[0].'">'.$item->title.'</a></li>';					
	}
	
}
?>

</ul>