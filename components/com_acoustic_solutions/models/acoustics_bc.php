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
class Acoustic_solutionsModelAcoustics_bc extends JModelList {

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
        
        $query->from('`#__acoustic_solutions_bc` AS a');
      
        $query->select('room.name AS room_name');
        $query->join('LEFT', '#__acoustic_solution_rooms AS room ON room_id = room.id');

        $query->select('panels1.id AS panel1_id, 
                        panels1.family AS panel1_family, 
                        panels1.length AS panel1_length, panels1.photo_150px AS panel1_photo, 
                        panels1.width AS panel1_width,
                        panels1.ref AS panel1_ref,
                        panels1.units_per_box AS panel1_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');

        $query->select('panels2.id AS panel2_id, 
                        panels2.family AS panel2_family, 
                        panels2.length AS panel2_length, panels2.photo_150px AS panel2_photo, 
                        panels2.width AS panel2_width,
                        panels2.ref AS panel2_ref,
                        panels2.units_per_box AS panel2_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');

        $query->select('panels3.id AS panel3_id, 
                        panels3.family AS panel3_family, 
                        panels3.length AS panel3_length, panels3.photo_150px AS panel3_photo, 
                        panels3.width AS panel3_width,
                        panels3.ref AS panel3_ref,                        
                        panels3.units_per_box AS panel3_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');

        $query->select('panels4.id AS panel4_id, 
                        panels4.family AS panel4_family, 
                        panels4.length AS panel4_length, panels4.photo_150px AS panel4_photo, 
                        panels4.width AS panel4_width,
                        panels4.ref AS panel4_ref,                        
                        panels4.units_per_box AS panel4_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');

        $query->select('panels5.id AS panel5_id, 
                        panels5.family AS panel5_family,
                        panels5.length AS panel5_length, panels5.photo_150px AS panel5_photo,  
                        panels5.width AS panel5_width,
                        panels5.ref AS panel5_ref,
                        panels5.units_per_box AS panel5_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels5 ON panel_id5 = panels5.id');

        $query->select('panels6.id AS panel6_id, 
                        panels6.family AS panel6_family, 
                        panels6.length AS panel6_length, panels6.photo_150px AS panel6_photo,  
                        panels6.width AS panel6_width,
                        panels6.ref AS panel6_ref,                        
                        panels6.units_per_box AS panel6_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels6 ON panel_id6 = panels6.id');

        $query->select('panels7.id AS panel7_id, 
                        panels7.family AS panel7_family,
                        panels7.length AS panel7_length, panels7.photo_150px AS panel7_photo,  
                        panels7.width AS panel7_width,
                        panels7.ref AS panel7_ref,                        
                        panels7.units_per_box AS panel7_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels7 ON panel_id7 = panels7.id');

        $query->select('panels8.id AS panel8_id, 
                        panels8.family AS panel8_family, 
                        panels8.length AS panel8_length, panels8.photo_150px AS panel8_photo,  
                        panels8.width AS panel8_width,
                        panels8.ref AS panel8_ref,                        
                        panels8.units_per_box AS panel8_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels8 ON panel_id8 = panels8.id');

        $query->select('panels9.id AS panel9_id, 
                        panels9.family AS panel9_family, 
                        panels9.length AS panel9_length, panels9.photo_150px AS panel9_photo, 
                        panels9.width AS panel9_width, 
                        panels9.ref AS panel9_ref,                        
                        panels9.units_per_box AS panel9_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels9 ON panel_id9 = panels9.id');

        $query->select('panels10.id AS panel10_id, 
                        panels10.family AS panel10_family, 
                        panels10.length AS panel10_length, panels10.photo_150px AS panel10_photo, 
                        panels10.width AS panel10_width,
                        panels10.ref AS panel10_ref,                        
                        panels10.units_per_box AS panel10_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels10 ON panel_id10 = panels10.id');

        $query->select('panels11.id AS panel11_id, 
                        panels11.family AS panel11_family, 
                        panels11.length AS panel11_length, panels11.photo_150px AS panel11_photo, 
                        panels11.width AS panel11_width,
                        panels11.ref AS panel11_ref,                        
                        panels11.units_per_box AS panel11_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels11 ON panel_id11 = panels11.id');

        $query->select('panels12.id AS panel12_id, 
                        panels12.family AS panel12_family, 
                        panels12.length AS panel12_length, panels12.photo_150px AS panel12_photo, 
                        panels12.width AS panel12_width,
                        panels12.ref AS panel12_ref,                        
                        panels12.units_per_box AS panel12_units_per_box');                       
        $query->join('LEFT', '#__panels AS panels12 ON panel_id12 = panels12.id');
    
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
