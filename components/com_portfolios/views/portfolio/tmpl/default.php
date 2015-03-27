<?php
	/**
	 * @version     1.0.0
	 * @package     com_portfolio
	 * @copyright   Copyright (C) 2013. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre <andrefilipe_one@hotmail.com> - http://
	 */

	// no direct access
	defined('_JEXEC') or die;

	//Load admin language file
	$lang = JFactory::getLanguage();
	$lang->load('com_portfolios', JPATH_ADMINISTRATOR);

	$document = JFactory::getDocument();
	$document->addScript('//code.jquery.com/jquery-2.1.3.min.js');

	$url = JURI::current();
	$tokens = explode('/', $url);
	$last_url = $tokens[sizeof($tokens)-1];
?>

<?php if( $this->item ) : ?>

	<div class="item_fields">

		<ul class="fields_list portfolio_fields_list">

			<li class="portfolio_title"><?php echo $this->item->title; ?></li>

			<li class="portfolio_category">
				<?php if($this->item->category_education == 1): ?>
					Education
				<?php endif; ?>
				<?php if($this->item->category_healthcare == 1): ?>
					Healthcare
				<?php endif; ?>
				<?php if($this->item->category_transports == 1): ?>
					Transports
				<?php endif; ?>
				<?php if($this->item->category_retail_leisure == 1): ?>
					Retail and Leisure
				<?php endif; ?>
				<?php if($this->item->category_office == 1): ?>
					Office
				<?php endif; ?>
				<?php if($this->item->category_hifi_home_cinema == 1): ?>
					Hi-Fi and Home Cinema
				<?php endif; ?>
				<?php if($this->item->category_theatre == 1): ?>
					Theatre
				<?php endif; ?>
				<?php if($this->item->category_outdoor == 1): ?>
					Outdoor
				<?php endif; ?>
			</li>

			<li class="portfolio_country">
				<?php if(isset($this->item->country)){
					echo $this->item->country;
				} ?>
			</li>

			<?php if (isset($_POST['viewall'])): ?>
				<div id="portfolio_thumbnails">
					<?php foreach ($this->items as $i=>$item) :	?>
						<?php if($item->photo_portfolio_id == $this->item->id) : ?>

							<div class="portfolio_photos">
								<img alt="<?php echo $item->photo_label; ?>" src="<?php echo $item->photo_photo; ?>" width="390px" height="260px">
								<?php echo $item->photo_label; ?>
							</div>
						<?php endif;?>
					<?php endforeach;?>

				</div>

			<?php else :?>

				<div id="portfolio_galleria">
					<?php foreach ($this->items as $i=>$item) :	?>
						<?php if($item->photo_portfolio_id == $this->item->id) : ?>

							<img alt="<?php echo $item->photo_label; ?>" src="<?php echo $item->photo_photo; ?>" data-title="<?php echo $item->photo_label; ?>" width="730px">

						<?php endif;?>
					<?php endforeach;?>
				</div>

				<div id="portfolio_showAll">
					<form method="post" target="_blank">
						<input type="hidden" name="viewall" value="true">
						<button onclick="this.form.submit();">Show All</button>
					</form>
				</div>

				<?php
				$visited1=false; $portfolio_product1;
				$visited2=false; $portfolio_product2;
				$visited3=false; $portfolio_product3;
				$visited4=false; $portfolio_product4;
				$visited5=false; $portfolio_product5;
				$visited6=false; $portfolio_product6;
				$visited7=false; $portfolio_product7;
				$visited8=false; $portfolio_product8;
				$visited9=false; $portfolio_product9;
				$visited10=false; $portfolio_product10;
				$visited11=false; $portfolio_product11;
				$visited12=false; $portfolio_product12;
				?>


				<?php foreach ($this->items as $i=>$item) :?>

				<?php if($this->item->panel_id1 != 0 && $this->item->panel_id1 == $item->panel_id1 && !$visited1): ?>
					<?php
					$visited1 = true;
					$portfolio_product1 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id2 != 0 && $item->panel_id2 == $this->item->panel_id2 && !$visited2): ?>
					<?php
					$visited2 = true;
					$portfolio_product2 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id3 != 0 && $item->panel_id3 == $this->item->panel_id3 && !$visited3): ?>
					<?php
					$visited3 = true;
					$portfolio_product3 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id4 != 0 && $item->panel_id4 == $this->item->panel_id4 && !$visited4): ?>
					<?php
					$visited4 = true;
					$portfolio_product4 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id5 != 0 && $item->panel_id5 == $this->item->panel_id5 && !$visited5): ?>
					<?php
					$visited5 = true;
					$portfolio_product5 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id6 != 0 && $item->panel_id6 == $this->item->panel_id6 && !$visited6): ?>
					<?php
					$visited6 = true;
					$portfolio_product6 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id7 != 0 && $item->panel_id7 == $this->item->panel_id7 && !$visited7): ?>
					<?php
					$visited7 = true;
					$portfolio_product7 = $item;
					?>
				<?php endif;?>

				<?php if($item->panel_id8 != 0 && $item->panel_id8 == $this->item->panel_id8 && !$visited8): ?>
					<?php
					$visited8 = true;
					$portfolio_product8 = $item;
					?>
				<?php endif;?>

				<?php if($item->door_id != 0 && $item->door_id == $this->item->door_id && !$visited9): ?>
					<?php
					$visited9 = true;
					$portfolio_product9 = $item;
					?>
				<?php endif;?>

				<?php if($item->blanket_id != 0 && $item->blanket_id == $this->item->blanket_id && !$visited10): ?>
					<?php
					$visited10 = true;
					$portfolio_product10 = $item;
					?>
				<?php endif;?>

				<?php if($item->antivibratic_id1 != 0 && $item->antivibratic_id1 == $this->item->antivibratic_id1 && !$visited11): ?>
					<?php
					$visited11 = true;
					$portfolio_product11 = $item;
					?>
				<?php endif;?>

				<?php if($item->antivibratic_id2 != 0 && $item->antivibratic_id2 == $this->item->antivibratic_id2 && !$visited12): ?>
					<?php
					$visited12 = true;
					$portfolio_product12 = $item;
					?>
				<?php endif;?>

			<?php endforeach ;?>

				<?php if($visited1 || $visited2 || $visited3 || $visited4 || $visited5 || $visited6 || $visited7 || $visited8 ||
				$visited9 || $visited10 || $visited11 || $visited12): ?>
				<div id="portfolio_products">
					<li id="portfolio_products_title">
						<?php echo JText::_('COM_PORTFOLIOS_LEGEND_PRODUCTS'); ?>:
					</li>


					<?php if($visited1): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product1->panel1_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product1->panel1_ref .'_150.png'); ?>

								<?php if($portfolio_product1->panel1_photo): ?>
									<img alt="<?php echo $portfolio_product1->panel1_name; ?>" src="<?php echo $portfolio_product1->panel1_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product1->panel1_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product1->panel1_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product1->panel1_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product1->panel1_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited2): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product2->panel2_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product2->panel2_ref .'_150.png'); ?>

								<?php if($portfolio_product2->panel2_photo): ?>
									<img alt="<?php echo $portfolio_product2->panel2_name; ?>" src="<?php echo $portfolio_product2->panel2_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product2->panel2_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product2->panel2_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product2->panel2_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product2->panel2_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited3): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product3->panel3_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product3->panel3_ref .'_150.png'); ?>

								<?php if($portfolio_product3->panel3_photo): ?>
									<img alt="<?php echo $portfolio_product3->panel3_name; ?>" src="<?php echo $portfolio_product3->panel3_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product3->panel3_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product3->panel3_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product3->panel3_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product3->panel3_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited4): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product4->panel4_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product4->panel4_ref .'_150.png'); ?>

								<?php if($portfolio_product4->panel4_photo): ?>
									<img alt="<?php echo $portfolio_product4->panel4_name; ?>" src="<?php echo $portfolio_product4->panel4_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product4->panel4_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product4->panel4_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product4->panel4_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product4->panel4_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited5): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product5->panel5_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product5->panel5_ref .'_150.png'); ?>

								<?php if($portfolio_product5->panel5_photo): ?>
									<img alt="<?php echo $portfolio_product5->panel5_name; ?>" src="<?php echo $portfolio_product5->panel5_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product5->panel5_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product5->panel5_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product5->panel5_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product5->panel5_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited6): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product6->panel6_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product6->panel6_ref .'_150.png'); ?>

								<?php if($portfolio_product6->panel6_photo): ?>
									<img alt="<?php echo $portfolio_product6->panel6_name; ?>" src="<?php echo $portfolio_product6->panel6_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product6->panel6_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product6->panel6_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product6->panel6_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product6->panel6_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited7): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product7->panel7_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product7->panel7_ref .'_150.png'); ?>

								<?php if($portfolio_product7->panel7_photo): ?>
									<img alt="<?php echo $portfolio_product7->panel7_name; ?>" src="<?php echo $portfolio_product7->panel7_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product7->panel7_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product7->panel7_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product7->panel7_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product7->panel7_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited8): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$portfolio_product8->panel8_id; ?>">
							<div class="portfolio_product_image">
								<?php $url=getimagesize('images/panels/photos_150px/'. $portfolio_product8->panel8_ref .'_150.png'); ?>

								<?php if($portfolio_product8->panel8_photo): ?>
									<img alt="<?php echo $portfolio_product8->panel8_name; ?>" src="<?php echo $portfolio_product8->panel8_photo; ?>" width="150px" height="150px">
								<?php elseif(!is_array($url)): ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product8->panel8_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php else : ?>
									<img alt="<?php echo $portfolio_product8->panel8_name; ?>" src="images/panels/photos_150px/<?php echo $portfolio_product8->panel8_ref; ?>_150.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product8->panel8_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited9): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/doors/door/' . (int)$portfolio_product9->door_id; ?>">
							<div class="portfolio_product_image">
								<?php if($portfolio_product9->door_photo): ?>
									<img alt="<?php echo $portfolio_product9->door_name; ?>" src="<?php echo $portfolio_product9->door_photo; ?>" width="150px" height="150px">
								<?php else : ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product9->door_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product9->door_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited10): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/blankets/blanket/' . (int)$portfolio_product10->blanket_id; ?>">
							<div class="portfolio_product_image">
								<?php if($portfolio_product10->blanket_photo): ?>
									<img alt="<?php echo $portfolio_product10->blanket_name; ?>" src="<?php echo $portfolio_product10->blanket_photo; ?>" width="150px" height="150px">
								<?php else : ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product10->blanket_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product10->blanket_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited11): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$portfolio_product11->antivibratic1_id; ?>">
							<div class="portfolio_product_image">
								<?php if($portfolio_product11->antivibratic1_photo): ?>
									<img alt="<?php echo $itportfolio_product11em->antivibratic1_name; ?>" src="<?php echo $portfolio_product11->antivibratic1_photo; ?>" width="150px" height="150px">
								<?php else : ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product11->antivibratic1_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product11->antivibratic1_name; ?></div>
						</a>
					<?php endif; ?>

					<?php if($visited12): ?>
						<a class="portfolio_product" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$portfolio_product12->antivibratic2_id; ?>">
							<div class="portfolio_product_image">
								<?php if($portfolio_product12->antivibratic2_photo): ?>
									<img alt="<?php echo $portfolio_product12->antivibratic2_name; ?>" src="<?php echo $portfolio_product12->antivibratic2_photo; ?>" width="150px" height="150px">
								<?php else : ?>
									<img class="portfolio_not_available" alt="<?php echo $portfolio_product12->antivibratic2_name; ?>" src="images/not_available_medium.png" width="150px" height="150px">
								<?php endif; ?>
							</div>
							<div><?php echo $portfolio_product12->antivibratic2_name; ?></div>
						</a>
					<?php endif; ?>

				</div>
			<?php endif; ?>
			<?php endif; ?>

		</ul>

	</div>

<?php else: ?>
	Could not load the item
<?php endif; ?>
