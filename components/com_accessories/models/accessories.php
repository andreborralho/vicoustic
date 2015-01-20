<?php

	/**
	 * @version     1.0.0
	 * @package     com_accessories
	 * @copyright   Copyright (C) 2013. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre <andrefilipe_one@hotmail.com> - http://
	 */
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	/**
	 * Methods supporting a list of Accessories records.
	 */
	class AccessoriesModelAccessories extends JModelList {

		public function __construct($config = array()) {
			parent::__construct($config);
		}

		protected function populateState($ordering = null, $direction = null) {
			// Initialise variables.
			$app = JFactory::getApplication();

			// List state information
			$limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
			$this->setState('list.limit', $limit);

			$limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
			$this->setState('list.start', $limitstart);

			parent::populateState($ordering, $direction);
		}

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

			$query->from('`#__accessories` AS a');

			// Filter by published state
			$query->where('a.state_featured = 1');

			if(strpos(JURI::current(),'music-broadcast') !== false) {
				$query->where('a.music_broadcast = 1');
			}
			elseif(strpos(JURI::current(),'hifi-home-cinema') !== false){
				$query->where('a.hifi_home_cinema = 1');
			}
			elseif(strpos(JURI::current(),'building-construction') !== false){
				$query->where('a.building_construction = 1');
			}

			return $query;
		}

	}
