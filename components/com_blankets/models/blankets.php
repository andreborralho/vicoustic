<?php

	/**
	 * @version     1.0.0
	 * @package     com_blankets
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	/**
	 * Methods supporting a list of Blankets records.
	 */
	class BlanketsModelBlankets extends JModelList {

		public function __construct($config = array()) {
			parent::__construct($config);
		}

		protected function populateState($ordering = null, $direction = null) {
			// Initialise variables.
			$app = JFactory::getApplication();

			// List state information
			$limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
			$this->setState('list.limit', $limit);

			$limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
			$this->setState('list.start', $limitstart);

			parent::populateState($ordering, $direction);
		}

		protected function getListQuery() {
			// Create a new query object.
			$db = $this->getDbo();
			$query = $db->getQuery(true);

			// Select the required fields from the table.
			$query->select(
				$this->getState(
					'list.select', 'a.*'
				)
			);

			$query->from('`#__blankets` AS a');

			// Filter by published state
			$published = $this->getState('filter.state');
			if (is_numeric($published)) {
				$query->where('a.state = '.(int) $published);
			} else {
				$query->where('a.state_featured = 1');
			}

			return $query;
		}

	}
