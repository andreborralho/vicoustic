<?php
	/**
	 * @version     1.0.0
	 * @package     com_accessories
	 * @copyright   Copyright (C) 2013. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre <andrefilipe_one@hotmail.com> - http://
	 */

	defined('_JEXEC') or die;

	abstract class AccessoriesHelper {

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

		public static function renderProductGalleryImage($product) {
			$html_output = '<img alt="' . $product->name . '" ';
			if(!empty($product->photo_300px) && !empty($product->photo_1024px)) {
				$html_output .= 'src="/' . $product->photo_300px . '" data-big="' . JURI::root() . $product->photo_1024px . '">';
			}
			elseif(!empty($product->photo_300px)) {
				$html_output .= 'src="/' . $product->photo_300px . '">';
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
		}

		public static function renderProductFileLink($file, $file_label) {
			if(!empty($file)) {
				return '<li class="product_link"><img alt="" src="/images/icons/plus_arrow.gif"><a class="product_links_a" href="' . $file . '"> ' . $file_label . '</a></li>';
			}
		}

		public static function renderTechnicalProperty($property, $label, $units = '') {
			if(!empty($property) && $property !== '0.0' && $property !== '0.00' && $property !== '0.000') {
				return '<li><b>' . $label . ': </b>' . $property . ' ' . $units . '</li>';
			}
		}

		public static function renderProductPortfolioImage($product_photo_id, $portfolio_photo_id, $portfolio_thumbnail, $portfolio_label) {
			if(!empty($portfolio_photo_id) && $portfolio_photo_id == $product_photo_id) {
				return '<div class="product_portfolio_image"><img alt="" src="/' . $portfolio_thumbnail . '"><div>' . $portfolio_label . '</div></div>';
			}
		}

		public static function hasSimilarProducts($products, $current_product) {
			foreach ($products as $key => $product) {
				if($product->family == $current_product->family && $current_product->id != $product->id) {
					return true;
				}
			}
			return false;
		}

		public static function renderSimilarProductImage($product) {
			$html_output = '<a class="product_similar_link" href="' .  JRoute::_('index.php?option=com_accessories&view=accessory&id=' . (int)$product->id) . '" ';
			if($product->photo_150px) {
				$html_output .= 'rel="/' . $product->photo_150px . '">' . $product->name . '</a>';
			}
			else {
				$html_output .=  'rel="/images/not_available_medium.png">' . $product->name . '</a>';
			}
			return $html_output;
		}

		public static function seoUrl($string) {
			//Lower case everything
			$string = strtolower($string);
			//Make alphanumeric (removes all other characters)
			$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
			//Clean up multiple dashes or whitespaces
			$string = preg_replace("/[\s-]+/", " ", $string);
			//Convert whitespaces and underscore to dash
			$string = preg_replace("/[\s_]/", "-", $string);
			return $string;
		}

	}

