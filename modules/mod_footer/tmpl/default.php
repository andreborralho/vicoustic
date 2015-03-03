<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$url = JURI::current();
$tokens = explode('/', $url);
?>
<div class="footer1<?php echo $moduleclass_sfx ?>">
<?php /*echo $lineone;*/ ?></div>

<div class="footer2<?php echo $moduleclass_sfx ?>">
	<div class="footer_entry">
		<div class="footer_title">
			Main office. R&D and Logistics
		</div>
		<div class="footer_text">
			Avenida do Polo 3, n&deg;159, 4590-137 Carvalhosa. Pa&ccedil;os de Ferreira - Portugal<br>
			Tlm +351 917 851 019
		</div>
		<div class="footer_title">
			Copyright &copy; 2007 Vicoustic. All Rights Reserved.
		</div>
	</div>

	<div class="footer_entry">
		<div class="footer_title">
			Office 2
		</div>
		<div class="footer_text">
			Rua Quinta do Bom Retiro n&deg;16, Armaz&eacute;m 9. 2820-690 Charneca da Caparica - Portugal<br>
			Tlm +351 212 964 100. Fax +351 212 954 101.
		</div>
		<div class="footer_image">
			<img alt="QREN" src="images/icons/logos-qren.png" width="238px" height="48px">
		</div>
		<div class="footer_title">
			<i>Co-Financed Projects:
				<a href="<?php echo $tokens[3] . '/tuned-rooms'; ?>" style="color:#f89f28">Tuned Rooms</a> |
				<a href="<?php echo $tokens[3] . '/vale-inovacao'; ?>" style="color:#f89f28">Vale Inovação</a> |
				<a href="<?php echo $tokens[3] . '/vicoustic-lab'; ?>" style="color:#f89f28">Vicoustic Lab</a>
			</i>
		</div>
	</div>

<?php/* echo JText::_('MOD_FOOTER_LINE2'); */?>
</div>
