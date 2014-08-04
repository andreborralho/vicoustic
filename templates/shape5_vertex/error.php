<?php
/**
 * @version		$Id: error.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;
define( 'TEMPLATEPATH', dirname(__FILE__) );


if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false; 
}

$LiveSiteUrl = JURI::root();
$s5templatename = $this->template;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="keywords" content="Vicoustic,error 404">
	<meta name="description" content="Vicoustic Error 404 File not found">

	<link href="<?php echo $LiveSiteUrl ?>templates/<?php echo $s5templatename ?>/css/template.css" rel="stylesheet" type="text/css" media="screen" />
	<!--link href="<?php echo $LiveSiteUrl ?>templates/<?php echo $s5templatename ?>/css/editor.css" rel="stylesheet" type="text/css" media="screen" /-->
	<link href="<?php echo $LiveSiteUrl ?>templates/<?php echo $s5templatename ?>/css/error.css" rel="stylesheet" type="text/css" media="screen" />


	<style>
	body {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 
	</style>
</head>
<body>
	<div id="error404_body">
		<div class="error">
			<div id="outline">
				<div id="error404">
					<img alt="logo" style="height:120px;width:370px;cursor:pointer;" src="http://localhost/vicjoomla/images/Vicoustic_WHT_BG.png" onclick="window.document.location.href='http://localhost/vicjoomla/'">							
				</div>	
				<div id="error404_message">
					Page not found!
				</div>				
			</div>
		</div>
	</div>
</body>
</html>
