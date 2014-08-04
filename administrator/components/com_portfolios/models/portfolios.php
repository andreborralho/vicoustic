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
class PortfoliosModelportfolios extends JModelList
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
                'title', 'a.title',
                'icon', 'a.icon',
                'country', 'a.country',

                'category_education', 'a.category_education',
                'category_healthcare', 'a.category_healthcare',
                'category_transports', 'a.category_transports',
                'category_retail_leisure', 'a.category_retail_leisure',
                'category_office', 'a.category_office',
                'category_hifi_home_cinema', 'a.category_hifi_home_cinema',
                'category_theatre', 'a.category_theatre',
                'category_outdoor', 'a.category_outdoor',

                'panel_id1', 'a.panel_id1',
                'panel_id2', 'a.panel_id2',
                'panel_id3', 'a.panel_id3',
                'panel_id4', 'a.panel_id4',
                'panel_id5', 'a.panel_id5',
                'panel_id6', 'a.panel_id6',
                'panel_id7', 'a.panel_id7',
                'panel_id8', 'a.panel_id8',
                'door_id', 'a.door_id',
                'blanket_id', 'a.blanket_id',
                'antivibratic_id1', 'a.antivibratic_id1',
                'antivibratic_id2', 'a.antivibratic_id2',
                
                'description', 'a.description',                
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
        
        
		//Filtering country
		$this->setState('filter.country', $app->getUserStateFromRequest($this->context.'.filter.country', 'filter_country', '', 'string'));

        
		// Load the parameters.
		$params = JComponentHelper::getParams('com_portfolios');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.title', 'asc');
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
		$query->from('`#__portfolios` AS a');

		$query->select('panels1.name AS panel1_name, panels1.photo_150px AS panel1_photo');
		$query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');
		
		$query->select('panels2.name AS panel2_name, panels2.photo_150px AS panel2_photo');
		$query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');

		$query->select('panels3.name AS panel3_name, panels3.photo_150px AS panel3_photo');
		$query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');

		$query->select('panels4.name AS panel4_name, panels4.photo_150px AS panel4_photo');
		$query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');

		$query->select('panels5.name AS panel5_name, panels5.photo_150px AS panel5_photo');
		$query->join('LEFT', '#__panels AS panels5 ON panel_id5 = panels5.id');

		$query->select('panels6.name AS panel6_name, panels6.photo_150px AS panel6_photo');
		$query->join('LEFT', '#__panels AS panels6 ON panel_id6 = panels6.id');

		$query->select('panels7.name AS panel7_name, panels7.photo_150px AS panel7_photo');
		$query->join('LEFT', '#__panels AS panels7 ON panel_id7 = panels7.id');

		$query->select('panels8.name AS panel8_name, panels8.photo_150px AS panel8_photo');
		$query->join('LEFT', '#__panels AS panels8 ON panel_id8 = panels8.id');

		$query->select('doors.name AS door_name, doors.photo_150px AS door_photo');
		$query->join('LEFT', '#__doors AS doors ON door_id = doors.id');

		$query->select('blankets.name AS blanket_name, blankets.photo_150px AS blanket_photo');
		$query->join('LEFT', '#__blankets AS blankets ON blanket_id = blankets.id');

		$query->select('antivibratics1.name AS antivibratic1_name, antivibratics1.photo_150px AS antivibratic1_photo');
		$query->join('LEFT', '#__antivibratics AS antivibratics1 ON antivibratic_id1 = antivibratics1.id');

		$query->select('antivibratics2.name AS antivibratic2_name, antivibratics2.photo_150px AS antivibratic2_photo');
		$query->join('LEFT', '#__antivibratics AS antivibratics2 ON antivibratic_id2 = antivibratics2.id');

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
                $query->where('( a.title LIKE '.$search.' )');
			}
		}       

		//Filtering country
		$filter_country = $this->state->get("filter.country");
		if ($filter_country) {
			$query->where("a.country = '".$filter_country."'");
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
