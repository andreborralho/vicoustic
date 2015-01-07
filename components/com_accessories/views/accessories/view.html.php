<?php
	/**
	 * @version     1.0.0
	 * @package     com_accessories
	 * @copyright   Copyright (C) 2013. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      Andre <andrefilipe_one@hotmail.com> - http://
	 */

// No direct access
	defined('_JEXEC') or die;

	jimport('joomla.application.component.view');
	require_once JPATH_COMPONENT . '/helpers/accessories.php';
	JFactory::getLanguage()->load('com_vicoustic', JPATH_SITE, 'en-GB');

	/**
	 * View class for a list of Accessories.
	 */
	class AccessoriesViewAccessories extends JView {

		protected $items;
		protected $pagination;
		protected $state;
		protected $params;

		public function display($tpl = null) {
			$app           		= JFactory::getApplication();
			$this->state			= $this->get('State');
			$this->items			= $this->get('Items');
			$this->pagination	= $this->get('Pagination');
			$this->params     = $app->getParams('com_accessories');

			// Check for errors.
			if (count($errors = $this->get('Errors'))) {
				throw new Exception(implode("\n", $errors));
			}

			$this->_prepareDocument();

			parent::display($tpl);
		}

		protected function _prepareDocument() {
			$app	= JFactory::getApplication();
			$menus	= $app->getMenu();
			$title	= null;

			// Because the application sets a default page title, we need to get it from the menu item itself
			$menu = $menus->getActive();
			if($menu) {
				$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
			} else {
				$this->params->def('page_heading', JText::_('com_accessories_DEFAULT_PAGE_TITLE'));
			}
			$title = $this->params->get('page_title', '');
			if (empty($title)) {
				$title = $app->getCfg('sitename');
			}
			elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
				$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
			}
			elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
				$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
			}
			$this->document->setTitle($title);

			if ($this->params->get('menu-meta_description')) {
				$this->document->setDescription($this->params->get('menu-meta_description'));
			}

			if ($this->params->get('menu-meta_keywords')) {
				$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
			}

			if ($this->params->get('robots')) {
				$this->document->setMetadata('robots', $this->params->get('robots'));
			}
		}

	}
