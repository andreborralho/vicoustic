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
class Isolation_solutionsModelisolations extends JModelList
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
                'name', 'a.name',
                'ref', 'a.ref',
                'rw', 'a.rw',
                'stc', 'a.stc',
                'price', 'a.price',
                'graph', 'a.graph',
                'solution_image', 'a.solution_image',
                'category_id', 'a.category_id',

				'solution_data_sheet', 'a.solution_data_sheet',
                'technical_file1', 'a.technical_file1',
                'technical_file2', 'a.technical_file2',
                'technical_file3', 'a.technical_file3',
                'technical_file4', 'a.technical_file4',

                'blanket_id1', 'a.blanket_id1',
                'antivibratic_id1', 'a.antivibratic_id1',
                'blanket_id2', 'a.blanket_id2',
                'antivibratic_id2', 'a.antivibratic_id2',
                'blanket_id3', 'a.blanket_id3',
                'antivibratic_id3', 'a.antivibratic_id3',
                'blanket_id4', 'a.blanket_id4',
                'antivibratic_id4', 'a.antivibratic_id4',
                'blanket_id5', 'a.blanket_id5',
                'antivibratic_id5', 'a.antivibratic_id5',

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
		$params = JComponentHelper::getParams('com_isolation_solutions');
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
		$query->from('`#__isolation_solutions` AS a');

		$query->select('isolation_categories.name AS category_name');
		$query->join('LEFT', '#__isolation_solution_categories AS isolation_categories ON category_id = isolation_categories.id');
				
		
		$query->select('antivibratics1.id AS antivibratic1_id, antivibratics1.name AS antivibratic1_name');
		$query->join('LEFT', '#__antivibratics AS antivibratics1 ON antivibratic_id1 = antivibratics1.id');

		$query->select('antivibratics2.id AS antivibratic2_id, antivibratics2.name AS antivibratic2_name');
		$query->join('LEFT', '#__antivibratics AS antivibratics2 ON antivibratic_id2 = antivibratics2.id');

		$query->select('antivibratics3.id AS antivibratic3_id, antivibratics3.name AS antivibratic3_name');
		$query->join('LEFT', '#__antivibratics AS antivibratics3 ON antivibratic_id3 = antivibratics3.id');

		$query->select('antivibratics4.id AS antivibratic4_id, antivibratics4.name AS antivibratic4_name');
		$query->join('LEFT', '#__antivibratics AS antivibratics4 ON antivibratic_id4 = antivibratics4.id');

		$query->select('antivibratics5.id AS antivibratic5_id, antivibratics5.name AS antivibratic5_name');
		$query->join('LEFT', '#__antivibratics AS antivibratics5 ON antivibratic_id5 = antivibratics5.id');
		
		
		$query->select('blankets1.id AS blanket1_id, blankets1.name AS blanket1_name');
		$query->join('LEFT', '#__blankets AS blankets1 ON blanket_id1 = blankets1.id');

		$query->select('blankets2.id AS blanket2_id, blankets2.name AS blanket2_name');
		$query->join('LEFT', '#__blankets AS blankets2 ON blanket_id2 = blankets2.id');
		
		$query->select('blankets3.id AS blanket3_id, blankets3.name AS blanket3_name');
		$query->join('LEFT', '#__blankets AS blankets3 ON blanket_id3 = blankets3.id');
		
		$query->select('blankets4.id AS blanket4_id, blankets4.name AS blanket4_name');
		$query->join('LEFT', '#__blankets AS blankets4 ON blanket_id4 = blankets4.id');

		$query->select('blankets5.id AS blanket5_id, blankets5.name AS blanket5_name');
		$query->join('LEFT', '#__blankets AS blankets5 ON blanket_id5 = blankets5.id');

		
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
