<?php
/**
 * @version		$Id: view.html.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * JlangEditor View
 */
class JlangEditorViewJlangEditor extends JView
{
	/**
	 * display method of Hello view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		$document = JFactory::getDocument();
		$document->addStyleSheet( 'components/com_jlangeditor/jlangeditor.css' );
		
		if(JRequest::getVar('layout') =='form'){
			$this->language = $this->get('Language'); // languages for combo
			$this->addFormToolBar(); // Set the toolbar
			
			parent::display($tpl); // Display the template
			
			$this->setFormDocument(); // Set the document
		}
		else{
			$this->items = $this->get('Files'); // Get language files of selected language
			$this->languages = $this->get('Languages'); // languages for combo
			$this->addToolBar(); // Set the toolbar
			
			parent::display($tpl); // Display the template
			
			$this->setDocument(); // Set the document
		}
		
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$canDo = JlangEditorHelper::getActions();
		JToolBarHelper::title(JText::_('COM_JLANGEDITOR_MANAGER_JLANGEDITORS'), 'jlangeditor');
		//if ($canDo->get('core.create')) 
		//{
		//	JToolBarHelper::addNew('add', 'JTOOLBAR_NEW');
		//}
		if ($canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.delete')) 
		{
			//JToolBarHelper::deleteList('', 'delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_jlangeditor');
		}
	}
	
	/**
	 * Setting the toolbar for form page
	 */
	protected function addFormToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$user 		= JFactory::getUser();
		$userId 	= $user->id;
		$isNew 		= false;
		$canDo 		= JlangEditorHelper::getActions();
		
		JToolBarHelper::title(JText::_('COM_JLANGEDITOR_EDIT_LANGUAGE'), 'jlangeditor');
		
		if ($canDo->get('core.edit'))
		{
			// We can save the new record
			JToolBarHelper::apply('save', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('saveandclose', 'JTOOLBAR_SAVE');
		}
		JToolBarHelper::cancel('cancel', 'JTOOLBAR_CLOSE');
	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JLANGEDITOR_ADMINISTRATION'));
	}
	
	/**
	 * Method to set up the document properties for form page
	 *
	 * @return void
	 */
	protected function setFormDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JLANGEDITOR_EDIT_LANGUAGE'));
		JText::script('COM_JLANGEDITOR_JLANGEDITOR_ERROR_UNACCEPTABLE');
	}
}
