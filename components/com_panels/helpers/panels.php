<?php
	/**
	 * @version     1.0.0
	 * @package     com_panels
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */

	defined('_JEXEC') or die;

	abstract class PanelsHelper {

		public static function renderProductsImage($product) {
			$html_output = '<img alt="' . $product->family . '" ';
			if($product->photo_150px) {
				$html_output .= 'src="' . $product->photo_150px . '">';
			}
			else {
				$html_output .= 'class="products_list_not_available" src="images/not_available_medium.png">';
			}
			return $html_output;
		}

		public static function renderProductsIcons($image_src, $image_label, $value, $class) {
			return '<img title="' . $image_label . '" alt="' . $image_label . '" src="' . $image_src . '">
		<div class="products_list_icon ' . $class . '">' .  $value . '</div>';
		}

		public static function renderProductsIconsOptions($options, $images_srcs, $images_labels, $value, $unit, $class) {
			foreach($options as $index => $option) {
				if($option == strtolower($value)) {
					return '<img title="' . $images_labels[$index] . '" alt="' . $images_labels[$index] . '" src="' . $images_srcs[$index] . '">
				<div class="products_list_icon ' . $class . '">' .  $value . ' ' . $unit . '</div>';
				}
			}
			return false;
		}

		public static function renderIconsProperty($property, $unit = '') {
			if(!empty($property) && $property !== '0.0' && $property !== '0.00' && $property !== '0.000') {
				return $property . ' ' . $unit;
			}
			return JText::_('NA');
		}

		public static function renderProductGalleryImage($product, $panel_ref = '') {
			$html_output = '<img alt="' . $product->name . '" ';
			$image300_by_ref = getimagesize('images/panels/photos_300px/'. $panel_ref .'_220.png');
			$image1024_by_ref = getimagesize('images/panels/photos_1024px/'. $panel_ref .'_HD.png');

			if(!empty($product->photo_300px) && !empty($product->photo_1024px)) {
				$html_output .= 'src="/' . $product->photo_300px . '" data-big="' . JURI::root() . $product->photo_1024px . '">';
			}
			elseif(!empty($product->photo_300px)) {
				$html_output .= 'src="/' . $product->photo_300px . '">';
			}
			elseif(is_array($image300_by_ref)) {
				$html_output .= 'src="/images/panels/photos_300px/' . $panel_ref . '_220.png" ';

				if (is_array($image1024_by_ref)) {
					$html_output .= 'data-big="' . JURI::root() . '/images/panels/photos_1024px/' . $panel_ref . '_HD.png"';
				}
				$html_output .= '>';
			}
			else {
				$html_output .= 'src="/images/not_available_medium.png" style="padding-top:20px">';
			}
			return $html_output;
		}

		public static function renderProductGallerySubImage($photo) {
			if(!empty($photo)) {
				return '<img alt="" src="/' . $photo . '">';
			}
			return false;
		}

		public static function renderProductFileLink($file, $file_label) {
			if(!empty($file)) {
				return '<li class="product_link"><img alt="" src="/images/icons/plus_arrow.gif"><a class="product_links_a" href="' . $file . '"> ' . $file_label . '</a></li>';
			}
			return false;
		}

		public static function renderTechnicalProperty($property, $label, $unit = '') {
			if(!empty($property) && $property !== '0.0' && $property !== '0.00' && $property !== '0.000') {
				return '<li><b>' . $label . ': </b>' . $property . ' ' . $unit . '</li>';
			}
			return false;
		}

		public static function renderTechnicalPropertyYesNo($property, $label) {
			$html_output = '<li><b>' . $label . ': </b>';

			if($property == 1) {
				$html_output .= JText::_('_YES');
			}
			else {
				$html_output .= JText::_('_NO');
			}
			return $html_output . '</li>';
		}

		public static function renderTechnicalPropertyYes($property, $label) {
			if($property == 1) {
				return '<li><b>' . $label . ': </b>' . JText::_('_YES') . '</li>';
			}
			return false;
		}

		public static function renderProductPortfolioImage2($product_photo_id, $portfolio_photo_id, $portfolio_thumbnail, $portfolio_label) {
			if(!empty($portfolio_photo_id) && $portfolio_photo_id == $product_photo_id) {
				return '<div class="product_portfolio_image"><img alt="" src="/' . $portfolio_thumbnail . '"><div>' . $portfolio_label . '</div></div>';
			}
			return false;
		}

		public static function renderProductPortfolioImage($portfolio_photo_id, $portfolio_thumbnail, $portfolio_label) {
			if(!empty($portfolio_photo_id) && !empty($portfolio_thumbnail)) {
				$html_output = '<div class="product_portfolio_image"><img alt="" src="/' . $portfolio_thumbnail . '">';

				if(!empty($portfolio_label)) {
					$html_output .= '<div>' . $portfolio_label . '</div>';
				}
				$html_output .= '</div>';

				return $html_output;
			}
			return false;
		}

		public static function hasSimilarProducts($products, $current_product) {
			foreach ($products as $key => $product) {
				if($product->family == $current_product->family && $current_product->id != $product->id) {
					return true;
				}
			}
			return false;
		}

		public static function renderSimilarProductImage($product, $href) {
			$html_output = '<a class="product_similar_link" href="' .  $href . '" ';
			if($product->photo_150px) {
				$html_output .= 'rel="/' . $product->photo_150px . '">' . $product->name . '</a>';
			}
			else {
				$html_output .=  'rel="/images/not_available_medium.png">' . $product->name . '</a>';
			}
			return $html_output;
		}

		public static function seoUrl($string) {
			//Make alphanumeric (removes all other characters)
			$string = preg_replace("/[^a-zA-Z0-9_\s-]/", "", $string);
			//Clean up multiple dashes or whitespaces
			$string = preg_replace("/[\s-]+/", " ", $string);
			//Convert whitespaces and underscore to dash
			$string = preg_replace("/[\s_]/", "-", $string);
			return $string;
		}

		public static function renderInterval($min, $max, $unit) {
			$html_output = $min . ' ';
			if($min == $max) {
				$html_output .= $unit;
			}
			else {
				$html_output .= JText::_('TO') . ' ' . $max . ' ' . $unit;
			}
			return $html_output;
		}

		public static function renderDimensionsProperty($length, $width, $height, $label, $unit) {
			if($length > 0 && $width > 0) {
				$html_output = '<li><b>' . $label . ': </b>' . number_format((float)$length, 0, '.', '') . ' x ' . number_format((float)$width, 0, '.', '');
				if($height > 0) {
					$html_output .= ' x ' . number_format((float)$height, 0, '.', '');
				}
				$html_output .=  ' ' .  $unit . '</li>';
				return $html_output;
			}
			return false;
		}

		public static function render2Dimensions($length, $width, $unit) {
			if($length > 0 && $width > 0) {
				return number_format((float)$length, 0, '.', '') . ' x ' . number_format((float)$width, 0, '.', '') . ' ' .  $unit;
			}
			return false;
		}

		public static function render3Dimensions($length, $width, $height, $unit) {
			if($length > 0 && $width > 0) {
				return number_format((float)$length, 0, '.', '') . ' x ' . number_format((float)$width, 0, '.', '') . ' x ' . number_format((float)$height, 0, '.', '') . ' ' .  $unit;
			}
			return false;
		}

		public static function renderMultipleWords($properties) {
			$comma_span = '<span >,</span > ';
			$words = array();

			foreach($properties as $label => $property) {
				if($property == 1) {
					array_push($words, $label);
				}
			}

			return implode ($comma_span, $words);
		}

		public static function renderDoorIcon($includes, $has_property, $image_icon, $label) {
			if(!$includes && $has_property == 0) {
				return '<div class="door_icon"><img alt="' . $label . '" src="' . $image_icon . '">' . $label . '</div>';
			}
			else if($includes && $has_property == 1) {
				return '<div class="door_icon"><img alt="' . $label . '" src="' . $image_icon . '">' . $label . '</div>';
			}
		}

		public static function renderDoorOptionCell($option, $label, $ref, $msrp, $unit) {
			if ($option == 0) {
				return '<tr><td>' . $label . '</td><td>' . $ref . '</td><td>' . ($msrp == 0 ? JText::_('NA') : ($msrp . ' ' . $unit)) . '</td></tr>';
			}
			return false;
		}

	}

