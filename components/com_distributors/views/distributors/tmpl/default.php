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
	$url_tokens = explode('/', JURI::current());
?>

<h1 class="page_title"><?php echo JText::_('WHERE_TO_BUY'); ?></h1>

<div id="distributors-map"></div>

<?php $countries = DistributorsHelper::listCountries($this->items); ?>

<form id="distributors-form" method="post">

	<a id="distributors-apply" href="https://visound.wufoo.eu/forms/new-distributor-form/">
		<img alt="Distributor Form" src="images/distributors/apply_button.png">
	</a>

	<div id="distributors-filters">
		<select id="filter-country" name="filter_country" onchange="this.form.submit();">
			<?php echo DistributorsHelper::countrySelectOptions($countries); ?>
		</select>
		<br>
		<button id="button-clear" type="button" onclick="window.open('<?php echo $url_tokens[3]; ?>/where-to-buy','_self')"><?php echo JText::_('SHOW_ALL'); ?></button>
	</div>

	<?php if($this->items) { ?>
		<ul id="distributors-list">

			<?php foreach ($this->items as $i=>$item) { ?>

				<?php if(!isset($_POST['filter_country']) || $_POST['filter_country'] == 'clear' || $item->country == $_POST['filter_country']) { ?>
					<li>
						<ul class="distributor-entry">
							<?php
								if (!empty($item->image)) {
									echo '<img class="distributor-image" alt="' . $item->name . '" src="' . $item->image . '">';
								}
							?>
							<li>
								<div class="distributor-name">
									<?php echo $this->escape($item->name); ?>
								</div>
							</li>
							<li class="distributor-country">
								<div>
									<?php echo $item->country; ?>
								</div>
							</li>
							<li class="distributor-address-title">
								<?php echo JText::_('ADDRESS') . ':'; ?>
							</li>
							<li class="distributor-address">
								<?php echo $item->address; ?>
								<div class="distributor-city">
									<?php echo $item->zippostalcode . ' ' . $item->city; ?>
								</div>
							</li>
							<li>
								<?php
									if (!empty($item->telephone)) {
										echo '<b>' . JText::_('PHONE') . ': </b>' . $item->telephone;
									}
								?>
							</li>
							<li>
								<?php if (!empty($item->email)) { ?>
									<div class="distributor-contact">
										<b><?php echo JText::_('EMAIL') . ':'; ?></b><br><a href="mailto:<?php echo $item->email; ?>"><?php echo $item->email; ?></a>
									</div>
								<?php } ?>
								<?php if (!empty($item->website)) { ?>
									<div class="distributor-contact">
										<b><?php echo JText::_('WEBSITE') . ':'; ?></b><br><a href="<?php echo $item->website; ?>"><?php echo $item->website; ?></a>
									</div>
								<?php } ?>
								<?php if(!empty($item->facebook)) { ?>
									<div class="distributor-contact">
										<b><?php echo JText::_('FACEBOOK') . ':'; ?></b><br><a href="<?php echo $item->facebook; ?>"><?php echo $item->facebook; ?></a>
									</div>
								<?php } ?>
							</li>

						</ul>
					</li>
				<?php } ?>
			<?php } ?>

		</ul>
	<?php
	}
	else {
		echo JText::_('NO_COUNTRIES');
	}
	?>
</form>

