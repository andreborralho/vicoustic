<?php
	/**
	 * @version     1.0.0
	 * @package     com_antivibratics
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */

// No direct access.
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	/**
	 * Antivibratics model.
	 */
	class AntivibraticsModelAntivibratic extends JModelList {

		var $_item = null;

		protected function populateState() {
			$app = JFactory::getApplication('com_antivibratics');

			$id = JFactory::getApplication()->input->get('id');
			$this->setState('antivibratic.id', $id);

			// Load the parameters.
			$params = $app->getParams();
			$this->setState('params', $params);
		}

		public function &getData($id = null) {
			if ($this->_item === null) {
				$this->_item = false;

				if (empty($id)) {
					$id = $this->getState('antivibratic.id');
				}

				// Get a level row instance.
				$table = $this->getTable();

				// Attempt to load the row.
				if ($table->load($id)){
					if ($published = $this->getState('filter.published')) {
						if ($table->state != $published) {
							return $this->_item;
						}
					}
					// Convert the JTable to a clean JObject.
					$properties = $table->getProperties(1);
					$this->_item = JArrayHelper::toObject($properties, 'JObject');
				}
				elseif ($error = $table->getError()) {
					$this->setError($error);
				}
			}

			return $this->_item;
		}

		public function getTable($type = 'Antivibratic', $prefix = 'AntivibraticsTable', $config = array()) {
			return JTable::getInstance($type, $prefix, $config);
		}

		protected function getListQuery() {
			// Create a new query object.
			$db = $this->getDbo();

			$query = $db->getQuery(true);

			// Select the required fields from the table.
			$query->select($this->getState('list.select', 'a.*'));

			$query->from('`#__antivibratics` AS a');


			// Join over the portfolio field 'portfolio'
			$query->select('portfolio_photos1.id AS portfolio_photo1_id,
						portfolio_photos1.photo AS portfolio_photo1_photo, 
						portfolio_photos1.thumbnail AS portfolio_photo1_thumbnail, 
						portfolio_photos1.label AS portfolio_photo1_label');

			$query->join('LEFT', '#__portfolio_photos AS portfolio_photos1 ON portfolio_photo_id1 = portfolio_photos1.id');


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
		}

	}