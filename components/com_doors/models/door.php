<?php
/**
 * @version     1.0.0
 * @package     com_doors
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.application.component.modellist');
jimport('joomla.event.dispatcher');

/**
 * Doors model.
 */
class DoorsModelDoor extends JModelList
{
    
    var $_item = null;
	var $_items = null;
    
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('com_doors');

		// Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_doors.edit.door.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_doors.edit.door.id', $id);
        }
		$this->setState('door.id', $id);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
			
		// List state information
	    $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
	    $this->setState('list.limit', $limit);
	
	    $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
	    $this->setState('list.start', $limitstart);
    
	        
	    // List state information.
	    parent::populateState($ordering, $direction);

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
				$id = $this->getState('door.id');
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
    
	public function getTable($type = 'Door', $prefix = 'DoorsTable', $config = array())
	{   
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables');
        return JTable::getInstance($type, $prefix, $config);
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
		$id = (!empty($id)) ? $id : (int)$this->getState('door.id');

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
		$id = (!empty($id)) ? $id : (int)$this->getState('door.id');

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
		$form = $this->loadForm('com_doors.door', 'door', array('control' => 'jform', 'load_data' => $loadData));
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
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('door.id');
        $user = JFactory::getUser();

        if($id) {
            //Check the user can edit this item
            $authorised = $user->authorise('core.edit', 'door.'.$id);
        } else {
            //Check the user can create new items in this section
            $authorised = $user->authorise('core.create', 'com_doors');
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
        
        $query->from('`#__doors` AS a');
        

		// Join over the portfolio field 'portfolio'
		$query->select('portfolio_photos1.id AS portfolio_photo1_id, 
						portfolio_photos1.photo AS portfolio_photo1_photo, 
						portfolio_photos1.thumbnail AS portfolio_photo1_thumbnail, 
						portfolio_photos1.label AS portfolio_photo1_label');
						
		$query->join('LEFT', '#__portfolio_photos AS portfolio_photos1 ON portfolio_photo_id1 = portfolio_photos1.id');
		
		
		$query->select('portfolio_photos2.id AS portfolio_photo2_id,
						portfolio_photos2.photo AS portfolio_photo2_photo,
						portfolio_photos2.thumbnail AS portfolio_photo2_thumbnail, 
		 				portfolio_photos2.label AS portfolio_photo2_label');
		 
		$query->join('LEFT', '#__portfolio_photos AS portfolio_photos2 ON portfolio_photo_id2 = portfolio_photos2.id');
		

		// Join over the created by field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

	    // Filter by published state
	    $published = $this->getState('filter.state');
	    if (is_numeric($published)) {
	        $query->where('a.state = '.(int) $published);
	    } else {
	        $query->where('(a.state = 1)');
	    }
    

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('( a.name LIKE '.$search.'  OR  a.ref LIKE '.$search.'  OR  a.family LIKE '.$search.'  OR  a.description1 LIKE '.$search.'  OR  a.description2 LIKE '.$search.' )');
			}
		}
        
        
        
        return $query;
    }
}