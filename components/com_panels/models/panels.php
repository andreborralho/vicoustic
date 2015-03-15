<?php

	/**
	 * @version     1.0.0
	 * @package     com_panels
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	/**
	 * Methods supporting a list of panels records.
	 */
	class PanelsModelPanels extends JModelList {

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

			// List state information.
			parent::populateState($ordering, $direction);
		}

		protected function getListQuery() {
			$tokens = explode('/', JURI::current());
			$last_url = $tokens[sizeof($tokens)-1];

			// Create a new query object.
			$db = $this->getDbo();
			$query = $db->getQuery(true);

			// Select the required fields from the table.
			$query->select(
				$this->getState(
					'list.select', 'a.*'
				)
			);

			$query->from('`#__panels` AS a');
			$query->order('a.name');

			// Filter by published state
			$query->where('(a.state_featured = 1)');

			switch ($last_url) {
				case 'walls-panels':
					$query->where('(a.installation_wall = 1)');
					break;
				case 'ceilings-panels':
					$query->where('(a.installation_ceiling = 1)');
					break;
				case 'vertical-acoustic':
					$query->where('(a.installation_vas = 1)');
					break;
				case 'absorption':
					$query->where('(a.functionality = "absorption" OR a.functionality = "hybrid")');
					break;
				case 'diffusion':
					$query->where('(a.functionality = "diffusion" OR a.functionality = "hybrid")');
					break;
				case 'basstrap':
					$query->where('(a.functionality = "basstrap" OR a.functionality = "hybrid")');
					break;
			}

			return $query;
		}

	}
