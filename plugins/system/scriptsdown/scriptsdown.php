<?php

/**
* @package plugin ScriptsDown
* @copyright (C) 2010-2011 RicheyWeb - www.richeyweb.com
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* ScriptsDown Copyright (c) 2010 Michael Richey.
* ScriptsDown is licensed under the http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*
* ScriptsDown version 1.9 for Joomla 1.6.x/1.7.x devloped by RicheyWeb
*
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * ScriptsDown system plugin
 */
class plgSystemScriptsDown extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	object	$subject The object to observe
	 * @param 	array   $config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	function plgSystemScriptsDown( &$subject, $config )
	{
		parent::__construct( $subject, $config );
	}
	
	/* The scripts are all present after the document is rendered */
	function onAfterRender()
	{
		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		/* test that the page is not administrator && test that the document is HTML output*/
		if ($app->isAdmin() || $doc->getType() != 'html') return;
		$omit = array();
		/* now we know this is a frontend page and it is html - begin processing */
		/* first - prepare the omit array */
		
		if(strlen(trim($this->params->get('omit'))) > 0) {
			foreach (explode("\n",$this->params->get('omit')) as $omitme) {
				$omit[] = '/'.str_replace(array('/','\''),array('\/','\\\''),trim($omitme)).'/i';
			}
			unset($omitme);
		}
		$moveme = array();
		$dom = new DOMDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
                $dom->recover = true;
                $dom->substituteEntities = true;
                $source = JResponse::getBody();
                /* DOMDocument can get quite vocal when malformed HTML/XHTML is loaded.
                 * First we grab the current level, and set the error reporting level
                 * to zero, afterwards, we return it to the original value.  This trickery
                 * is used to keep the logs clear of DOMDocument protests while loading the source.
                 */
                $erlevel=error_reporting(0);
                $xhtml=(preg_match('/XHTML/',$source))?true:false;
                switch($xhtml) {
                    case true:
                        $dom->loadXML($source);
                        break;
                    case false:
                        $dom->loadHTML($source);
                        break;
                }
                error_reporting($erlevel);   
		$body = @$dom->getElementsByTagName('body')->item(0);
		foreach(@$dom->getElementsByTagName('head') as $head) {
		    foreach(@$head->childNodes as $node) {
		        if($node instanceof DOMComment) {
		        	if(preg_match('/<script/i',$node->nodeValue)) $src = $node->nodeValue;
		        }
		        if($node->nodeName == 'script' && $node->attributes->getNamedItem('type')->nodeValue == 'text/javascript') {
		        	if(@$src = $node->attributes->getNamedItem('src')->nodeValue) {
		        	} else {
		        		$src = $node->nodeValue;
		        	}
		        }
		        if(isset($src)) {
                            $move=($this->params->get('exclude'))?true:false;
					foreach ($omit as $omitit) {
						if(preg_match($omitit,$src)==1) {
                                                    $move=($this->params->get('exclude'))?false:true;
                                                    break;
						}
					}
                                        if($move) $moveme[]=$node;
		        	unset($src);
		        }
		    }
		}
                $newline = $dom->createTextNode("\n");
		foreach($moveme as $moveit) {
			$body->appendChild($moveit->cloneNode(true));
                        $body->appendChild($newline->cloneNode(false));
			$moveit->parentNode->removeChild($moveit);
		}
                JResponse::setBody($xhtml?$dom->saveXML():$dom->saveHTML());
	}
}