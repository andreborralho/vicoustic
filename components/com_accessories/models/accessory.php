<?php
  /**
   * @version     1.0.0
   * @package     com_accessories
   * @copyright   Copyright (C) 2013. All rights reserved.
   * @license     GNU General Public License version 2 or later; see LICENSE.txt
   * @author      Andre <andrefilipe_one@hotmail.com> - http://
   */

// No direct access.
  defined('_JEXEC') or die;

  jimport('joomla.application.component.modellist');

  /**
   * Accessories model.
   */
  class AccessoriesModelAccessory extends JModelList {

	var $_item = null;

	protected function populateState() {
	  $app = JFactory::getApplication('com_accessories');

	  $id = JFactory::getApplication()->input->get('id');
	  $this->setState('accessory.id', $id);

	  // Load the parameters.
	  $params = $app->getParams();
	  $this->setState('params', $params);
	}


	/**
	 * Method to get an ojbect.
	 *
	 * @param	integer	The id of the object to get.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function &getData($id = null) {
	  if ($this->_item === null) {
		$this->_item = false;

		if (empty($id)) {
		  $id = $this->getState('accessory.id');
		}

		// Get a level row instance.
		$table = $this->getTable();

		// Attempt to load the row.
		if ($table->load($id)) {
		  // Check published state.
		  if ($published = $this->getState('filter.published')) {
			if ($table->state != $published) {
			  return $this->_item;
			}
		  }

		  // Convert the JTable to a clean JObject.
		  $properties = $table->getProperties(1);
		  $this->_item = JArrayHelper::toObject($properties, 'JObject');
		} elseif ($error = $table->getError()) {
		  $this->setError($error);
		}
	  }

	  return $this->_item;
	}

	public function getTable($type = 'Accessory', $prefix = 'AccessoriesTable', $config = array()) {
	  return JTable::getInstance($type, $prefix, $config);
	}

	protected function getListQuery() {
	  // Create a new query object.
	  $db = $this->getDbo();

	  $query = $db->getQuery(true);

	  // Select the required fields from the table.
	  $query->select(
		$this->getState(
		  'list.select', 'a.*', 'portfolio_photos1.*'
		)
	  );

	  $query->from('`#__accessories` AS a');

	  // Join over the portfolio field 'portfolio'
	  $query->select('portfolio_photos1.id AS portfolio_photo1_id,
						portfolio_photos1.photo AS portfolio_photo1_photo,
						portfolio_photos1.thumbnail AS portfolio_photo1_thumbnail,
						portfolio_photos1.label AS portfolio_photo1_label');

	  $query->join('LEFT', '#__portfolio_photos AS portfolio_photos1 ON portfolio_photo_id1 = a.portfolio_photo_id1');


	  $query->select('portfolio_photos2.id AS portfolio_photo2_id,
						portfolio_photos2.photo AS portfolio_photo2_photo,
						portfolio_photos2.thumbnail AS portfolio_photo2_thumbnail,
		 				portfolio_photos2.label AS portfolio_photo2_label');

	  $query->join('LEFT', '#__portfolio_photos AS portfolio_photos2 ON portfolio_photo_id2 = portfolio_photos2.id');


	  // Filter by published state
	  $published = $this->getState('filter.state');

	  if (is_numeric($published)) {
		$query->where('a.state = '.(int) $published);
	  } else {
		$query->where('a.state = 1');
	  }

	  return $query;
	  //return $db->loadObjectList();

	}

  }