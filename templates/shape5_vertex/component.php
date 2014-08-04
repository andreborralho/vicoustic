<?php
defined('_JEXEC') or die;
define( 'TEMPLATEPATH', dirname(__FILE__) );


$LiveSiteUrl = JURI::root();
$s5templatename = $this->template;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $LiveSiteUrl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
	<link href="<?php echo $LiveSiteUrl ?>templates/<?php echo $s5templatename ?>/css/template.css" rel="stylesheet" type="text/css" media="screen" />
	<!--link href="<?/*php echo $LiveSiteUrl */?>templates/<?/*php echo $s5templatename */?>/css/editor.css" rel="stylesheet" type="text/css" media="screen" /-->
	
<style type="text/css">
a, h1, h2, h3, h4, h5 {
color:#000000;}
body {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 
</style>
</head>

<body class="contentpane">
	<div style="padding:14px;">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	</div>
</body>
</html>
