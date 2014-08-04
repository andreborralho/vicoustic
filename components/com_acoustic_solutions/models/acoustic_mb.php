<?php
/**
 * @version     1.0.0
 * @package     com_portfolio
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
jimport('joomla.event.dispatcher');

/**
 * Acoustic Solutions model.
 */
class Acoustic_solutionsModelAcoustic_mb extends JModelList
{
    
    var $_item = null;
    
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('com_acoustic_solutions');

		// Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_acoustic_solutions.edit.acoustic_mb.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_acoustic_solutions.edit.acoustic_mb.id', $id);
        }
		$this->setState('acoustic_mb.id', $id);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

	}
        

	/**
	 * Method to get an ojbect.
	 *
	 * @param	integer	The id of the object to get.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function &getData($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('acoustic_mb.id');
			}

			// Get a level row instance.
			$table = $this->getTable();

			// Attempt to load the row.
			if ($table->load($id))
			{
				// Check published state.
				if ($published = $this->getState('filter.published'))
				{
					if ($table->state != $published) {
						return $this->_item;
					}
				}

				// Convert the JTable to a clean JObject.
				$properties = $table->getProperties(1);
				$this->_item = JArrayHelper::toObject($properties, 'JObject');
			} elseif ($error = $table->getError()) {
				$this->setError($error);
			}
		}

		return $this->_item;
	}
    
	public function getTable($type = 'Acoustic_mb', $prefix = 'Acoustic_solutionsTable', $config = array())
	{   
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables');
        return JTable::getInstance($type, $prefix, $config);
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

		// Join over the acoustic field 'acoustic'
		$query->select('panels1.id AS panel1_id, 
						panels1.name AS panel1_name, 
						panels1.ref AS panel1_ref, 
						panels1.family AS panel1_family, 
						panels1.photo_150px AS panel1_photo, 
						panels1.box_msrp AS panel1_box_msrp');
						
		$query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');
		
		
		$query->select('panels2.id AS panel2_id, 
						panels2.name AS panel2_name,
						panels2.ref AS panel2_ref,
						panels2.family AS panel2_family, 
						panels2.photo_150px AS panel2_photo, 
						panels2.box_msrp AS panel2_box_msrp');
						
		$query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');


		$query->select('panels3.id AS panel3_id, 
						panels3.name AS panel3_name, 
						panels3.ref AS panel3_ref, 
						panels3.family AS panel3_family, 
						panels3.photo_150px AS panel3_photo, 
						panels3.box_msrp AS panel3_box_msrp');
						
		$query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');


		$query->select('panels4.id AS panel4_id, 
						panels4.name AS panel4_name, 
						panels4.ref AS panel4_ref, 
						panels4.family AS panel4_family, 
						panels4.photo_150px AS panel4_photo, 
						panels4.box_msrp AS panel4_box_msrp');
						
		$query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');	

		

	    // Filter by published state
	    $published = $this->getState('filter.state');
		
	    if (is_numeric($published)) {
	        $query->where('a.state = '.(int) $published);
	    } else {

        $query->where('(a.state = 1)');
    	}
			  
		     
		return $query;
        //return $db->loadObjectList();
    }

}