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
class Acoustic_solutionsModelAcoustic_bc extends JModelList
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
            $id = JFactory::getApplication()->getUserState('com_acoustic_solutions.edit.acoustic_bc.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_acoustic_solutions.edit.acoustic_bc.id', $id);
        }
		$this->setState('acoustic_bc.id', $id);

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
				$id = $this->getState('acoustic_bc.id');
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
    
	public function getTable($type = 'Acoustic_bc', $prefix = 'Acoustic_solutionsTable', $config = array())
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
        
        $query->from('`#__acoustic_solutions_bc` AS a');
        		

		// Join over the acoustic field 'acoustic'
		$query->select('panels1.id AS panel1_id, 
						panels1.name AS panel1_name, 
						panels1.photo_150px AS panel1_photo');
						
		$query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');
		
		
		$query->select('panels2.id AS panel2_id, 
						panels2.name AS panel2_name, 
						panels2.photo_150px AS panel2_photo');
						
		$query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');


		$query->select('panels3.id AS panel3_id, 
						panels3.name AS panel3_name, 
						panels3.photo_150px AS panel3_photo');
						
		$query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');


		$query->select('panels4.id AS panel4_id, 
						panels4.name AS panel4_name, 
						panels4.photo_150px AS panel4_photo');
						
		$query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');	

		// Join over the acoustic field 'acoustic'
		$query->select('panels5.id AS panel5_id, 
						panels5.name AS panel5_name, 
						panels5.photo_150px AS panel5_photo');
						
		$query->join('LEFT', '#__panels AS panels5 ON panel_id5 = panels5.id');
		
		
		$query->select('panels6.id AS panel6_id, 
						panels6.name AS panel6_name, 
						panels6.photo_150px AS panel6_photo');
						
		$query->join('LEFT', '#__panels AS panels6 ON panel_id6 = panels6.id');


		$query->select('panels7.id AS panel7_id, 
						panels7.name AS panel7_name, 
						panels7.photo_150px AS panel7_photo');
						
		$query->join('LEFT', '#__panels AS panels7 ON panel_id7 = panels7.id');


		$query->select('panels8.id AS panel8_id, 
						panels8.name AS panel8_name, 
						panels8.photo_150px AS panel8_photo');
						
		$query->join('LEFT', '#__panels AS panels8 ON panel_id8 = panels8.id');	

		// Join over the acoustic field 'acoustic'
		$query->select('panels9.id AS panel9_id, 
						panels9.name AS panel9_name, 
						panels9.photo_150px AS panel9_photo');
						
		$query->join('LEFT', '#__panels AS panels9 ON panel_id9 = panels9.id');
		
		
		$query->select('panels10.id AS panel10_id, 
						panels10.name AS panel10_name, 
						panels10.photo_150px AS panel10_photo');
						
		$query->join('LEFT', '#__panels AS panels10 ON panel_id10 = panels10.id');


		$query->select('panels11.id AS panel11_id, 
						panels11.name AS panel11_name, 
						panels11.photo_150px AS panel11_photo');
						
		$query->join('LEFT', '#__panels AS panels11 ON panel_id11 = panels11.id');


		$query->select('panels12.id AS panel12_id, 
						panels12.name AS panel12_name, 
						panels12.photo_150px AS panel12_photo');
						
		$query->join('LEFT', '#__panels AS panels12 ON panel_id12 = panels12.id');		


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