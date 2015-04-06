<?php

	/**
	 * @version     1.0.0
	 * @package     com_doors
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre <andrefilipe_one@hotmail.com> - http://
	 */
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	/**
	 * Methods supporting a list of doors records.
	 */
	class DoorsModelDoors extends JModelList {

		public function __construct($config = array()) {
			parent::__construct($config);
		}

		protected function populateState($ordering = null, $direction = null) {
			// List state information
			$this->setState('list.limit', 0);
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

			$query->from('`#__doors` AS a');

			// Filter by published state
			$query->where('a.state_featured = 1');

			return $query;
		}

	}
