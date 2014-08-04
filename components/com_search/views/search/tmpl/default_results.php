<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_search
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<dl class="search-results<?php echo $this->pageclass_sfx; ?>">

  <?php
  if(sizeof($this->results) == 0){
    echo "No results were found.";
  }
  ?>

  <?php foreach($this->results as $result) : ?>
    <dt class="result-title">
      <?php if ($result->href) :?>
        <a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>>
          <?php echo $this->escape($result->title);?>
        </a>
      <?php else:?>
        <?php echo $this->escape($result->title);?>
      <?php endif; ?>

    <div><?php echo $result->component ?></div>
    </dt>

    <dd class="result-text">
      <?php if($result->ref) :
        $photo_url = getimagesize('images/panels/photos_150px/'. $result->ref .'_150.png');
      endif;
      ?>

      <a href="<?php echo $result->href; ?>">
        <?php if($result->img) : ?>
          <img alt="" src="<?php echo str_replace("...", '', $result->img); ?>" height="100px" width="100px">
        <?php elseif(!is_array($photo_url)) : ?>
          <img alt="" src="images/not_available_small.png" height="100px" width="100px">
        <?php else: ?>
          <img alt="" src="images/panels/photos_150px/<?php echo $result->ref; ?>_150.png" width="100px" height="100px">
        <?php endif; ?>
      </a>

    </dd>
  <?php endforeach; ?>
</dl>

<div class="pagination">
  <?php echo $this->pagination->getPagesCounter();
  echo $this->pagination->getPagesLinks(); ?>
</div>
