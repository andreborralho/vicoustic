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

<ul class="menu<?php echo (isset($class_sfx) ? $class_sfx : '');?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
	<?php
		$parentId = $params->get("menuitem");

		$products_parent_id = 9813;
		$acoustic_treatment_id = 9814;
		$insulation_id = 9818;
		$accessories_id = 9822;
		$products_title_id = 11734;
		$tools_id = 9770;


		$submenu_title = false;
		$first_time = true;

		foreach($menu as $item){

			$class = 'item-'.$item->id;
			if ($item->id == $active_id) {
				$class .= ' current';
			}
			if (in_array($item->id, $path)) {
				$class .= ' active';
			}

			$flink = $item->link;
			$item->flink = '';

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
			array_pop($url1);
			$url = implode('/', $url1);


			//PRODUCTS MENU
			if(($item->parent_id == $acoustic_treatment_id && $parentId == $products_parent_id) ||
				($item->parent_id == $insulation_id && $parentId == $products_parent_id) ||
				($item->id == $acoustic_treatment_id && $parentId == $products_parent_id) ||
				($item->id == $insulation_id && $parentId == $products_parent_id) ||
				($item->id == $accessories_id && $parentId == $products_parent_id) ||
				($item->id == $products_title_id && $parentId == $products_parent_id)){

				if ($item->parent_id != $acoustic_treatment_id && $item->parent_id != $insulation_id && $item->id != $tools_id) {
					$class .= ' deeper parent';
					$submenu_title = true;
				}

				//separator
				if($url == "" || $url == "/"){
					echo '<li class="item-'.$item->id.'"><span class="separator">'.$item->title.'</span></li>';
					$current_submenu = true;
				}
				elseif($item->id == $accessories_id){
					echo '</ul><li class="'.'item-'.$item->id.'"><a class="menu_title2" href="'.$url.'">'.$item->title.'</a>';
				}
				elseif($item->id == $insulation_id){
					echo '</ul><li class="'.$class.'"><a class="menu_title" href="'.$first_token[0].'">'.$item->title.'</a><ul>';
					$submenu_title = false;
				}
				elseif($submenu_title && $first_time){
					echo '<li class="'.$class.'"><a class="menu_title" href="'.$url.'">'.$item->title.'</a><ul>';

					$submenu_title = false;
					$first_time = false;
				}
				elseif($submenu_title && !$first_time){
					echo '</ul><li class="'.$class.'"><a class="menu_title" href="'.$url.'">'.$item->title.'</a><ul>';
					$submenu_title = false;
				}
				else{
					echo '<li class="'.$class.'"><a class="menu_subtitle" href="'.$url.'">'.$item->title.'</a></li>';
				}
			}

			//TOOLS MENU
			elseif(($item->level == 3 && $item->parent_id == $parentId) &&
				($item->parent_id != $acoustic_treatment_id && $parentId != $products_parent_id) &&
				($item->parent_id != $insulation_id && $parentId != $products_parent_id)){

				if ($item->parent_id != $acoustic_treatment_id && $item->parent_id != $insulation_id && $item->id != $tools_id) {
					$class .= ' deeper parent';
				}

				//separator
				if($flink == ""){
					echo '<li class="item-'.$item->id.'"><span class="separator">'.$item->title.'</span></li>';
					$current_submenu = true;
				}

				elseif ($item->parent_id == $acoustic_treatment_id || $item->parent_id == $insulation_id) {
					echo '<li class="'.$class.'"><a class="menu_subtitle" href="'.$first_token[0].'">'.$item->title.'</a></li>';
				}
				elseif(isset($submenu_begin) && $submenu_begin){
					echo '<ul><li class="'.$class.'"><a class="menu_subtitle" href="'.$first_token[0].'">'.$item->title.'</a></li>';
					$submenu_begin = false;
				}
				elseif($current_submenu && isset($submenu_begin) && $submenu_begin){
					echo '<ul><li class="'.$class.'"><a class="menu_subtitle" href="'.$first_token[0].'">'.$item->title.'</a></li></ul></li>';
				}
				elseif($current_submenu && (!isset($submenu_begin) || !$submenu_begin)){
					echo '<li class="'.$class.'"><a class="menu_subtitle" href="'.$first_token[0].'">'.$item->title.'</a></li>';
				}
				elseif(isset($tools_last_id) && ($item->id == $tools_last_id)){
					echo '</li></ul>';
				}
				else{
					echo '<li class="'.$class.'"><a class="menu_title" href="'.$first_token[0].'">'.$item->title.'</a>';
					$current_submenu = true;
					$submenu_begin = true;
				}
			}

		}
	?>

</ul>