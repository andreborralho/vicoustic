<?php

/**
 * @version     1.0.0
 * @package     com_portfolio
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Portfolio records.
 */
class PortfoliosModelPortfolios extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {
        
        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);
        
        
		if(empty($ordering)) {
			$ordering = 'a.ordering';
		}
        
        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        $current_url = JURI::current();
        $url_parts = explode('/', $current_url);
        $url_market1 = $url_parts[3];
        $url_market2 = $url_parts[4];

        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );
        
        $query->from('`#__portfolios` AS a');
                        

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
        
        if($url_market1 == "music-broadcast" || $url_market2 == "music-broadcast"){
            $query->where('a.music_broadcast = 1');
        }
        elseif($url_market1 == "hifi-home-cinema" || $url_market2 == "hifi-home-cinema"){
            $query->where('a.hifi_home_cinema = 1');
        }
        elseif($url_market1 == "building-construction" || $url_market2 == "building-construction"){
            $query->where('a.building_construction = 1');
        }
        

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('( a.title LIKE '.$search.' )');
			}
		}
        


		//Filtering country
		$filter_country = $this->state->get("filter.country");
		if ($filter_country) {
			$query->where("a.country = '".$filter_country."'");
		}        
        
        return $query;
    }

}
