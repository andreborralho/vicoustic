<?php
/**
 * @version		$Id: controller.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of JlangEditor component
 */
class JlangEditorController extends JController
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false) 
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'JlangEditor'));
		
		$session =& JFactory::getSession();
        if(!$session->get('jlangselect', false)){
            $session->set('jlangselect', 'en-GB');
        }
        $language  = JRequest::getVar('filter_language', false);
        if(!empty($language)){
            $session->set('jlangselect', $language);
        }
		
		// call parent behavior
		parent::display($cachable);

		// Set the submenu
		JlangEditorHelper::addSubmenu('messages');
	}
	
    // language edit form
    function edit() {
        JRequest::setVar( 'view', 'jlangeditor' );
        JRequest::setVar( 'layout', 'form' );
        JRequest::setVar('hidemainmenu', 1);
        parent::display();
    }
    
	// save language inforamtion
    function saveandclose() {
        // Check for request forgeries
        $post	= JRequest::get('post', JREQUEST_ALLOWHTML);
        if(empty($post['lang_text'])){
        	$msg = JText::_( 'Language content is found empty!' );
        	$link = 'index.php?option=com_jlangeditor&task=edit&file[]=' . $post['filename'];
        	$this->setRedirect($link, $msg);
        }
        else{
	        $model = $this->getModel('jlangeditor');
	        $storeMsg = $model->write($post);
			
	        if ($storeMsg) {
	                $msg = JText::_( 'Language saved!' );
	        } else {
	                $msg = JText::_( 'Problem on saving language.' );
	        }
	        $link = 'index.php?option=com_jlangeditor';
        	$this->setRedirect($link, $msg);
        }
    }
    
    // save language inforamtion
    function save() {
        // Check for request forgeries
        $post	= JRequest::get('post', JREQUEST_ALLOWHTML);
        
        $model = $this->getModel('jlangeditor');
        $storeMsg = $model->write($post);
		
        if ($storeMsg) {
                $msg = JText::_( 'Language saved!' );
        } else {
                $msg = JText::_( 'Problem on saving language.' );
        }
        
        $link = 'index.php?option=com_jlangeditor&task=edit&file[]=' . $post['filename'];
        $this->setRedirect($link, $msg);
    }
    
    function remove(){
        $session =& JFactory::getSession();
        $lang = $session->get('jlangselect');
        $path = JPATH_ROOT . '/language/' . $lang . "/";
        
        $files = JRequest::getVar('cid');
        if(count($files) >= 1){
            foreach($files as $file)
                @unlink($path . base64_decode($file));
            
            $msg = count($files) . ' ' . JText::_('File(s) deleted.' );
        }
        else{
            $msg = JText::_( 'Select file(s).' );
        }
        
        $link = 'index.php?option=com_jlangeditor';
        $this->setRedirect($link, $msg);
    }
    
    function cancel(){
        $msg = JText::_( 'Operation cancelled.' );
        $link = 'index.php?option=com_jlangeditor';
        $this->setRedirect($link, $msg);
    }
}
