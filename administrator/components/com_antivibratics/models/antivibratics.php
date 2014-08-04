<?php
/**
 * @version     1.0.0
 * @package     com_antivibratics
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Antivibratics records.
 */
class AntivibraticsModelantivibratics extends JModelList
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
                'ean13', 'a.ean13',
                'upc', 'a.upc',
                'hs_code', 'a.hs_code',
                
                'family', 'a.family',
                'mounting_width', 'a.mounting_width',
                'rupture_point', 'a.rupture_point',
                'load_weight_min', 'a.load_weight_min',
                'load_weight_max', 'a.load_weight_max',
                'recycle_coefficient', 'a.recycle_coefficient', 

                'installation_wall', 'a.installation_wall',
                'installation_ceiling', 'a.instalation_ceiling',
                'installation_floor', 'a.installation_floor',
                'installation_division_wall', 'a.installation_division_wall',
                    	            
                'fire_class_en', 'a.fire_class_en',
                'fire_class_din', 'a.fire_class_din',
                'fire_class_nf_p', 'a.fire_class_nf_p',
                'fire_class_uni', 'a.fire_class_uni',
                'fire_class_bs', 'a.fire_class_bs',

                'steel', 'a.steel', 
                'rubber_color', 'a.rubber_color',
                'angle_adaptation', 'a.angle_adaptation',
                'hooking_system', 'a.hooking_system',
                'security_devices', 'a.security_devices',
                'fire_security_devices', 'a.fire_security_devices',
                'plate_thickness', 'a.plate_thickness',
                'plate_length', 'a.plate_length',
				
				'msrp', 'a.msrp',
                'units_per_box', 'a.units_per_box',
                'box_length', 'a.box_length',
                'box_width', 'a.box_width',
                'box_height', 'a.box_height',
                'box_weight', 'a.box_weight',
                'box_volume', 'a.box_volume',
                'box_msrp', 'a.box_msrp',
                'mastercarton_box_length', 'a.mastercarton_box_length',
                'mastercarton_box_width', 'a.mastercarton_box_width',
                'mastercarton_box_height', 'a.mastercarton_box_height',  
                'mastercarton_box_msrp', 'a.mastercarton_box_msrp', 
                              
                'description1', 'a.description1',
                'description2', 'a.description2',

                'catalog_page', 'a.catalog_page',
				'installation_manual', 'a.installation_manual',
				'sketchup', 'a.sketchup',
				'warranty', 'a.warranty',
				'drawings', 'a.drawings',
				'safety_data', 'a.safety_data',
                
				'video', 'a.video',               
                'photo_150px', 'a.photo_150px',
                'photo_300px', 'a.photo_300px',
                'photo_1024px', 'a.photo_1024px',
                'photo_detail1', 'a.photo_detail1',
                'photo_detail2', 'a.photo_detail2',
                'photo_detail3', 'a.photo_detail3',
                'photo_detail4', 'a.photo_detail4',
                'photo_detail5', 'a.photo_detail5',
                'portfolio_photo_id1', 'a.portfolio_photo_id1',
                'portfolio_photo_id2', 'a.portfolio_photo_id2',       

                'music_broadcast', 'a.music_broadcast',
				'hifi_home_cinema', 'a.hifi_home_cinema',			
				'building_construction', 'a.building_construction',
				                  
                'state', 'a.state',
                'state_featured', 'a.state_featured',
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
		$params = JComponentHelper::getParams('com_antivibratics');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.name', 'asc');
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
		$query->from('`#__antivibratics` AS a');

		$query->select('portfolio_photos1.photo AS portfolio_photo1_photo, portfolio_photos1.label AS portfolio_photo1_label');
		$query->join('LEFT', '#__portfolio_photos AS portfolio_photos1 ON portfolio_photo_id1 = portfolio_photos1.id');
		
		$query->select('portfolio_photos2.photo AS portfolio_photo2_photo, portfolio_photos2.label AS portfolio_photo2_label');
		$query->join('LEFT', '#__portfolio_photos AS portfolio_photos2 ON portfolio_photo_id2 = portfolio_photos2.id');
		
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
                $query->where('( a.name LIKE '.$search.'  OR  a.ref LIKE '.$search.'  OR  a.family LIKE '.$search.' )');
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
