<?php
/**
 * Element: Text Area Plus
 * Displays a text area with extra options
 *
 * @package         NoNumber Framework
 * @version         12.11.1
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

class nnFieldTextAreaPlus
{
	var $_version = '12.11.1';

	function getLabel($name, $id, $label, $description, $params)
	{
		$this->params = $params;

		$html = '<label id="' . $id . '-lbl" for="' . $id . '"';
		if ($description) {
			$html .= ' class="hasTip" title="' . $label . '::' . JText::_($description) . '">';
		} else {
			$html .= '>';
		}
		$html .= $label . '</label>';

		return $html;
	}

	function getInput($name, $id, $value, $params)
	{
		$this->params = $params;

		$resize = $this->def('resize', 1);
		$width = $this->def('width', 400);
		$minwidth = $this->def('minwidth', 200);
		$minwidth = min($width, $minwidth);
		$maxwidth = $this->def('maxwidth', 1200);
		$maxwidth = max($width, $maxwidth);
		$height = $this->def('height', 80);
		$minheight = $this->def('minheight', 40);
		$minheight = min($height, $minheight);
		$maxheight = $this->def('maxheight', 600);
		$maxheight = max($height, $maxheight);
		$class = $this->def('class', 'text_area');
		$class = 'class="' . $class . '"';
		$type = $this->def('texttype');

		if ($resize) {
			$document = JFactory::getDocument();
			$document->addScript(JURI::root(true) . '/plugins/system/nnframework/fields/textareaplus/textareaplus.js?v=' . $this->_version);
			$document->addStyleSheet(JURI::root(true) . '/plugins/system/nnframework/fields/textareaplus/textareaplus.css?v=' . $this->_version);
			// not for Safari (and other webkit browsers) because it has its own resize option
			$script = 'window.addEvent( \'domready\', function() {'
				. ' if ( !window.webkit ) {'
				. ' new TextAreaResizer( \'' . $id . '\', { \'min_x\':' . $minwidth . ', \'max_x\':' . $maxwidth . ', \'min_y\':' . $minheight . ', \'max_y\':' . $maxheight . ' } );'
				. " }"
				. " });";
			$document->addScriptDeclaration($script);
		}

		if ($type == 'html') {
			// Convert <br /> tags so they are not visible when editing
			$value = str_replace('<br />', "\n", $value);
		} else if ($type == 'regex') {
			// Protects the special characters
			$value = str_replace('[:REGEX_ENTER:]', '\n', $value);
		}

		return '<textarea name="' . $name . '" cols="' . (round($width / 7.5)) . '" rows="' . (round($height / 15)) . '" style="width:' . $width . 'px;height:' . $height . 'px" ' . $class . ' id="' . $id . '" >' . $value . '</textarea>';
	}

	private function def($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
}

class JElementNN_TextAreaPlus extends JElement
{
	var $_name = 'TextAreaPlus';

	function fetchTooltip($label, $description, &$node, $control_name, $name)
	{
		$this->_nnfield = new nnFieldTextAreaPlus;
		return $this->_nnfield->getLabel($control_name . '[' . $name . ']', $control_name . $name, JText::_($label), $description, $node->attributes(), 1);
	}

	function fetchElement($name, $value, &$node, $control_name)
	{
		return $this->_nnfield->getInput($control_name . '[' . $name . ']', $control_name . $name, $value, $node->attributes());
	}
}
