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
 * Portfolio model.
 */
class PortfoliosModelPortfolio extends JModelList
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
		$app = JFactory::getApplication('com_portfolios');

		// Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_portfolios.edit.portfolio.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_portfolios.edit.portfolio.id', $id);
        }
		$this->setState('portfolio.id', $id);

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
				$id = $this->getState('portfolio.id');
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
    
	public function getTable($type = 'Portfolio', $prefix = 'PortfoliosTable', $config = array())
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
        
        $query->from('`#__portfolios` AS a');
        
		// Join over the graph field 'photo_portfolio'
		$query->select('pp.portfolio_id AS photo_portfolio_id, 
					pp.label AS photo_label,
					pp.photo AS photo_photo,
					pp.thumbnail AS photo_thumbnail');					
					
		$query->join('LEFT', '#__portfolio_photos AS pp ON pp.portfolio_id = a.id');
		

		// Join over the portfolio field 'portfolio'
		$query->select('panels1.id AS panel1_id, 
						panels1.name AS panel1_name, 
						panels1.ref AS panel1_ref,
						panels1.photo_150px AS panel1_photo');
						
		$query->join('LEFT', '#__panels AS panels1 ON panel_id1 = panels1.id');
		
		
		$query->select('panels2.id AS panel2_id, 
						panels2.name AS panel2_name, 
						panels2.ref AS panel2_ref,
						panels2.photo_150px AS panel2_photo');
						
		$query->join('LEFT', '#__panels AS panels2 ON panel_id2 = panels2.id');


		$query->select('panels3.id AS panel3_id, 
						panels3.name AS panel3_name, 
						panels3.ref AS panel3_ref,
						panels3.photo_150px AS panel3_photo');
						
		$query->join('LEFT', '#__panels AS panels3 ON panel_id3 = panels3.id');


		$query->select('panels4.id AS panel4_id, 
						panels4.name AS panel4_name,
						panels4.ref AS panel4_ref, 
						panels4.photo_150px AS panel4_photo');
						
		$query->join('LEFT', '#__panels AS panels4 ON panel_id4 = panels4.id');


		$query->select('panels5.id AS panel5_id, 
						panels5.name AS panel5_name,
						panels5.ref AS panel5_ref, 
						panels5.photo_150px AS panel5_photo');
						
		$query->join('LEFT', '#__panels AS panels5 ON panel_id5 = panels5.id');


		$query->select('panels6.id AS panel6_id, 
						panels6.name AS panel6_name,
						panels6.ref AS panel6_ref, 
						panels6.photo_150px AS panel6_photo');
						
		$query->join('LEFT', '#__panels AS panels6 ON panel_id6 = panels6.id');


		$query->select('panels7.id AS panel7_id, 
						panels7.name AS panel7_name,
						panels7.ref AS panel7_ref, 
						panels7.photo_150px AS panel7_photo');
						
		$query->join('LEFT', '#__panels AS panels7 ON panel_id7 = panels7.id');

		
		$query->select('panels8.id AS panel8_id, 
						panels8.name AS panel8_name, 
						panels8.ref AS panel8_ref,
						panels8.photo_150px AS panel8_photo');
						
		$query->join('LEFT', '#__panels AS panels8 ON panel_id8 = panels8.id');

		
		$query->select('doors.id AS door_id, 
						doors.name AS door_name, 
						doors.photo_150px AS door_photo');
						
		$query->join('LEFT', '#__doors AS doors ON door_id = doors.id');

		
		$query->select('blankets.id AS blanket_id, 
						blankets.name AS blanket_name, 
						blankets.photo_150px AS blanket_photo');
						
		$query->join('LEFT', '#__blankets AS blankets ON blanket_id = blankets.id');

		
		$query->select('antivibratics1.id AS antivibratic1_id, 
						antivibratics1.name AS antivibratic1_name, 
						antivibratics1.photo_150px AS antivibratic1_photo');
						
		$query->join('LEFT', '#__antivibratics AS antivibratics1 ON antivibratic_id1 = antivibratics1.id');

		
		$query->select('antivibratics2.id AS antivibratic2_id, 
						antivibratics2.name AS antivibratic2_name, 
						antivibratics2.photo_150px AS antivibratic2_photo');
						
		$query->join('LEFT', '#__antivibratics AS antivibratics2 ON antivibratic_id2 = antivibratics2.id');


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

    
	/**
	 * Method to check in an item.
	 *
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function checkin($id = null)
	{
		// Get the id.
		$id = (!empty($id)) ? $id : (int)$this->getState('portfolio.id');

		if ($id) {
            
			// Initialise the table
			$table = $this->getTable();

			// Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
		}

		return true;
	}

	/**
	 * Method to check out an item for editing.
	 *
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function checkout($id = null)
	{
		// Get the user id.
		$id = (!empty($id)) ? $id : (int)$this->getState('portfolio.id');

		if ($id) {
            
			// Initialise the table
			$table = $this->getTable();

			// Get the current user object.
			$user = JFactory::getUser();

			// Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
		}

		return true;
	}    
    
	/**
	 * Method to get the profile form.
	 *
	 * The base form is loaded from XML 
     * 
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_portfolios.portfolio', 'portfolio', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		$data = $this->getData(); 
        
			//Support for 'multiple' field
			$data->category = json_decode($data->category);
        return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param	array		The form data.
	 * @return	mixed		The user id on success, false on failure.
	 * @since	1.6
	 */
	public function save($data)
	{
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('portfolio.id');
        $user = JFactory::getUser();

        if($id) {
            //Check the user can edit this item
            $authorised = $user->authorise('core.edit', 'portfolio.'.$id);
        } else {
            //Check the user can create new items in this section
            $authorised = $user->authorise('core.create', 'com_portfolios');
        }

        if ($authorised !== true) {
            JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
            return false;
        }

		$table = $this->getTable();
        if ($table->save($data) === true) {
            return $id;
        } else {
            return false;
        }
        
	}    
    
}