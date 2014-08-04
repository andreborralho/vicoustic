<?php

/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */
// No direct access
defined('_JEXEC') or die;

//import joomlas filesystem functions, we will do all the filewriting with joomlas functions,
//so if the ftp layer is on, joomla will write with that, not the apache user, which might
//not have the correct permissions
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');


/**
 * panel Table class
 */
class PanelsTablepanel extends JTable {

    /**
     * Constructor
     *
     * @param JDatabase A database connector object
     */
    public function __construct(&$db) {
        parent::__construct('#__panels', 'id', $db);
    }

    /**
     * Overloaded bind function to pre-process the params.
     *
     * @param	array		Named array
     * @return	null|string	null is operation was satisfactory, otherwise returns an error
     * @see		JTable:bind
     * @since	1.5
     */
    public function bind($array, $ignore = '') {

        
		//Support for checkbox field: wood
		if (!isset($array['wood'])){
			$array['wood'] = 0;
		}

		//Support for checkbox field: metal
		if (!isset($array['metal'])){
			$array['metal'] = 0;
		}
		
		//Support for checkbox field: fabric
		if (!isset($array['fabric'])){
			$array['fabric'] = 0;
		}

        //Support for checkbox field: foam
        if (!isset($array['foam'])){
            $array['foam'] = 0;
        }
		
		//Support for checkbox field: polystyrene
		if (!isset($array['polystyrene'])){
			$array['polystyrene'] = 0;
		}
		
		//Support for checkbox field: fixing_type_standard15
		if (!isset($array['fixing_type_standard15'])){
			$array['fixing_type_standard15'] = 0;
		}

		//Support for checkbox field: fixing_type_standard24
		if (!isset($array['fixing_type_standard24'])){
			$array['fixing_type_standard24'] = 0;
		}

		//Support for checkbox field: fixing_type_clipin
		if (!isset($array['fixing_type_clipin'])){
			$array['fixing_type_clipin'] = 0;
		}

		//Support for checkbox field: fixing_type_screwed
		if (!isset($array['fixing_type_screwed'])){
			$array['fixing_type_screwed'] = 0;
		}

		//Support for checkbox field: fixing_type_glued
		if (!isset($array['fixing_type_glued'])){
			$array['fixing_type_glued'] = 0;
		}
		
		//Support for checkbox field: fixing_type_adhesive
		if (!isset($array['fixing_type_adhesive'])){
			$array['fixing_type_adhesive'] = 0;
		}
		
		//Support for checkbox field: installation_wall
		if (!isset($array['installation_wall'])){
			$array['installation_wall'] = 0;
		}
		
		//Support for checkbox field: installation_ceiling
		if (!isset($array['installation_ceiling'])){
			$array['installation_ceiling'] = 0;
		}

		//Support for checkbox field: installation_floor
		if (!isset($array['installation_floor'])){
			$array['installation_floor'] = 0;
		}
		
		//Support for checkbox field: installation_corner
		if (!isset($array['installation_corner'])){
			$array['installation_corner'] = 0;
		}

		//Support for checkbox field: leveled
		if (!isset($array['edge_leveled'])){
			$array['edge_leveled'] = 0;
		}

		//Support for checkbox field: angled
		if (!isset($array['edge_angled'])){
			$array['edge_angled'] = 0;
		}

		//Support for checkbox field: scratch_resistance
		if (!isset($array['scratch_resistance'])){
			$array['scratch_resistance'] = 0;
		}

		//Support for checkbox field: washable
		if (!isset($array['washable'])){
			$array['washable'] = 0;
		}        


        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string) $registry;
        }

        if (isset($array['metadata']) && is_array($array['metadata'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['metadata']);
            $array['metadata'] = (string) $registry;
        }

        //Bind the rules for ACL where supported.
		if (isset($array['rules']) && is_array($array['rules'])) {
			$rules = new JRules($array['rules']);
			$this->setRules($rules);
		}

        return parent::bind($array, $ignore);
    }

    /**
     * Overloaded check function
     */
    public function check() {

        //If there is an ordering column and this is a new row then get the next ordering value
        if (property_exists($this, 'ordering') && $this->id == 0) {
            $this->ordering = self::getNextOrder();
        }

        return parent::check();
    }

    /**
     * Method to set the publishing state for a row or list of rows in the database
     * table.  The method respects checked out rows by other users and will attempt
     * to checkin rows that it can after adjustments are made.
     *
     * @param    mixed    An optional array of primary key values to update.  If not
     *                    set the instance property value is used.
     * @param    integer The publishing state. eg. [0 = unpublished, 1 = published]
     * @param    integer The user id of the user performing the operation.
     * @return    boolean    True on success.
     * @since    1.0.4
     */
    public function publish($pks = null, $state = 1, $userId = 0) {
        // Initialise variables.
        $k = $this->_tbl_key;

        // Sanitize input.
        JArrayHelper::toInteger($pks);
        $userId = (int) $userId;
        $state = (int) $state;

        // If there are no primary keys set check to see if the instance key is set.
        if (empty($pks)) {
            if ($this->$k) {
                $pks = array($this->$k);
            }
            // Nothing to set publishing state on, return false.
            else {
                $this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
                return false;
            }
        }

        // Build the WHERE clause for the primary keys.
        $where = $k . '=' . implode(' OR ' . $k . '=', $pks);

        // Determine if there is checkin support for the table.
        if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
            $checkin = '';
        } else {
            $checkin = ' AND (checked_out = 0 OR checked_out = ' . (int) $userId . ')';
        }

        // Update the publishing state for rows with the given primary keys.
        $this->_db->setQuery(
                'UPDATE `' . $this->_tbl . '`' .
                ' SET `state` = ' . (int) $state .
                ' WHERE (' . $where . ')' .
                $checkin
        );
        $this->_db->query();

        // Check for a database error.
        if ($this->_db->getErrorNum()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // If checkin is supported and all rows were adjusted, check them in.
        if ($checkin && (count($pks) == $this->_db->getAffectedRows())) {
            // Checkin each row.
            foreach ($pks as $pk) {
                $this->checkin($pk);
            }
        }

        // If the JTable instance value is in the list of primary keys that were set, set the instance.
        if (in_array($this->$k, $pks)) {
            $this->state = $state;
        }

        $this->setError('');
        return true;
    }

    

}
