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
  class Isolation_solutionsModelIsolations extends JModelList {

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

	  $query->from('`#__isolation_solutions` AS a');

	  $query->select('category.name AS category_name');
	  $query->join('LEFT', '#__isolation_solution_categories AS category ON category_id = category.id');

	  $query->select('antivibratics1.id AS antivibratic1_id,
                        antivibratics1.name AS antivibratic1_name');
	  $query->join('LEFT', '#__antivibratics AS antivibratics1 ON antivibratic_id1 = antivibratics1.id');

	  $query->select('antivibratics2.id AS antivibratic2_id,
                        antivibratics2.name AS antivibratic2_name');
	  $query->join('LEFT', '#__antivibratics AS antivibratics2 ON antivibratic_id2 = antivibratics2.id');

	  $query->select('antivibratics3.id AS antivibratic3_id,
                        antivibratics3.name AS antivibratic3_name');
	  $query->join('LEFT', '#__antivibratics AS antivibratics3 ON antivibratic_id3 = antivibratics3.id');

	  $query->select('antivibratics4.id AS antivibratic4_id,
                        antivibratics4.name AS antivibratic4_name');
	  $query->join('LEFT', '#__antivibratics AS antivibratics4 ON antivibratic_id4 = antivibratics4.id');

	  $query->select('antivibratics5.id AS antivibratic5_id,
                        antivibratics5.name AS antivibratic5_name');
	  $query->join('LEFT', '#__antivibratics AS antivibratics5 ON antivibratic_id5 = antivibratics5.id');


	  $query->select('blankets1.id AS blanket1_id,
                        blankets1.name AS blanket1_name');
	  $query->join('LEFT', '#__blankets AS blankets1 ON blanket_id1 = blankets1.id');

	  $query->select('blankets2.id AS blanket2_id,
                        blankets2.name AS blanket2_name');
	  $query->join('LEFT', '#__blankets AS blankets2 ON blanket_id2 = blankets2.id');

	  $query->select('blankets3.id AS blanket3_id,
                        blankets3.name AS blanket3_name');
	  $query->join('LEFT', '#__blankets AS blankets3 ON blanket_id3 = blankets3.id');

	  $query->select('blankets4.id AS blanket4_id,
                        blankets4.name AS blanket4_name');
	  $query->join('LEFT', '#__blankets AS blankets4 ON blanket_id4 = blankets4.id');

	  $query->select('blankets5.id AS blanket5_id,
                        blankets5.name AS blanket5_name');
	  $query->join('LEFT', '#__blankets AS blankets5 ON blanket_id5 = blankets5.id');


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

	  // Filter by published state
	  $published = $this->getState('filter.state');
	  if (is_numeric($published)) {
		$query->where('a.state = '.(int) $published);
	  } else {
		$query->where('(a.state = 1)');
	  }

	  return $query;
	}

  }
