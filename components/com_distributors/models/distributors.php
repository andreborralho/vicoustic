<?php

  /**
   * @version     1.0.3
   * @package     com_distributors
   * @copyright   Copyright (C) 2012. All rights reserved.
   * @license     GNU General Public License version 2 or later; see LICENSE.txt
   * @author      Andre <andrefilipe_one@hotmail.com> - http://
   */
  defined('_JEXEC') or die;

  jimport('joomla.application.component.modellist');

  /**
   * Methods supporting a list of Distributors records.
   */
  class DistributorsModelDistributors extends JModelList {

	public function __construct($config = array()) {
	  parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null) {

	  // Initialise variables.
	  $app = JFactory::getApplication();

	  // List state information
	  $this->setState('list.limit', 0);

	  // Load the filter state.
	  $search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
	  $this->setState('filter.search', $search);

	  $published = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_published', '', 'string');
	  $this->setState('filter.state', $published);

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

	  $query->from('`#__distributors` AS a');
	  $query->order('a.name');

	  // Join over the created by field 'created_by'
	  $query->select('created_by.name AS created_by');
	  $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');


	  // Filter by published state
	  $published = $this->getState('filter.state');
	  if (is_numeric($published)) {
		$query->where('a.state = '.(int) $published);
	  } else {
		$query->where('(a.state = 1)');
	  }


	  if(strpos(JURI::current(),'music-broadcast') !== false) {
		$query->where('a.music_broadcast = 1');
	  }
	  elseif(strpos(JURI::current(),'hifi-home-cinema') !== false){
		$query->where('a.hifi_home_cinema = 1');
	  }
	  elseif(strpos(JURI::current(),'building-construction') !== false){
		$query->where('a.building_construction = 1');
	  }

	  return $query;
	}

  }
