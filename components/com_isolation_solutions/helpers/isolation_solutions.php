<?php
  /**
   * @version     1.0.0
   * @package     com_isolation_solutions
   * @copyright   Copyright (C) 2013. All rights reserved.
   * @license     GNU General Public License version 2 or later; see LICENSE.txt
   * @author      Andre <andrefilipe_one@hotmail.com> - http://
   */

  defined('_JEXEC') or die;

  abstract class Isolation_solutionsHelper {

	public static function renderRelatedProducts($product_type, $product_id, $product_name, $number, $url_token) {
	  $html_output = '<a class="iso_simulator_product_links" href="' . $url_token . '/products/insulation/';
	  if($product_type == 'antivibratic') {
		$html_output .= 'antivibratics/antivibratic/';
	  }
	  elseif($product_type == 'blanket') {
		$html_output .= 'blankets/blanket/';
	  }

	  if(!empty($product_id)) {
		$html_output .= (int)$product_id . '">' . $number . ' - ' . $product_name . '</a><br>';
		return $html_output;
	  }
	}

  }

