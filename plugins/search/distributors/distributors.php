<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Distributors Search plugin
 *
 * @package		Joomla.Plugin
 * @subpackage	Search.contacts
 * @since		1.6
 */
class plgSearchDistributors extends JPlugin
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
			'distributors' => 'PLG_SEARCH_DISTRIBUTORS_DISTRIBUTORS'
		);
		return $areas;
	}

	/**
	* Distributors Search method
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

		switch ($phrase) {
			case 'exact':
				$text		= $db->Quote('%'.$db->escape($text, true).'%', false);
				$wheres2	= array();
				$wheres2[]	= 'd.name LIKE '.$text;
				$wheres2[]	= 'd.country LIKE '.$text;
				$where		= '(' . implode(') OR (', $wheres2) . ')';
				break;

			case 'all':
			case 'any':
			default:
				$words	= explode(' ', $text);
				$wheres = array();
				foreach ($words as $word)
				{
					$word		= $db->Quote('%'.$db->escape($word, true).'%', false);
					$wheres2	= array();
					$wheres2[]	= 'd.name LIKE '.$word;
					$wheres2[]	= 'd.country LIKE '.$word;
					$wheres[]	= implode(' OR ', $wheres2);
				}
				$where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
				break;
		}

		switch ($ordering) {
			case 'alpha':
				$order = 'd.name ASC';
				break;

			case 'category':

			case 'oldest':
			case 'popular':
			case 'newest':
			default:
				$order = 'd.name ASC';
		}

		$text	= $db->Quote('%'.$db->escape($text, true).'%', false);

		$rows = array();
		if (!empty($state)) {
			$query	= $db->getQuery(true);
			//sqlsrv changes			
			$query->select('d.id AS id, d.name AS title, "" AS created, d.country AS text, d.image AS image');
			$query->select('"1" AS browsernav');
			$query->from('#__distributors AS d');
			$query->where('('. $where .')' );
			$query->order($order);

			// Filter by language
			if ($app->isSite() && $app->getLanguageFilter()) {
				$tag = JFactory::getLanguage()->getTag();
				$query->where('d.language in (' . $db->Quote($tag) . ',' . $db->Quote('*') . ')');				
			}

			$db->setQuery($query, 0, $limit);
			$rows = $db->loadObjectList();

			if ($rows) {
				foreach($rows as $key => $row) {					
					$rows[$key]->component = JText::_('PLG_SEARCH_DISTRIBUTORS_DISTRIBUTORS');
					$rows[$key]->img = $row->logo;
				}
			}
		}
		return $rows;
	}
}
