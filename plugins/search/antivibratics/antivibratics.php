<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Antivibratics Search plugin
 *
 * @package		Joomla.Plugin
 * @subpackage	Search.contacts
 * @since		1.6
 */
class plgSearchAntivibratics extends JPlugin
{	
	/**	 
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.5
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	* @return array An array of search areas
	*/
	function onContentSearchAreas()
	{
		static $areas = array(
			'antivibratics' => 'PLG_SEARCH_ANTIVIBRATICS_ANTIVIBRATICS'
		);
		return $areas;
	}

	/**
	* Antivibratics Search method
	*
	* The sql must return the following fields that are used in a common display
	* routine: href, title, section, created, text, browsernav
	* @param string Target search string
	* @param string matching option, exact|any|all
	* @param string ordering option, newest|oldest|popular|alpha|category
	 */
	function onContentSearch($text, $phrase='', $ordering='', $areas=null)
	{
		$db		= JFactory::getDbo();
		$app	= JFactory::getApplication();
		$user	= JFactory::getUser();
		$groups	= implode(',', $user->getAuthorisedViewLevels());

		if (is_array($areas)) {
			if (!array_intersect($areas, array_keys($this->onContentSearchAreas()))) {
				return array();
			}
		}

		$sContent		= $this->params->get('search_content',		1);
		$sArchived		= $this->params->get('search_archived',		1);
		$limit			= $this->params->def('search_limit',		50);
		$state = array();
		if ($sContent) {
			$state[]=1;
		}
		if ($sArchived) {
			$state[]=2;
		}

		$text = trim($text);
		if ($text == '') {
			return array();
		}

        $text = $db->Quote('%'.$db->escape($text, true).'%', false);
        $where = 'p.name LIKE ' . $text . ' OR p.family LIKE ' . $text . ' OR p.ref LIKE ' . $text;

		switch ($ordering) {
			case 'alpha':
				$order = 'p.name ASC';
				break;

			case 'category':

			case 'oldest':
			case 'popular':
			case 'newest':
			default:
				$order = 'p.name ASC';
		}

		$rows = array();
		if (!empty($state)) {
			$query	= $db->getQuery(true);
			//sqlsrv changes			
			$query->select('p.id AS id, p.name AS title, "" AS created, p.family AS text, p.photo_150px AS photo_150px');
			$query->select('"1" AS browsernav');
			$query->from('#__antivibratics AS p');
			$query->where('('. $where . ')' );
			$query->order($order);

			// Filter by language
			if ($app->isSite() && $app->getLanguageFilter()) {
				$tag = JFactory::getLanguage()->getTag();
				$query->where('p.language in (' . $db->Quote($tag) . ',' . $db->Quote('*') . ')');				
			}

			$db->setQuery($query, 0, $limit);
			$rows = $db->loadObjectList();

			$url = JURI::current();
			$tokens = explode('/', $url);

			if ($rows) {
				foreach($rows as $key => $row) {
					$rows[$key]->href = $tokens[3] . '/products/insulation/antivibratics/antivibratic/'.$row->id;
					$rows[$key]->component = JText::_('PLG_SEARCH_ANTIVIBRATICS_ANTIVIBRATICS');
					$rows[$key]->img = $row->photo_150px;
				}
			}
		}
		return $rows;
	}
}
