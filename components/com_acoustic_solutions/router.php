<?php
/**
 * @version     1.0.0
 * @package     com_acoustic_simulator_component
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

/**
 * @param	array	A named array
 * @return	array
 */
function Acoustic_solutionsBuildRoute(&$query)
{
	$segments = array();

  if(isset($query['task']))
  {
      $segments[] = $query['task'];
      unset( $query['task'] );
  }
  if(isset($query['id']))
  {
      $segments[] = $query['id'];
      unset( $query['id'] );
  };

	return $segments;
}

/**
 * @param	array	A named array
 * @param	array
 *
 * Formats:
 *
 * index.php?/acoustic_simulator_component/task/id/Itemid
 *
 * index.php?/acoustic_simulator_component/id/Itemid
 */
function Acoustic_solutionsParseRoute($segments)
{
	$vars = array();

	switch($segments[0])
       {              
           case 'acoustic_mb':
               $vars['view'] = 'acoustic_mb';
               $id = explode( ':', $segments[1] );
               $vars['id'] = (int) $id[0];
               break;
       }
       return $vars;
}
