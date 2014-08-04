<?php
/**
 * @version     1.0.0
 * @package     com_accessories
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

/**
 * @param	array	A named array
 * @return	array
 */
function AccessoriesBuildRoute(&$query)
{
	$segments = array();
       if(isset($query['view']))
       {
            $segments[] = $query['view'];
            unset( $query['view'] );
       }
       if(isset($query['id']))
       {
            $segments[] = $query['id'];
            unset( $query['id'] );
       };
       return $segments;

	return $segments;
}

/**
 * @param	array	A named array
 * @param	array
 *
 * Formats:
 *
 * index.php?/accessories/task/id/Itemid
 *
 * index.php?/accessories/id/Itemid
 */
function AccessoriesParseRoute($segments)
{
	$vars = array();
       switch($segments[0])
       {              
           case 'accessory':
               $vars['view'] = 'accessory';
               $id = explode( ':', $segments[1] );
               $vars['id'] = (int) $id[0];
               break;
       }
       return $vars;
}
