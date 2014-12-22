<?php
  /**
   * @version     1.0.3
   * @package     com_distributors
   * @copyright   Copyright (C) 2012. All rights reserved.
   * @license     GNU General Public License version 2 or later; see LICENSE.txt
   * @author      Andre <andrefilipe_one@hotmail.com> - http://
   */

  defined('_JEXEC') or die;

  abstract class DistributorsHelper {

	public static function listCountries($items) {
	  $countries = array();

	  foreach ($items as $i=>$item) {
		if($item->state == 1) {
		  $countries[] = $item->country;
		}
	  }

	  sort($countries);
	  $countries = array_unique($countries);
	  return $countries;
	}

	public static function countrySelectOptions($countries) {
	  $html_output = '<option value="clear">Please select a country</option>';
	  foreach ($countries as $value) {
		if($value == $_POST['filter_country']) {
		  $html_output .= '<option class="country-option" value="' . $value . '" selected="selected">' . $value . '</option>';
		}
		else {
		  $html_output .= '<option class="country-option" value="' . $value . '">' . $value . '</option>';
		}
	  }

	  return $html_output;
	}

  }

