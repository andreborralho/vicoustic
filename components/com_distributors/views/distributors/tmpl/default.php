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

$geral_url = JURI::current();
$geral_tokens = explode('/', $geral_url);

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('components/com_distributors/assets/scripts/jquery-jvectormap-1.2.2.min.js');
?>

<h1 class="page_title">Where to Buy</h1>

<div id="world-map" style="width: 100%; height: 400px; margin-bottom: 10px"></div>


<?php
$countries = array();

foreach ($this->items as $i=>$item) :
  if($item->state == 1) :
    $countries[] = $item->country;
  endif;
endforeach;

sort($countries);
$countries = array_unique($countries);
?>

<form action="<?php echo JRoute::_('index.php?option=com_distributors&view=distributors'); ?>" method="post" name="site_form" id="site_form">

  <a href="https://visound.wufoo.eu/forms/new-distributor-form/">
    <img alt="Distributor Form" src="images/distributors/apply_button.png" width="293px" height="96px">
  </a>

  <div class="distributors_filters">

    <select id="filter_country" name="filter_country" onchange="this.form.submit();">
      <option value="  " selected>Please select a country</option>

      <?php foreach ($countries as $value) : ?>

        <option class="country_option" value="<?php echo $value; ?>" ><?php echo $value; ?></option>

      <?php endforeach;?>

    </select>

    <br>

    <button id="button_clear" type="button" onclick="window.open('<?php echo $geral_tokens[3]; ?>/where-to-buy','_self')">Show All</button>

  </div>

  <div class="clr"> </div>

  <?php if($this->items) : ?>
    <div id="distributors_list">

      <ul id="distributors_ul">

        <?php foreach ($this->items as $i=>$item) :?>

          <?php if($item->country == $_POST[filter_country] || !isset($_POST[filter_country]) || $_POST[filter_country] == 'clear') : ?>
            <li>
              <ul class="distributors_entry">

                <?php if ($item->image !== '') : ?>
                  <img alt="<?php echo $item->name; ?>" src="<?php echo $item->image; ?>" height="90px" width="200px">
                <?php endif; ?>

                <li>
                  <div class="distributor_name">
                    <?php echo $this->escape($item->name); ?>
                  </div>
                </li>
                <li>
                  <div class="distributor_country">
                    <?php echo $item->country; ?>
                  </div>
                </li>
                <li>
                  <b>Address: </b><?php echo $item->address; ?>
                </li>
                <li>
                  <div class="distributor_city">
                    <?php echo $item->zippostalcode; ?>
                    <?php echo $item->city; ?>
                  </div>
                </li>
                <li>
                  <?php if ($item->telephone !== '') : ?>
                    <b>Phone: </b><?php echo $item->telephone; ?>
                  <?php endif; ?>
                </li>
                <li>
                  <div class="distributor_contact">
                    <b>e-mail: </b><br><a href="mailto:<?php echo $item->email; ?>"><?php echo $item->email; ?></a>
                  </div>
                  <div class="distributor_contact">
                    <b>Website: </b><br><a href="<?php echo $item->website; ?>"><?php echo $item->website; ?></a>
                  </div>
                  <?php if($item->facebook): ?>
                    <div class="distributor_contact">
                      <b>Facebook: </b><br><a href="<?php echo $item->facebook; ?>"><?php echo $item->facebook; ?></a>
                    </div>
                  <?php endif; ?>
                </li>

              </ul>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>

      </ul>

      <div id="distributors_pagination">
        <?php echo $this->pagination->getPagesLinks(); ?>
      </div>

    </div>


  <?php else: ?>
    There are no items in the list
  <?php endif; ?>
</form>

