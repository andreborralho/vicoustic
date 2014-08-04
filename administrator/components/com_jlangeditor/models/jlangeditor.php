<?php
/**
 * @version		$Id: jlangeditor.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * JlangEditor Model
 */
class JlangEditorModelJlangEditor extends JModelList
{
	public function getLanguages(){
        $path = JPATH_ROOT . '/language/';
        $langs = array();
        if (is_dir($path)) {
            $dh = opendir($path);
            if ($dh) {
                while (($file = readdir($dh)) !== false) {
                    if(!in_array($file, array('.', '..', 'pdf_fonts', 'overrides')) && is_dir($path . $file)){
                        $langs[$file] = $file;
                    }
                }
                closedir($dh);
            }
        }
        ksort($langs);
        return $langs;
	}
	
	function write($post){
        $session =& JFactory::getSession();
        $lang = $session->get('jlangselect', 'en-GB');
		
		// copy file to overrides
		$source_path = JPATH_ROOT . '/language/' . $lang . '/';
		$dest_path = JPATH_ROOT . '/language/overrides/';
		$file = base64_decode($post['filename']);
		
		if(!file_exists($dest_path . $file)){
			if(!copy($source_path . $file, $dest_path . $file)){
				$filename = $source_path . $file;
			}
			else{
				$filename = $dest_path . $file;
				@chmod($filename, 0777);
			}
		}
		else{
			$filename = $dest_path . $file;
		}
        if(!empty($post['lang_text']) && file_exists($filename) && is_writeable($filename)){
            $fp = fopen($filename, "w+");
            fwrite($fp, $post['lang_text']);
            fclose($fp);
            return true;
        }
        else{
            return false;
        }
    }
    
    // get the languages files as per the selection
    function getFiles(){
        $session =& JFactory::getSession();
        $lang = $session->get('jlangselect', 'en-GB');
        $path = JPATH_ROOT . '/language/' . $lang;
        $files = array();
        foreach (glob("$path/*.ini") as $filename) {
            $files[strtolower($filename)] = basename($filename);
        }
        
        return $files;
    }
    
    function getLanguage(){
        $session =& JFactory::getSession();
        $lang = $session->get('jlangselect', 'en-GB');
        $path = JPATH_ROOT . '/language/' . $lang . "/";
        
        $file = JRequest::getVar('file');
        $file = base64_decode($file[0]);
		
		$content = new stdClass();
		$content->language = $lang;
		
		$dest_path = JPATH_ROOT . '/language/overrides/';
		if(file_exists($dest_path . $file)){
			$filename = $dest_path . $file;
			$content->path = $dest_path;
		}
		else{
			$filename = $path . $file;
			$content->path = $path;
		}
        
        if(!empty($file) && file_exists($filename)){
            $content->name 		= $file;
            $content->fullpath 	= $filename;
            $handle = fopen($filename, "r");
            $content->details 	= fread($handle, filesize($filename));
            fclose($handle);
        }
        return $content;
    }
	
	/**
	 * Method override to check if you can edit an existing record.
	 *
	 * @param	array	$data	An array of input data.
	 * @param	string	$key	The name of the key for the primary key.
	 *
	 * @return	boolean
	 * @since	1.6
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Check specific edit permission then general edit permission.
		return JFactory::getUser()->authorise('core.edit', 'com_jlangeditor.message.'.((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
	}
}
