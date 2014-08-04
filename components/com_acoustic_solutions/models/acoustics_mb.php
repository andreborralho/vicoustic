<?php

/**
 * @version     1.0.0
 * @package     com_acoustic_simulator_component
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Acoustic_simulator_component records.
 */
class Acoustic_solutionsModelAcoustics_mb extends JModelList {

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
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );
        
        $query->from('`#__acoustic_solutions_mb` AS a');
      
        $query->select('room.name AS room_name');
        $query->join('LEFT', '#__acoustic_solution_rooms AS room ON room_id = room.id');

        $query->select('line.name AS line_name');
        $query->join('LEFT', '#__acoustic_solution_lines AS line ON line_id = line.id');

        $query->select('panels1.id AS panel1_id, 
                        panels1.name AS panel1_name, panels1.ref AS panel1_ref, panels1.family AS panel1_family, panels1.photo_150px AS panel1_photo, panels1.box_msrp AS panel1_box_msrp');                       
        $query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');

        $query->select('panels2.id AS panel2_id, 
                        panels2.name AS panel2_name, panels2.ref AS panel2_ref, panels2.family AS panel2_family, panels2.photo_150px AS panel2_photo, panels2.box_msrp AS panel2_box_msrp');                       
        $query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');

        $query->select('panels3.id AS panel3_id, 
                        panels3.name AS panel3_name, panels3.ref AS panel3_ref, panels3.family AS panel3_family, panels3.photo_150px AS panel3_photo, panels3.box_msrp AS panel3_box_msrp');                       
        $query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');

        $query->select('panels4.id AS panel4_id, 
                        panels4.name AS panel4_name, panels4.ref AS panel4_ref, panels4.family AS panel4_family, panels4.photo_150px AS panel4_photo, panels4.box_msrp AS panel4_box_msrp');                       
        $query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');

        $query->order('line_name ASC');
    
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
