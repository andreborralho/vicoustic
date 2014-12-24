<?php

  /**
   * @version     1.0.0
   * @package     com_isolation_solutions
   * @copyright   Copyright (C) 2013. All rights reserved.
   * @license     GNU General Public License version 2 or later; see LICENSE.txt
   * @author      Andre <andrefilipe_one@hotmail.com> - http://
   */
  defined('_JEXEC') or die;

  jimport('joomla.application.component.modellist');

  /**
   * Methods supporting a list of Isolation_solutions records.
   */
  class Isolation_solutionsModelIsolation_currencies extends JModelList {

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

	  // List state information.
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

	  $query->from('`#__isolation_solution_currencies` AS a');


	  // Join over the created by field 'created_by'
	  $query->select('created_by.name AS created_by');
	  $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');


	  // Filter by search in title
	  $search = $this->getState('filter.search');
	  if (!empty($search)) {
		if (stripos($search, 'id:') === 0) {
		  $query->where('a.id = '.(int) substr($search, 3));
		} else {
		  $search = $db->Quote('%'.$db->escape($search, true).'%');

		}
	  }

	  return $query;
	}

  }
