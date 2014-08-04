<?php
/**
 * @version     1.0.0
 * @package     com_blankets
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_blankets', JPATH_ADMINISTRATOR);
?>

  <h1 class="page_title">Blankets</h1>

<?php if($this->items) : ?>

  <div class="items">
    <ul class="items_list products_items_list">

      <?php foreach ($this->items as $item) :?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_blankets&view=blanket&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Reduction (rw)" alt="Acoustic Reduction (rw)" src="images/icons/icon_rw.png" height="30px" width="30px">
            <div class="products_list_icon blankets_list_rw">
              <?php
              if ($item->rw == 0) {
                echo "N/A";
              }
              else {
                echo "$item->rw dB";
              }
              ?>
            </div>

            <img title="Dimensions" alt="Dimensions" src="images/icons/icon_dimensions.png" height="30px" width="30px">
            <div class="products_list_icon blankets_list_dimensions">
              <?php echo number_format((float)$item->length, 0, '.', ''); ?> x
              <?php echo number_format((float)$item->width, 0, '.', ''); ?> x
              <?php echo number_format((float)$item->thickness, 0, '.', ''); ?> mm
            </div>
          </div>
        </a>
      <?php endforeach; ?>

    </ul>
  </div>

<?php else: ?>
  There are no items in the list
<?php endif; ?>