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
class Acoustic_solutionsModelacoustics_bc extends JModelList
{

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',                
                
                'description', 'a.description',
                'icon', 'a.icon',
                'image1', 'a.image1',
                'image2', 'a.image2',
                'image3', 'a.image3',
                'technical_file', 'a.technical_file',
                
                'panel_id1', 'a.panel_id1',
                'panel_id2', 'a.panel_id2',
                'panel_id3', 'a.panel_id3',
                'panel_id4', 'a.panel_id4',
                'panel_id5', 'a.panel_id5',
                'panel_id6', 'a.panel_id6',
                'panel_id7', 'a.panel_id7',
                'panel_id8', 'a.panel_id8',
                'panel_id9', 'a.panel_id9',
                'panel_id10', 'a.panel_id10',
                'panel_id11', 'a.panel_id11',
                'panel_id12', 'a.panel_id12',

                'panel1_percentage', 'a.panel1_percentage',
                'panel2_percentage', 'a.panel2_percentage',
                'panel3_percentage', 'a.panel3_percentage',
                'panel4_percentage', 'a.panel4_percentage',
                'panel5_percentage', 'a.panel5_percentage',
                'panel6_percentage', 'a.panel6_percentage',
                'panel7_percentage', 'a.panel7_percentage',
                'panel8_percentage', 'a.panel8_percentage',
                'panel9_percentage', 'a.panel9_percentage',
                'panel10_percentage', 'a.panel10_percentage',
                'panel11_percentage', 'a.panel11_percentage',
                'panel12_percentage', 'a.panel12_percentage',

                'room_id', 'a.room_id',

                'state', 'a.state',
                'created_by', 'a.created_by',

            );
        }

        parent::__construct($config);
    }


	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_published', '', 'string');
		$this->setState('filter.state', $published);
        
        
        
		// Load the parameters.
		$params = JComponentHelper::getParams('com_acoustic_solutions');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.id', 'asc');
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param	string		$id	A prefix for the store id.
	 * @return	string		A store id.
	 * @since	1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id.= ':' . $this->getState('filter.search');
		$id.= ':' . $this->getState('filter.state');

		return parent::getStoreId($id);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 * @since	1.6
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.*'
			)
		);
		$query->from('`#__acoustic_solutions_bc` AS a');

		$query->select('acoustic_rooms.name AS room_name');
		$query->join('LEFT', '#__acoustic_solution_rooms AS acoustic_rooms ON room_id = acoustic_rooms.id');
						
		$query->select('panels1.id AS panel1_id, panels1.name AS panel1_name');
		$query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');

		$query->select('panels2.id AS panel2_id, panels2.name AS panel2_name');
		$query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');

		$query->select('panels3.id AS panel3_id, panels3.name AS panel3_name');
		$query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');

		$query->select('panels4.id AS panel4_id, panels4.name AS panel4_name');
		$query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');

		$query->select('panels5.id AS panel5_id, panels5.name AS panel5_name');
		$query->join('LEFT', '#__panels AS panels5 ON panel_id5 = panels5.id');

		$query->select('panels6.id AS panel6_id, panels6.name AS panel6_name');
		$query->join('LEFT', '#__panels AS panels6 ON panel_id6 = panels6.id');

		$query->select('panels7.id AS panel7_id, panels7.name AS panel7_name');
		$query->join('LEFT', '#__panels AS panels7 ON panel_id7 = panels7.id');

		$query->select('panels8.id AS panel8_id, panels8.name AS panel8_name');
		$query->join('LEFT', '#__panels AS panels8 ON panel_id8 = panels8.id');

		$query->select('panels9.id AS panel9_id, panels9.name AS panel9_name');
		$query->join('LEFT', '#__panels AS panels9 ON panel_id9 = panels9.id');

		$query->select('panels10.id AS panel10_id, panels10.name AS panel10_name');
		$query->join('LEFT', '#__panels AS panels10 ON panel_id10 = panels10.id');

		$query->select('panels11.id AS panel11_id, panels11.name AS panel11_name');
		$query->join('LEFT', '#__panels AS panels11 ON panel_id11 = panels11.id');

		$query->select('panels12.id AS panel12_id, panels12.name AS panel12_name');
		$query->join('LEFT', '#__panels AS panels12 ON panel_id12 = panels12.id');

		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');


	    // Filter by published state
	    $published = $this->getState('filter.state');
	    if (is_numeric($published)) {
	        $query->where('a.state = '.(int) $published);
	    } else if ($published === '') {
	        $query->where('(a.state IN (0, 1))');
	    }
    

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
                
			}
		}
             
		// Add the list ordering clause.
        $orderCol	= $this->state->get('list.ordering');
        $orderDirn	= $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol.' '.$orderDirn));
        }

		return $query;
	}
}
