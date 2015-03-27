<?php
	/**
	 * @version     1.0.0
	 * @package     com_isolation_solutions
	 * @copyright   Copyright (C) 2013. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre <andrefilipe_one@hotmail.com> - http://
	 */


	// no direct access
	defined('_JEXEC') or die;
	$url_tokens = explode('/', JURI::current());
?>

<h1 class="page_title">
	<?php echo JText::_('ISOLATION_SIMULATOR'); ?>
</h1>

<ul class="items_list iso_items_list">
	<?php
		$show = false;
		$categories = array();

		foreach ($this->items as $item) {
			$categories[$item->category_id] = $item->category_name;
		}
	?>

	<div id="iso_categories_checkboxes">

		<?php
			foreach ($categories as $category) {
				echo '<div id="iso_category_' . $category .'" class="iso_category_button iso_simulator_button_checked">' . $category . '</div>';
			}

			$db = JFactory::getDBO();
			$query = "SELECT * FROM #__isolation_solution_currencies";
			$db->setQuery($query);
			$currency_items = $db->loadObjectList();
		?>

		<ul id="iso_currency_list">
			<select id="currency_list_form" name="currency_list_form">
				<option value="1" data-symbol="€"><?php echo JText::_('EURO'); ?></option>

				<?php
					foreach ($currency_items as $currency_item) {
						echo '<option value="' . $currency_item->exchange_rate . '" data-symbol="' . $currency_item->symbol .'">' . $currency_item->name . '</option>';
					}
				?>
			</select>
		</ul>

		<?php
			$db = JFactory::getDBO();
			$query = "SELECT * FROM #__isolation_solution_units";
			$db->setQuery($query);
			$unit_items = $db->loadObjectList();
		?>

		<ul id="iso_unit_list">
			<select id="unit_list_form" name="unit_list_form">
				<option value="1" data-symbol="m"><?php echo JText::_('METERS'); ?></option>

				<?php
					foreach ($unit_items as $unit_item) {
						echo '<option value="' . $unit_item->exchange_rate . '" data-symbol="' . $unit_item->symbol .'">' . $unit_item->name . '</option>';
					}
				?>
			</select>
		</ul>
	</div>

	<?php if($this->items) { ?>
		<?php foreach ($this->items as $item) { ?>

			<div class="iso_simulator_list_entry iso_category_<?php echo $item->category_name; ?>">

				<div class="iso_simulator_entry1">
					<img alt="" src="<?php echo $item->solution_image; ?>" width="225px" height="250px">
				</div>

				<div class="iso_simulator_entry2">
					<div class="iso_simulator_name">
						<?php
							echo $item->name;
							if(!empty($item->ref)) {
								echo '<br>Ref: ' . $item->ref;
							}
						?>
					</div>

					<div class="iso_simulator_values">
						<?php echo JText::_('RW') . ': ' . $item->rw . ' ' . JText::_('DB') . ' - ' . JText::_('STC') . ': ' . $item->stc . ' ' . JText::_('DB'); ?>
					</div>

					<img alt="Solution Graph" src="<?php echo $item->graph; ?>" width="300px" height="200px">
				</div>

				<div class="iso_simulator_entry3">
					<div class="iso_simulator_price">
						<?php echo JText::_('AVERAGE_PRICE') . ': '; ?>
						<span class="iso_price" data-price="<?php echo $item->price; ?>"><?php echo $item->price; ?></span>
						<span class="iso_currency_symbol">€</span>/<span class="iso_unit_symbol">m</span><span style="vertical-align:super; font-size:0.7em">2</span>
					</div>

					<div class="iso_simulator_links">
						<div class="iso_simulator_main_file">
							<?php
								if($item->solution_data_sheet) {
									echo '<a href="' . $item->solution_data_sheet . '">' . JText::_('SOLUTION_TECHNICAL_DATA_SHEET') . '</a>';
								}
							?>
						</div>

						<div class="iso_simulator_products">
							<div class="iso_simulator_links_label">
								<?php echo JText::_('PRODUCTS_USED_IN_THIS_SOLUTION') . ': '; ?>
							</div>

							<?php
								//echo renderRelatedProducts('antivibratic', $item->antivibratic1_id, $item->antivibratic1_name, 1, $url_tokens[3]);
								//por esta merda num helper que está estupido para caralho
								if(!empty($item->antivibratic1_id)) {
									echo '<a class="iso_simulator_product_links" href="' . $url_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic1_id . '">1 - ' . $item->antivibratic1_name . '</a><br>';
								}
								elseif(!empty($item->blanket1_id)) {
									echo '<a class="iso_simulator_product_links" href="' . $url_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket1_id . '">1 - ' . $item->blanket1_name . '</a><br>';
								}
							?>

							<?php if($item->antivibratic2_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic2_id; ?>">2 - <?php echo $item->antivibratic2_name; ?></a><br>
							<?php elseif($item->blanket2_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket2_id; ?>">2 - <?php echo $item->blanket2_name; ?></a><br>
							<?php endif; ?>

							<?php if($item->antivibratic3_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic3_id; ?>">3 - <?php echo $item->antivibratic3_name; ?></a><br>
							<?php elseif($item->blanket3_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket3_id; ?>">3 - <?php echo $item->blanket3_name; ?></a><br>
							<?php endif; ?>

							<?php if($item->antivibratic4_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic4_id; ?>">4 - <?php echo $item->antivibratic4_name; ?></a><br>
							<?php elseif($item->blanket4_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket4_id; ?>">4 - <?php echo $item->blanket4_name; ?></a><br>
							<?php endif; ?>

							<?php if($item->antivibratic5_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic5_id; ?>">5 - <?php echo $item->antivibratic5_name; ?></a><br>
							<?php elseif($item->blanket5_id != 0): ?>
								<a class="iso_simulator_product_links" href="<?php echo $url_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket5_id; ?>">5 - <?php echo $item->blanket5_name; ?></a><br>
							<?php endif; ?>
						</div>

						<?php if($item->technical_file1 || $item->technical_file2 || $item->technical_file3 || $item->technical_file4) :?>

							<div class="iso_simulator_files">
								<div class="iso_simulator_links_label">
									<?php echo JText::_('MORE_INFO_TO_DOWNLOAD') . ': '; ?>
								</div>

								<?php
									if($item->technical_file1) {
										$url = $item->technical_file1;
										$tokens = explode('/', $url);
										$last_url = $tokens[sizeof($tokens)-1];

										echo '<a href="' . $item->technical_file1 . '">' . $last_url .'</a><br>';
									}
								?>

								<?php if($item->technical_file2) :
									$url = $item->technical_file2;
									$tokens = explode('/', $url);
									$last_url = $tokens[sizeof($tokens)-1]; ?>

									<a href="<?php echo $item->technical_file2; ?>"><?php echo $last_url; ?></a><br>
								<?php endif;?>

								<?php if($item->technical_file3) :
									$url = $item->technical_file3;
									$tokens = explode('/', $url);
									$last_url = $tokens[sizeof($tokens)-1]; ?>
									<a href="<?php echo $item->technical_file3; ?>"><?php echo $last_url; ?></a><br>
								<?php endif;?>

								<?php if($item->technical_file4) :
									$url = $item->technical_file4;
									$tokens = explode('/', $url);
									$last_url = $tokens[sizeof($tokens)-1]; ?>
									<a href="<?php echo $item->technical_file4; ?>"><?php echo $last_url; ?></a><br>
								<?php endif;?>

							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
		<?php } ?>

	<?php }
	else { ?>
		There are no items in the list
	<?php } ?>
</ul>
