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
        
		$query->select('portfolio_photos1.photo AS portfolio_photo1_photo, portfolio_photos1.label AS portfolio_photo1_label');
        $query->join('LEFT', '#__portfolio_photos AS portfolio_photos1 ON portfolio_photo_id1 = portfolio_photos1.id');
        
        $query->select('portfolio_photos2.photo AS portfolio_photo2_photo, portfolio_photos2.label AS portfolio_photo2_label');
        $query->join('LEFT', '#__portfolio_photos AS portfolio_photos2 ON portfolio_photo_id2 = portfolio_photos2.id');
        	
		// Join over the created by field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

	    // Filter by published state
	    $published = $this->getState('filter.state');
	    if (is_numeric($published)) {
	        $query->where('a.state = '.(int) $published);
	    } else {
	        $query->where('a.state_featured = 1 AND building_construction=1');
    	}
    

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('( a.name LIKE '.$search.'  OR  a.ref LIKE '.$search.'  OR  a.family LIKE '.$search.' )');
			}
		}
        
        
        
        return $query;
    }

}
