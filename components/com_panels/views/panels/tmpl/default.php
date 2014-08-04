<?php
/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_panels', JPATH_ADMINISTRATOR);

$page_title = JFactory::getDocument()->getTitle();
?>

<?php
$url = JURI::current();
$tokens = explode('/', $url);
$last_url = $tokens[sizeof($tokens)-1];
?>

  <h1 class="page_title"><?php echo $page_title; ?></h1>

<?php if($this->items) : ?>


  <div class="items">

  <ul class="items_list products_items_list">

  <?php foreach ($this->items as $item) :
    $url=getimagesize('images/panels/photos_150px/'. $item->ref .'_150.png');

    if($last_url == 'acoustic-treatment'): ?>
      <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

        <div class="products_list_img">
          <?php if($item->photo_150px) : ?>
            <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
          <?php elseif(!is_array($url)): ?>
            <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
          <?php else : ?>
            <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
          <?php endif; ?>
        </div>

        <h2 class="products_list_family"><?php echo $item->family; ?></h2>

        <div class="products_list_description"><?php echo $item->description1; ?></div>


        <div class="products_list_icons">
          <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
          <div class="products_list_icon panels_list_aw">
            <?php
            if (empty($item->aw)) {
              echo "N/A";
            }
            else {
              echo $item->aw;
            }
            ?>
          </div>

          <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
          <div class="products_list_icon panels_list_nrc">
            <?php
            if ($item->nrc == 0) {
              echo "N/A";
            }
            else {
              echo "$item->nrc dB";
            }
            ?>
          </div>

          <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
          <div class="products_list_icon panels_list_fire_class">
            <?php
              if (empty($item->fire_class_en)) {
                echo "N/A";
              }
              else {
                echo ucwords($item->fire_class_en);
              }
            ?>
          </div>

          <?php if($item->absorption_frequency == "low") :?>
            <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
          <?php elseif($item->absorption_frequency == "medium") :?>
            <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
          <?php elseif($item->absorption_frequency == "high") :?>
            <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
          <?php else :?>
            <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
          <?php endif; ?>

          <div class="products_list_icon panels_list_absorption_frequency">
            <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
          </div>

          <?php if($item->functionality == "absorption") :?>
            <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
          <?php elseif($item->functionality == "diffusion") :?>
            <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
          <?php elseif($item->functionality == "basstrap") :?>
            <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
          <?php elseif($item->functionality == "hybrid") :?>
            <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
          <?php endif; ?>

          <div class="products_list_icon panels_list_functionality">
            <?php echo ucwords($item->functionality); ?>
          </div>
        </div>
      </a>

    <?php else: ?>
      <?php if($last_url == 'walls-panels' && $item->installation_wall==1): ?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php elseif(!is_array($url)): ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_aw">
              <?php
              if (empty($item->aw)) {
                echo "N/A";
              }
              else {
                echo $item->aw;
              }
              ?>
            </div>

            <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_nrc">
              <?php
              if ($item->nrc == 0) {
                echo "N/A";
              }
              else {
                echo "$item->nrc dB";
              }
              ?>
            </div>

            <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_fire_class">
              <?php echo ucwords($item->fire_class_en); ?>
            </div>

            <?php if($item->absorption_frequency == "low") :?>
              <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "medium") :?>
              <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "high") :?>
              <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
            <?php else :?>
              <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_absorption_frequency">
              <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
            </div>

            <?php if($item->functionality == "absorption") :?>
              <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
            <?php elseif($item->functionality == "diffusion") :?>
              <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
            <?php elseif($item->functionality == "basstrap") :?>
              <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php elseif($item->functionality == "hybrid") :?>
              <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_functionality">
              <?php echo ucwords($item->functionality); ?>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php if($last_url == 'ceilings-panels' && $item->installation_ceiling==1): ?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php elseif(!is_array($url)): ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_aw">
              <?php
              if (empty($item->aw)) {
                echo "N/A";
              }
              else {
                echo $item->aw;
              }
              ?>
            </div>

            <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_nrc">
              <?php
              if ($item->nrc == 0) {
                echo "N/A";
              }
              else {
                echo "$item->nrc dB";
              }
              ?>
            </div>

            <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_fire_class">
              <?php echo ucwords($item->fire_class_en); ?>
            </div>

            <?php if($item->absorption_frequency == "low") :?>
              <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "medium") :?>
              <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "high") :?>
              <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
            <?php else :?>
              <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_absorption_frequency">
              <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
            </div>

            <?php if($item->functionality == "absorption") :?>
              <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
            <?php elseif($item->functionality == "diffusion") :?>
              <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
            <?php elseif($item->functionality == "basstrap") :?>
              <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php elseif($item->functionality == "hybrid") :?>
              <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_functionality">
              <?php echo ucwords($item->functionality); ?>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php if($last_url == "vertical-acoustic" && $item->installation_vas==1): ?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php elseif(!is_array($url)): ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_aw">
              <?php
              if (empty($item->aw)) {
                echo "N/A";
              }
              else {
                echo $item->aw;
              }
              ?>
            </div>

            <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_nrc">
              <?php
              if ($item->nrc == 0) {
                echo "N/A";
              }
              else {
                echo "$item->nrc dB";
              }
              ?>
            </div>

            <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_fire_class">
              <?php echo ucwords($item->fire_class_en); ?>
            </div>

            <?php if($item->absorption_frequency == "low") :?>
              <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "medium") :?>
              <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "high") :?>
              <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
            <?php else :?>
              <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_absorption_frequency">
              <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
            </div>

            <?php if($item->functionality == "absorption") :?>
              <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
            <?php elseif($item->functionality == "diffusion") :?>
              <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
            <?php elseif($item->functionality == "basstrap") :?>
              <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php elseif($item->functionality == "hybrid") :?>
              <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_functionality">
              <?php echo ucwords($item->functionality); ?>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php if($last_url == "absorption" && $item->functionality == "absorption"): ?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php elseif(!is_array($url)): ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_aw">
              <?php
              if (empty($item->aw)) {
                echo "N/A";
              }
              else {
                echo $item->aw;
              }
              ?>
            </div>

            <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_nrc">
              <?php
              if ($item->nrc == 0) {
                echo "N/A";
              }
              else {
                echo "$item->nrc dB";
              }
              ?>
            </div>

            <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_fire_class">
              <?php echo ucwords($item->fire_class_en); ?>
            </div>

            <?php if($item->absorption_frequency == "low") :?>
              <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "medium") :?>
              <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "high") :?>
              <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
            <?php else :?>
              <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_absorption_frequency">
              <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
            </div>

            <?php if($item->functionality == "absorption") :?>
              <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
            <?php elseif($item->functionality == "diffusion") :?>
              <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
            <?php elseif($item->functionality == "basstrap") :?>
              <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php elseif($item->functionality == "hybrid") :?>
              <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_functionality">
              <?php echo ucwords($item->functionality); ?>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php if($last_url == "diffusion" && $item->functionality == "diffusion"): ?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php elseif(!is_array($url)): ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_aw">
              <?php
              if (empty($item->aw)) {
                echo "N/A";
              }
              else {
                echo $item->aw;
              }
              ?>
            </div>

            <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_nrc">
              <?php
              if ($item->nrc == 0) {
                echo "N/A";
              }
              else {
                echo "$item->nrc dB";
              }
              ?>
            </div>

            <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_fire_class">
              <?php echo ucwords($item->fire_class_en); ?>
            </div>

            <?php if($item->absorption_frequency == "low") :?>
              <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "medium") :?>
              <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "high") :?>
              <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
            <?php else :?>
              <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_absorption_frequency">
              <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
            </div>

            <?php if($item->functionality == "absorption") :?>
              <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
            <?php elseif($item->functionality == "diffusion") :?>
              <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
            <?php elseif($item->functionality == "basstrap") :?>
              <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php elseif($item->functionality == "hybrid") :?>
              <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_functionality">
              <?php echo ucwords($item->functionality); ?>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php if($last_url == "basstrap" && $item->functionality == "basstrap"): ?>
        <a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

          <div class="products_list_img">
            <?php if($item->photo_150px) : ?>
              <img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
            <?php elseif(!is_array($url)): ?>
              <img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
            <?php else : ?>
              <img alt="<?php echo $item->family; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="150px" height="150px">
            <?php endif; ?>
          </div>

          <h2 class="products_list_family"><?php echo $item->family; ?></h2>

          <div class="products_list_description"><?php echo $item->description1; ?></div>


          <div class="products_list_icons">
            <img title="Acoustic Absorption (&alpha;w)" alt="Acoustic Absorption aw" src="images/icons/icon_aw.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_aw">
              <?php
              if (empty($item->aw)) {
                echo "N/A";
              }
              else {
                echo $item->aw;
              }
              ?>
            </div>

            <img title="Acoustic Absorption (NRC)" alt="Acoustic Absorption (NRC)" src="images/icons/icon_nrc.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_nrc">
              <?php
              if ($item->nrc == 0) {
                echo "N/A";
              }
              else {
                echo "$item->nrc dB";
              }
              ?>
            </div>

            <img title="Fire Class" alt="Fire Class" src="images/icons/icon_eurclass.png" height="30px" width="30px">
            <div class="products_list_icon panels_list_fire_class">
              <?php echo ucwords($item->fire_class_en); ?>
            </div>

            <?php if($item->absorption_frequency == "low") :?>
              <img title="Low Frequencies" alt="Low Frequencies" src="images/icons/icon_low.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "medium") :?>
              <img title="Medium Frequencies" alt="Medium Frequencies" src="images/icons/icon_medium.png" height="30px" width="30px">
            <?php elseif($item->absorption_frequency == "high") :?>
              <img title="High Frequencies" alt="High Frequencies" src="images/icons/icon_high.png" height="30px" width="30px">
            <?php else :?>
              <img title="Flat Frequencies" alt="Flat Frequencies" src="images/icons/icon_flat.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_absorption_frequency">
              <?php echo ucwords($item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?>
            </div>

            <?php if($item->functionality == "absorption") :?>
              <img title="Absorption" alt="Absorption" src="images/icons/icon_absorption.png" height="30px" width="30px">
            <?php elseif($item->functionality == "diffusion") :?>
              <img title="Diffusion" alt="Diffusion" src="images/icons/icon_diffusion.png" height="30px" width="30px">
            <?php elseif($item->functionality == "basstrap") :?>
              <img title="Basstrap" alt="Basstrap" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php elseif($item->functionality == "hybrid") :?>
              <img title="Hybrid" alt="Hybrid" src="images/icons/icon_hybrid.png" height="30px" width="30px">
            <?php endif; ?>

            <div class="products_list_icon panels_list_functionality">
              <?php echo ucwords($item->functionality); ?>
            </div>
          </div>
        </a>
      <?php endif; ?>

    <?php endif; ?>
  <?php endforeach; ?>

  </ul>

  </div>

  <div class="pagination">
    <p class="counter">
      <?php echo $this->pagination->getPagesCounter(); ?>
    </p>
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>

<?php else: ?>
  There are no items in the list
<?php endif; ?>