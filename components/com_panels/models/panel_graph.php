<?php
	/**
	 * @version     1.0.0
	 * @package     com_panels
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre Borralho <andrefilipe_one@hotmail.com> - http://
	 */

// No direct access.
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	/**
	 * Panel_graphs model.
	 */
	class PanelsModelPanel_graph extends JModelList {

		var $_item = null;

		protected function populateState() {
			$app = JFactory::getApplication('com_panels');

			$id = JFactory::getApplication()->input->get('id');
			$this->setState('panel_graph.id', $id);

			// Load the parameters.
			$params = $app->getParams();
			$this->setState('params', $params);
		}

		public function &getData($id = null) {
			if ($this->_item === null) {
				$this->_item = false;

				if (empty($id)) {
					$id = $this->getState('panel_graph.id');
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
				}
				elseif ($error = $table->getError()) {
					$this->setError($error);
				}
			}

			return $this->_item;
		}

		public function getTable($type = 'Panel_graph', $prefix = 'PanelsTable', $config = array()) {
			return JTable::getInstance($type, $prefix, $config);
		}

	}