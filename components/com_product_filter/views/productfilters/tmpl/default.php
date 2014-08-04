<?php
/**
 * @version     1.0.0
 * @package     com_product_filter
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;


$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/components.js');

$url = JURI::current();
$tokens = explode('/', $url);
?>

<h1 class="page_title">Product Filter</h1>


<div id="filter_categories_buttons">

    <div id="filter_panels_button" class="filter_button">    	
    	<div class="filter_button_label">Panels</div>
    </div>
    <div id="filter_doors_button" class="filter_button">
    	<div class="filter_button_label">Acoustic Doors</div>
    </div>
    <div id="filter_antivibratics_button" class="filter_button">
    	<div class="filter_button_label">Anti-Vibratics</div>
    </div>
    <div id="filter_blankets_button" class="filter_button">
    	<div class="filter_button_label">Blankets</div>
    </div>
</div>

<div>
	
<!--+++++++++++++++++++++++++++++++++++++DOORS FORM+++++++++++++++++++++++++++++++++-->
	<form action="<?php echo JRoute::_('index.php?option=com_product_filter&view=productfilters'); ?>" method="post" name="filter_doors" id="filter_doors">	

		<input type="hidden" name="category_button" value="doors">

		<?php 
			$rw_list = array();

			$db =& JFactory::getDBO();
		    $query = 'SELECT DISTINCT rw FROM `#__doors` WHERE rw>0 AND state=1';
			$db->setQuery( $query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :
		    	if($drop_list->rw):
		    		array_push($rw_list, $drop_list->rw);
		    	endif;
		    endforeach;
	    ?>

	    <div id="filter_doors_form" class="filter_form">

	    	<div class="filter_form_title">Performance</div>
	    	<div id="filter_doors_performance" class="filter_form_content">
				
				<div class="filter_form_dropdown_label">Rw</div>				
				<select name="doors_rw">
					<option value="">Please select</option>

					<?php foreach ($rw_list as $rw) :?>
						
						<?php if($_POST['doors_rw'] == $rw): ?>
							<option value="<?php echo $rw; ?>" selected><?php echo $rw; ?> dB</option>
						<?php else: ?>
							<option value="<?php echo $rw; ?>"><?php echo $rw; ?> dB</option>
						<?php endif; ?>	

					<?php endforeach; ?>
				</select>							
			</div>

	    	<div class="filter_form_title">Number of Doors</div>
			<div id="filter_doors_number_doors" class="filter_form_content doors_filter_form_content">

				<input type="hidden" name="doors_1door" value="2">
				<?php if($_POST['doors_1door'] == 2): ?>
					<input type="checkbox" name="doors_1door" value="1">1 Door<br>
				<?php else :?>
					<input type="checkbox" name="doors_1door" value="1" checked>1 Door<br>
				<?php endif; ?>

				<input type="hidden" name="doors_2doors" value="2">
				<?php if($_POST['doors_2doors'] == 2): ?>
					<input type="checkbox" name="doors_2doors" value="1">2 Doors
				<?php else :?>
					<input type="checkbox" name="doors_2doors" value="1" checked>2 Doors
				<?php endif; ?>			
			</div>

	    	<div class="filter_form_title">Finish</div>
			<div id="filter_doors_finish" class="filter_form_content doors_filter_form_content">
				
				<input type="hidden" name="doors_wood" value="2" >
				<?php if($_POST['doors_wood'] == 2): ?>
					<input type="checkbox" name="doors_wood" value="1">Wood<br>
				<?php else :?>
					<input type="checkbox" name="doors_wood" value="1" checked>Wood<br>
				<?php endif; ?>
				
				<input type="hidden" name="doors_steel" value="2" >
				<?php if($_POST['doors_steel'] == 2): ?>
					<input type="checkbox" name="doors_steel" value="1">Steel<br>
				<?php else :?>
					<input type="checkbox" name="doors_steel" value="1" checked>Steel<br>
				<?php endif; ?>
			</div>

			<input type="submit" value="Submit">
	    </div>
	</form>

<!--+++++++++++++++++++++++++++++++++ANTIVIBRATICS FORM+++++++++++++++++++++++++++++-->
	<form action="<?php echo JRoute::_('index.php?option=com_product_filter&view=productfilters'); ?>" method="post" name="filter_antivibratics" id="filter_antivibratics">	

		<input type="hidden" name="category_button" value="antivibratics">

		<?php 
			$load_weight_list = array();
			$load_weight_max_list = array();
			$load_weight_min_list = array();

			$db =& JFactory::getDBO();
		    $query = 'SELECT DISTINCT load_weight_max, load_weight_min FROM `#__antivibratics` WHERE load_weight_max>0 AND state=1 ORDER BY load_weight_max';
			$db->setQuery($query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :

		    	if($drop_list->load_weight_max == $drop_list->load_weight_min || $drop_list->load_weight_min == 0):
		    		array_push($load_weight_list, $drop_list->load_weight_max . ' Kg');
		    		array_push($load_weight_max_list, $drop_list->load_weight_max);
		    		array_push($load_weight_min_list, $drop_list->load_weight_max);
		    	elseif($drop_list->load_weight_max):
		    		array_push($load_weight_list, $drop_list->load_weight_min . ' - ' . $drop_list->load_weight_max . ' Kg');
		    		array_push($load_weight_max_list, $drop_list->load_weight_max);
		    		array_push($load_weight_min_list, $drop_list->load_weight_min);
		    	endif;

		    endforeach;

			
			$mounting_width_list = array();

			$db =& JFactory::getDBO();
		    $query = 'SELECT DISTINCT mounting_width FROM `#__antivibratics` WHERE mounting_width>0 AND state=1 ORDER BY mounting_width';
			$db->setQuery($query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :		    	
		    	if($drop_list->mounting_width):
			    	array_push($mounting_width_list, $drop_list->mounting_width);
			    endif;
		    endforeach;
	    ?>

	    <div id="filter_antivibratics_form" class="filter_form">

	    	<div class="filter_form_title">Installation Place</div>
			<div id="filter_antivibratics_installation" class="filter_form_content">

				<input type="hidden" name="antivibratics_wall" value="2" >
				<?php if($_POST['antivibratics_wall'] == 2): ?>
					<input type="checkbox" name="antivibratics_wall" value="1">Wall<br>
				<?php else :?>
					<input type="checkbox" name="antivibratics_wall" value="1" checked>Wall<br>
				<?php endif; ?>

				<input type="hidden" name="antivibratics_ceiling" value="2" >
				<?php if($_POST['antivibratics_ceiling'] == 2): ?>
					<input type="checkbox" name="antivibratics_ceiling" value="1">Ceiling<br>
				<?php else :?>
					<input type="checkbox" name="antivibratics_ceiling" value="1" checked>Ceiling<br>
				<?php endif; ?>

				<input type="hidden" name="antivibratics_floor" value="2" >
				<?php if($_POST['antivibratics_floor'] == 2): ?>
					<input type="checkbox" name="antivibratics_floor" value="1">Floor<br>
				<?php else :?>
					<input type="checkbox" name="antivibratics_floor" value="1" checked>Floor<br>
				<?php endif; ?>

				<input type="hidden" name="antivibratics_division_wall" value="2" >
				<?php if($_POST['antivibratics_division_wall'] == 2): ?>
					<input type="checkbox" name="antivibratics_division_wall" value="1">Division Wall<br>
				<?php else :?>
					<input type="checkbox" name="antivibratics_division_wall" value="1" checked>Division Wall<br>
				<?php endif; ?>
			</div>

	    	<div class="filter_form_title">Capacity</div>
	    	<div class="filter_form_content">

	    		<div class="filter_form_dropdown_label">Load Weight</div>
	    			  		
				<select name="antivibratics_load_weight">
					<option value="">Please select</option>

					<?php for ($i=0; $i <= sizeof($load_weight_list)-1; $i++): ?>
						<?php if($_POST['antivibratics_load_weight'] == $load_weight_max_list[$i]): ?>
							<option value="<?php echo $load_weight_max_list[$i]; ?>" selected><?php echo $load_weight_list[$i]; ?></option>
						<?php else : ?>
							<option value="<?php echo $load_weight_max_list[$i]; ?>"><?php echo $load_weight_list[$i]; ?></option>
						<?php endif; ?>
						
					<?php endfor; ?>
				</select>
			
				<div class="filter_form_dropdown_label">Mounting Width</div>
				<select name="antivibratics_mounting_width">
					<option value="">Please select</option>

					<?php foreach ($mounting_width_list as $mounting_width) :?>

						<?php if($_POST['antivibratics_mounting_width'] == $mounting_width): ?>
							<option value="<?php echo $mounting_width; ?>" selected><?php echo $mounting_width; ?></option>								
						<?php else: ?>
							<option value="<?php echo $mounting_width; ?>"><?php echo $mounting_width; ?></option>								
						<?php endif; ?>	

					<?php endforeach; ?>
				</select>				
			</div>			  	    	

			 <input type="submit" value="Submit">
	    </div>
	</form>    

<!--+++++++++++++++++++++++++++++++++++BLANKETS FORM++++++++++++++++++++++++++++++++-->
	<form action="<?php echo JRoute::_('index.php?option=com_product_filter&view=productfilters'); ?>" method="post" name="filter_blankets" id="filter_blankets">	

		<input type="hidden" name="category_button" value="blankets">

		<?php 
			$blankets_rw_list = array(); 

			$db =& JFactory::getDBO();
		    $query = 'SELECT DISTINCT rw FROM `#__blankets` WHERE rw>0 AND state=1 ORDER BY rw';
			$db->setQuery($query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :
		    	if($drop_list->rw):
		    		array_push($blankets_rw_list, $drop_list->rw);
		    	endif;
		    endforeach;
	    ?>

		<div id="filter_blankets_form" class="filter_form">			

			<div class="filter_form_title">Performance</div>
			<div id="filter_blankets_performance" class="filter_form_content">
				<div id="filter_blankets_rw_dropdown" class="filter_form_dropdown">Rw<br>

					<select name="blankets_rw">
						<option value="">Please select</option>

						<?php foreach ($blankets_rw_list as $rw): ?>
							<?php if($_POST['blankets_rw'] == $rw): ?>
								<option value="<?php echo $rw; ?>" selected><?php echo $rw; ?> dB</option>
							<?php else: ?>
								<option value="<?php echo $rw; ?>"><?php echo $rw; ?> dB</option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

	    	<input type="submit" value="Submit">
	    </div>
	</form>    

<!--+++++++++++++++++++++++++++++++++++PANELS FORM++++++++++++++++++++++++++++++++++-->
	<form action="<?php echo JRoute::_('index.php?option=com_product_filter&view=productfilters'); ?>" method="post" name="filter_panels" id="filter_panels">	

		<input type="hidden" name="category_button" value="panels">

		<?php

			$current_url = JURI::current();
	        $url_parts = explode('/', $current_url);
	        $url_market1 = $url_parts[3];
	        $url_market2 = $url_parts[4];

		//--------------------LENGTH--------------------//
			$length_list = array();

			$db =& JFactory::getDBO();

			if($url_market1 == "music-broadcast" || $url_market2 == "music-broadcast"){
	            $market_area = 'music_broadcast = 1';
	        }
	        elseif($url_market1 == "hifi-home-cinema" || $url_market2 == "hifi-home-cinema"){
	            $market_area = 'hifi_home_cinema = 1';
	        }
	        elseif($url_market1 == "building-construction" || $url_market2 == "building-construction"){
	            $market_area = 'building_construction = 1';
	        }

			if($_POST['panels_width']!="" && $_POST['panels_thickness']!=""):
				$width = 'width='. $_POST['panels_width'];
				$thickness = 'thickness='. $_POST['panels_thickness'];
				$query = 'SELECT DISTINCT length FROM `#__panels` WHERE ' . $width . ' AND ' . $thickness . ' AND length>0 AND ' . $market_area . ' AND state=1';			

			elseif($_POST['panels_width']!=""):
				$width = 'width='. $_POST['panels_width'] . ' AND';
				$query = 'SELECT DISTINCT length FROM `#__panels` WHERE ' . $width . ' length>0 AND ' . $market_area . ' AND state=1';
			
			elseif($_POST['panels_thickness']!=""):
				$thickness = 'thickness='. $_POST['panels_thickness'] . ' AND';
				$query = 'SELECT DISTINCT length FROM `#__panels` WHERE ' . $thickness . ' length>0 AND ' . $market_area . ' AND state=1';
				
			else:
		    	$query = 'SELECT DISTINCT length FROM `#__panels` WHERE length>0 AND ' . $market_area . ' AND state=1';
			endif;

			$db->setQuery( $query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :
		    	if($drop_list->length):
		    		array_push($length_list, $drop_list->length);
		    	endif;		    	
		    endforeach;

		    sort($length_list);

		//--------------------WIDTH--------------------//
		    $width_list = array();
		    $db =& JFactory::getDBO();
			
			if($_POST['panels_length']!="" && $_POST['panels_thickness']!=""):
				$length = 'length='. $_POST['panels_length'];
				$thickness = 'thickness='. $_POST['panels_thickness'];
				$query = 'SELECT DISTINCT width FROM `#__panels` WHERE ' . $length . ' AND ' . $thickness . ' AND width>0 AND ' . $market_area . ' AND state=1';			

			elseif($_POST['panels_length']!=""):
				$length = 'length='. $_POST['panels_length'] . ' AND';
				$query = 'SELECT DISTINCT width FROM `#__panels` WHERE ' . $length . ' width>0 AND ' . $market_area . ' AND state=1';
			
			elseif($_POST['panels_thickness']!=""):
				$thickness = 'thickness='. $_POST['panels_thickness'] . ' AND';
				$query = 'SELECT DISTINCT width FROM `#__panels` WHERE ' . $thickness . ' width>0 AND ' . $market_area . ' AND state=1';

			else:
			    $query = 'SELECT DISTINCT width FROM `#__panels` WHERE width>0 AND ' . $market_area . ' AND state=1';
			endif;
			
			$db->setQuery( $query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :
		    	if($drop_list->width):
		    		array_push($width_list, $drop_list->width);
		    	endif;		    	
		    endforeach;

		    sort($width_list);

		//-------------------THICKNESS-----------------//
		    $thickness_list = array();
		    $db =& JFactory::getDBO();
			
			if($_POST['panels_length']!="" && $_POST['panels_width']!=""):
				$length = 'length='. $_POST['panels_length'];
				$width = 'width='. $_POST['panels_width'];
				$query = 'SELECT DISTINCT thickness FROM `#__panels` WHERE ' . $length . ' AND ' . $width . ' AND thickness>0 AND ' . $market_area . ' AND state=1';

			elseif($_POST['panels_length']!=""):
				$length = 'length='. $_POST['panels_length'] . ' AND';
				$query = 'SELECT DISTINCT thickness FROM `#__panels` WHERE ' . $length . ' thickness>0 AND ' . $market_area . ' AND state=1';
			
			elseif($_POST['panels_width']!=""):
				$width = 'width='. $_POST['panels_width'] . ' AND';
				$query = 'SELECT DISTINCT thickness FROM `#__panels` WHERE ' . $width . ' thickness>0 AND ' . $market_area . ' AND state=1';

			else:
			    $query = 'SELECT DISTINCT thickness FROM `#__panels` WHERE thickness>0 AND ' . $market_area . ' AND state=1';
			endif;

			$db->setQuery( $query, 0 , $this->drop_lists);
		    $drop_lists = $db->loadObjectList();

		    foreach($drop_lists as $drop_list) :
		    	if($drop_list->thickness):
		    		array_push($thickness_list, $drop_list->thickness);
		    	endif;
		    endforeach;

		    sort($thickness_list);
	    ?>

	    <div id="filter_panels_form" class="filter_form">

	    	<input type="submit" value="Submit">	    	

			<div class="filter_form_title">Functionality</div>
			<div id="filter_panels_functionality" class="filter_form_content">

				<input type="hidden" name="panels_absorption" value="2" >
				<?php if($_POST['panels_absorption'] == 2): ?>
					<input type="checkbox" name="panels_absorption" value="1">Absorption<br>
				<?php else :?>
					<input type="checkbox" name="panels_absorption" value="1" checked>Absorption<br>
				<?php endif; ?>

				<input type="hidden" name="panels_diffusion" value="2" >
				<?php if($_POST['panels_diffusion'] == 2): ?>
					<input type="checkbox" name="panels_diffusion" value="1">Diffusion<br>				
				<?php else :?>
					<input type="checkbox" name="panels_diffusion" value="1" checked>Diffusion<br>
				<?php endif; ?>

				<input type="hidden" name="panels_basstrap" value="2" >
				<?php if($_POST['panels_basstrap'] == 2): ?>
					<input type="checkbox" name="panels_basstrap" value="1">Basstrap
				<?php else :?>
					<input type="checkbox" name="panels_basstrap" value="1" checked>Basstrap
				<?php endif; ?>						
			</div>

			<div class="filter_form_title">Absorption Frequencies</div>
			<div id="filter_panels_absorption_frequencies" class="filter_form_content">
				
				<input type="hidden" name="panels_low" value="2" >
				<?php if($_POST['panels_low'] == 2): ?>
					<input type="checkbox" name="panels_low" value="1">Low<br>
				<?php else :?>
					<input type="checkbox" name="panels_low" value="1" checked>Low<br>
				<?php endif; ?>

				<input type="hidden" name="panels_medium" value="2" >
				<?php if($_POST['panels_medium'] == 2): ?>
					<input type="checkbox" name="panels_medium" value="1">Medium<br>
				<?php else :?>
					<input type="checkbox" name="panels_medium" value="1" checked>Medium<br>
				<?php endif; ?>

				<input type="hidden" name="panels_high" value="2" >
				<?php if($_POST['panels_high'] == 2): ?>
					<input type="checkbox" name="panels_high" value="1" >High<br>
				<?php else :?>
					<input type="checkbox" name="panels_high" value="1" checked>High<br>
				<?php endif; ?>

				<input type="hidden" name="panels_full" value="2" >
				<?php if($_POST['panels_full'] == 2): ?>
					<input type="checkbox" name="panels_full" value="1">Full
				<?php else :?>				
					<input type="checkbox" name="panels_full" value="1" checked>Full
				<?php endif; ?>
			</div>

			<div class="filter_form_title">Dimensions</div>
			<div id="filter_panels_dimensions" class="filter_form_content">
				<div id="filter_panels_length_dropdown" class="filter_form_dropdown">Length<br></div>

					<select name="panels_length" onchange="this.form.submit()">
						<option value="">Please select</option>

						<?php foreach ($length_list as $length) :?>
							
							<?php if($_POST['panels_length'] == $length): ?>
								<option value="<?php echo $length; ?>" selected><?php echo $length; ?>mm</option>
							<?php else: ?>
								<option value="<?php echo $length; ?>"><?php echo $length; ?>mm</option>
							<?php endif; ?>	

						<?php endforeach; ?>
					</select>			
				
				<div id="filter_panels_width_dropdown" class="filter_form_dropdown">Width<br>

					<select name="panels_width" onchange="this.form.submit()">
						<option value="">Please select</option>

						<?php foreach ($width_list as $width) :?>
							
							<?php if($_POST['panels_width'] == $width): ?>
								<option value="<?php echo $width; ?>" selected><?php echo $width; ?>mm</option>
							<?php else: ?>
								<option value="<?php echo $width; ?>"><?php echo $width; ?>mm</option>
							<?php endif; ?>	

						<?php endforeach; ?>
					</select>		
				</div>
				<div id="filter_panels_thickness_dropdown" class="filter_form_dropdown">Thickness<br>
					<select name="panels_thickness" onchange="this.form.submit()">
						<option value="">Please select</option>

						<?php foreach ($thickness_list as $thickness) :?>
							
							<?php if($_POST['panels_thickness'] == $thickness): ?>
								<option value="<?php echo $thickness; ?>" selected><?php echo $thickness; ?>mm</option>
							<?php else: ?>
								<option value="<?php echo $thickness; ?>"><?php echo $thickness; ?>mm</option>
							<?php endif; ?>	

						<?php endforeach; ?>
					</select>
				</div>				
			</div>
			
			<div class="filter_form_title">Performance</div>
			<div id="filter_panels_performance" class="filter_form_content">				
				<div id="filter_panels_absorption_class">Absorption Class<br>
					<select name="panels_absorption_class">
						<option value="">Please select</option>

						<?php if($_POST['panels_absorption_class'] == "A"): ?>
							<option value="A" selected>A</option>
						<?php else: ?>
							<option value="A">A</option>
						<?php endif; ?>

						<?php if($_POST['panels_absorption_class'] == "B"): ?>				
							<option value="B" selected>B</option>
						<?php else: ?>
							<option value="B">B</option>
						<?php endif; ?>

						<?php if($_POST['panels_absorption_class'] == "C"): ?>				
							<option value="C" selected>C</option>
						<?php else: ?>
							<option value="C">C</option>
						<?php endif; ?>

						<?php if($_POST['panels_absorption_class'] == "D"): ?>				
							<option value="D" selected>D</option>
						<?php else: ?>
							<option value="D">D</option>
						<?php endif; ?>

						<?php if($_POST['panels_absorption_class'] == "E"): ?>				
							<option value="E" selected>E</option>
						<?php else: ?>
							<option value="E">E</option>
						<?php endif; ?>
					
					</select>
				</div>
			</div>


			<div class="filter_form_title">Fixing Type</div>
			<div id="filter_panels_fixing_type" class="filter_form_content">

				<input type="hidden" name="panels_15mm" value="2" >
				<?php if($_POST['panels_15mm'] == 2): ?>
					<input type="checkbox" name="panels_15mm" value="1">Standard 15mm<br>
				<?php else :?>	
					<input type="checkbox" name="panels_15mm" value="1" checked>Standard 15mm<br>
				<?php endif; ?>

				<input type="hidden" name="panels_24mm" value="2" >
				<?php if($_POST['panels_24mm'] == 2): ?>
					<input type="checkbox" name="panels_24mm" value="1">Standard 24mm<br>
				<?php else :?>	
					<input type="checkbox" name="panels_24mm" value="1" checked>Standard 24mm<br>
				<?php endif; ?>

				<input type="hidden" name="panels_clip_in" value="2" >
				<?php if($_POST['panels_clip_in'] == 2): ?>
					<input type="checkbox" name="panels_clip_in" value="1">Clip In<br>
				<?php else :?>
					<input type="checkbox" name="panels_clip_in" value="1" checked>Clip In<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_screwed" value="2" >
				<?php if($_POST['panels_screwed'] == 2): ?>
					<input type="checkbox" name="panels_screwed" value="1">Screwed<br>
				<?php else :?>
					<input type="checkbox" name="panels_screwed" value="1" checked>Screwed<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_glued" value="2" >
				<?php if($_POST['panels_glued'] == 2): ?>
					<input type="checkbox" name="panels_glued" value="1">Glued<br>
				<?php else :?>
					<input type="checkbox" name="panels_glued" value="1" checked>Glued<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_adhesive" value="2" >
				<?php if($_POST['panels_adhesive'] == 2): ?>
					<input type="checkbox" name="panels_adhesive" value="1">Adhesive
				<?php else :?>
					<input type="checkbox" name="panels_adhesive" value="1" checked>Adhesive
				<?php endif; ?>

			</div>

			<div class="filter_form_title">Installation Place</div>
			<div id="filter_panels_installation" class="filter_form_content">
				
				<input type="hidden" name="panels_wall" value="2" >
				<?php if($_POST['panels_wall'] == 2): ?>
					<input type="checkbox" name="panels_wall" value="1">Wall<br>
				<?php else :?>
					<input type="checkbox" name="panels_wall" value="1" checked>Wall<br>
				<?php endif; ?>

				<input type="hidden" name="panels_ceiling" value="2" >
				<?php if($_POST['panels_ceiling'] == 2): ?>
					<input type="checkbox" name="panels_ceiling" value="1">Ceiling<br>
				<?php else :?>
					<input type="checkbox" name="panels_ceiling" value="1" checked>Ceiling<br>
				<?php endif; ?>

				<input type="hidden" name="panels_floor" value="2" >
				<?php if($_POST['panels_floor'] == 2): ?>
					<input type="checkbox" name="panels_floor" value="1">Floor<br>
				<?php else :?>
					<input type="checkbox" name="panels_floor" value="1" checked>Floor<br>
				<?php endif; ?>

				<input type="hidden" name="panels_corner" value="2" >
				<?php if($_POST['panels_corner'] == 2): ?>
					<input type="checkbox" name="panels_corner" value="1">Corner<br>
				<?php else :?>
					<input type="checkbox" name="panels_corner" value="1" checked>Corner<br>
				<?php endif; ?>

				<input type="hidden" name="panels_vas" value="2" >
				<?php if($_POST['panels_vas'] == 2): ?>
					<input type="checkbox" name="panels_vas" value="1">Vertical Acoustic System
				<?php else :?>
					<input type="checkbox" name="panels_vas" value="1" checked>Vertical Acoustic System
				<?php endif; ?>
			</div>

			<div class="filter_form_title">Edges</div>
			<div id="filter_panels_edges" class="filter_form_content">

				<input type="hidden" name="panels_leveled" value="2" >
				<?php if($_POST['panels_leveled'] == 2): ?>
					<input type="checkbox" name="panels_leveled" value="1">Leveled<br>
				<?php else :?>
					<input type="checkbox" name="panels_leveled" value="1" checked>Leveled<br>
				<?php endif; ?>

				<input type="hidden" name="panels_angled" value="2" >
				<?php if($_POST['panels_angled'] == 2): ?>
					<input type="checkbox" name="panels_angled" value="1">Angled		
				<?php else :?>
					<input type="checkbox" name="panels_angled" value="1" checked>Angled		
				<?php endif; ?>
			</div>

			<div class="filter_form_title">Material</div>
			<div id="filter_panels_material" class="filter_form_content">

				<input type="hidden" name="panels_wood" value="2" >
				<?php if($_POST['panels_wood'] == 2): ?>
					<input type="checkbox" name="panels_wood" value="1">Wood<br>
				<?php else :?>
					<input type="checkbox" name="panels_wood" value="1" checked>Wood<br>
				<?php endif; ?>

				<input type="hidden" name="panels_fabric" value="2" >
				<?php if($_POST['panels_fabric'] == 2): ?>
					<input type="checkbox" name="panels_fabric" value="1">Fabric<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric" value="1" checked>Fabric<br>
				<?php endif; ?>

				<input type="hidden" name="panels_metal" value="2" >
				<?php if($_POST['panels_metal'] == 2): ?>
					<input type="checkbox" name="panels_metal" value="1">Metal<br>
				<?php else :?>
					<input type="checkbox" name="panels_metal" value="1" checked>Metal<br>
				<?php endif; ?>

				<input type="hidden" name="panels_polystyrene" value="2" >
				<?php if($_POST['panels_polystyrene'] == 2): ?>
					<input type="checkbox" name="panels_polystyrene" value="1">Polystyrene<br>
				<?php else :?>
					<input type="checkbox" name="panels_polystyrene" value="1" checked>Polystyrene<br>
				<?php endif; ?>

				<input type="hidden" name="panels_foam" value="2" >
				<?php if($_POST['panels_foam'] == 2): ?>
					<input type="checkbox" name="panels_foam" value="1">Foam<br>
				<?php else :?>
					<input type="checkbox" name="panels_foam" value="1" checked>Foam<br>
				<?php endif; ?>				
			</div>

			<div class="filter_form_title">Wood Color</div>
			<div id="filter_panels_wood_color" class="filter_form_content">

				<input type="hidden" name="panels_wood_nordik" value="2" >
				<?php if($_POST['panels_wood_nordik'] == 2): ?>
					<input type="checkbox" name="panels_wood_nordik" value="1">Nordik<br>
				<?php else :?>
					<input type="checkbox" name="panels_wood_nordik" value="1" checked>Nordik<br>
				<?php endif; ?>

				<input type="hidden" name="panels_wood_light_brown" value="2" >
				<?php if($_POST['panels_wood_light_brown'] == 2): ?>
					<input type="checkbox" name="panels_wood_light_brown"  value="1">Light Brown<br>
				<?php else :?>
					<input type="checkbox" name="panels_wood_light_brown"  value="1" checked>Light Brown<br>
				<?php endif; ?>

				<input type="hidden" name="panels_wood_cherry" value="2" >
				<?php if($_POST['panels_wood_cherry'] == 2): ?>
					<input type="checkbox" name="panels_wood_cherry" value="1">Cherry<br>
				<?php else :?>
					<input type="checkbox" name="panels_wood_cherry" value="1" checked>Cherry<br>
				<?php endif; ?>

				<input type="hidden" name="panels_wood_black" value="2" >
				<?php if($_POST['panels_wood_black'] == 2): ?>
					<input type="checkbox" name="panels_wood_black" value="1">Black<br>
				<?php else :?>
					<input type="checkbox" name="panels_wood_black" value="1" checked>Black<br>
				<?php endif; ?>

				<input type="hidden" name="panels_wood_wenge" value="2" >
				<?php if($_POST['panels_wood_wenge'] == 2): ?>
					<input type="checkbox" name="panels_wood_wenge" value="1">Wenge<br>
				<?php else :?>
					<input type="checkbox" name="panels_wood_wenge" value="1" checked>Wenge<br>
				<?php endif; ?>

                <input type="hidden" name="panels_wood_m_cherry" value="2" >
                <?php if($_POST['panels_wood_m_cherry'] == 2): ?>
                  <input type="checkbox" name="panels_wood_m_cherry" value="1">Melamine Cherry<br>
                <?php else :?>
                  <input type="checkbox" name="panels_wood_m_cherry" value="1" checked>Melamine Cherry<br>
                <?php endif; ?>

                <input type="hidden" name="panels_wood_m_light_brown" value="2" >
                <?php if($_POST['panels_wood_m_light_brown'] == 2): ?>
                  <input type="checkbox" name="panels_wood_m_light_brown" value="1">Melamine Light Brown<br>
                <?php else :?>
                  <input type="checkbox" name="panels_wood_m_light_brown" value="1" checked>Melamine Light Brown<br>
                <?php endif; ?>

                <input type="hidden" name="panels_wood_m_nordik" value="2" >
                <?php if($_POST['panels_wood_m_nordik'] == 2): ?>
                  <input type="checkbox" name="panels_wood_m_nordik" value="1">Melamine Nordik<br>
                <?php else :?>
                  <input type="checkbox" name="panels_wood_m_nordik" value="1" checked>Melamine Nordik<br>
                <?php endif; ?>

                <input type="hidden" name="panels_wood_m_wenge" value="2" >
                <?php if($_POST['panels_wood_m_wenge'] == 2): ?>
                  <input type="checkbox" name="panels_wood_m_wenge" value="1">Melamine Wenge<br>
                <?php else :?>
                  <input type="checkbox" name="panels_wood_m_wenge" value="1" checked>Melamine Wenge<br>
                <?php endif; ?>

                <input type="hidden" name="panels_wood_m_ash_wood" value="2" >
                <?php if($_POST['panels_wood_m_ash_wood'] == 2): ?>
                  <input type="checkbox" name="panels_wood_m_ash_wood" value="1">Melamine Ash Wood<br>
                <?php else :?>
                  <input type="checkbox" name="panels_wood_m_ash_wood" value="1" checked>Melamine Ash Wood<br>
                <?php endif; ?>

                <input type="hidden" name="panels_wood_m_walnut" value="2" >
                <?php if($_POST['panels_wood_m_walnut'] == 2): ?>
                  <input type="checkbox" name="panels_wood_m_walnut" value="1">Melamine Walnut<br>
                <?php else :?>
                  <input type="checkbox" name="panels_wood_m_walnut" value="1" checked>Melamine Walnut<br>
                <?php endif; ?>
			</div>

			<div class="filter_form_title">Fabric Color</div>
			<div id="filter_panels_fabric_color" class="filter_form_content">

				<input type="hidden" name="panels_fabric_black" value="2" >
				<?php if($_POST['panels_fabric_black'] == 2): ?>
					<input type="checkbox" name="panels_fabric_black" value="1">Ref.04 - Black<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_black" value="1" checked>Ref.04 - Black<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_grey" value="2" >
				<?php if($_POST['panels_fabric_grey'] == 2): ?>
					<input type="checkbox" name="panels_fabric_grey" value="1">Ref.22 - Grey<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_grey" value="1" checked>Ref.22 - Grey<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_bordeaux" value="2" >
				<?php if($_POST['panels_fabric_bordeaux'] == 2): ?>
					<input type="checkbox" name="panels_fabric_bordeaux" value="1">Ref.29 - Bordeaux<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_bordeaux" value="1" checked>Ref.29 - Bordeaux<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_beige" value="2" >
				<?php if($_POST['panels_fabric_beige'] == 2): ?>
					<input type="checkbox" name="panels_fabric_beige" value="1">Ref.82 - Beige<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_beige" value="1" checked>Ref.82 - Beige<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_natural_white" value="2" >
				<?php if($_POST['panels_fabric_natural_white'] == 2): ?>
					<input type="checkbox" name="panels_fabric_natural_white" value="1">Ref.87 - Natural White<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_natural_white" value="1" checked>Ref.87 - Natural White<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_brown" value="2" >
				<?php if($_POST['panels_fabric_brown'] == 2): ?>
					<input type="checkbox" name="panels_fabric_brown" value="1">Ref.92 - Brown<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_brown" value="1" checked>Ref.92 - Brown<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_blue" value="2" >
				<?php if($_POST['panels_fabric_blue'] == 2): ?>
					<input type="checkbox" name="panels_fabric_blue" value="1">Ref.99 - Blue<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_blue" value="1" checked>Ref.99 - Blue<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_fabric_orange" value="2" >
				<?php if($_POST['panels_fabric_orange'] == 2): ?>
					<input type="checkbox" name="panels_fabric_orange" value="1">Ref.116 - Orange<br>
				<?php else :?>
					<input type="checkbox" name="panels_fabric_orange" value="1" checked>Ref.116 - Orange<br>
				<?php endif; ?>				
			</div>

			<!-- <div class="filter_form_title">Polystyrene Color</div>
			<div id="filter_panels_polystyrene_color" class="filter_form_content">

				<input type="hidden" name="panels_polystyrene_black" value="2" >
				<?php /*if($_POST['panels_polystyrene_black'] == 2): */?>
					<input type="checkbox" name="panels_polystyrene_black" value="1">Black<br>
				<?php /* else :*/?>
					<input type="checkbox" name="panels_polystyrene_black" value="1" checked>Black<br>
				<?php/* endif;*/ ?>	

				<input type="hidden" name="panels_polystyrene_white" value="2" >
				<?php /*if($_POST['panels_polystyrene_white'] == 2): */?>
					<input type="checkbox" name="panels_polystyrene_white" value="1">White<br>
				<?php /*else :*/?>
					<input type="checkbox" name="panels_polystyrene_white" value="1" checked>White<br>
				<?php /*endif;*/ ?>	

				<input type="hidden" name="panels_polystyrene_grey" value="2" >
				<?php /*if($_POST['panels_polystyrene_grey'] == 2): */?>
					<input type="checkbox" name="panels_polystyrene_grey" value="1">Grey<br>			
				<?php /*else :*/?>
					<input type="checkbox" name="panels_polystyrene_grey" value="1" checked>Grey<br>			
				<?php /* endif;*/ ?>
			</div> -->

			<div class="filter_form_title">Foam Type</div>
			<div id="filter_panels_foam_type" class="filter_form_content">

				<input type="hidden" name="panels_foam_m1" value="2" >
				<?php if($_POST['panels_foam_m1'] == 2): ?>
					<input type="checkbox" name="panels_foam_m1" value="1">M1<br>
				<?php else :?>
					<input type="checkbox" name="panels_foam_m1" value="1" checked>M1<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_foam_recycled" value="2" >
				<?php if($_POST['panels_foam_recycled'] == 2): ?>
					<input type="checkbox" name="panels_foam_recycled" value="1">Recycled<br>
				<?php else :?>
					<input type="checkbox" name="panels_foam_recycled" value="1" checked>Recycled<br>
				<?php endif; ?>	

				<input type="hidden" name="panels_foam_tech" value="2" >
				<?php if($_POST['panels_foam_tech'] == 2): ?>
					<input type="checkbox" name="panels_foam_tech" value="1">Tech<br>
				<?php else :?>
					<input type="checkbox" name="panels_foam_tech" value="1" checked>Tech<br>
				<?php endif; ?>

				<input type="hidden" name="panels_foam_quash" value="2" >
				<?php if($_POST['panels_foam_quash'] == 2): ?>
					<input type="checkbox" name="panels_foam_quash" value="1">Quash<br>
				<?php else :?>
					<input type="checkbox" name="panels_foam_quash" value="1" checked>Quash<br>
				<?php endif; ?>
			</div>

		    <input type="submit" value="Submit">
	    </div>
	</form>  


	<?php $category_button = $_POST['category_button']; ?>

<!--+++++++++++++++++++++++++++++++++DOORS ITEMS LIST+++++++++++++++++++++++++++++++-->
	<?php

	//-----------------------------------RW-----------------------------//
		if($_POST['doors_rw'] == ''):
			$doors_rw = '';
		else :
			$doors_rw = 'rw=' . $_POST['doors_rw'] . ' AND';	
		endif;


	//----------------------------NUMBER OF DOORS-----------------------//
		$doors_1door = $_POST['doors_1door'];
		$doors_2doors = $_POST['doors_2doors'];
		
		if($doors_1door == 1 && $doors_2doors == 1):
			$number_of_doors = '';		
		elseif($doors_1door == '' && $doors_2doors == ''):
			$number_of_doors = 'number_of_doors="o" AND';
		else:
			$number_of_doors = '(';

			if($doors_1door == 1):
				$number_of_doors .= 'number_of_doors=1 OR ';
			endif;
			if($doors_2doors == 1):
				$number_of_doors .= 'number_of_doors=2 OR ';
			endif;					
			
			$number_of_doors = substr($number_of_doors, 0, -4);
			$number_of_doors .= ') AND';
		endif;	

	//---------------------------------FINISH---------------------------//
		$doors_steel = $_POST['doors_steel'];
		$doors_wood = $_POST['doors_wood'];		

		if($doors_steel == 1 && $doors_wood == 1):
			$finish = '';		
		elseif($doors_steel == '' && $doors_wood == ''):
			$finish = 'finish="o" AND';
		else:
			$finish = '(';

			if($doors_steel == 1):
				$finish .= 'UPPER(finish)=UPPER("Grey Enamel Primer") OR ';
			endif;
			if($doors_wood == 1):
				$finish .= 'UPPER(finish)=UPPER("Wood") OR ';
			endif;					
			
			$finish = substr($finish, 0, -4);
			$finish .= ') AND';
		endif;	
		
	//---------------------------------QUERY----------------------------//
		if($doors_1door == '' && $doors_2doors == '' && $doors_rw == '' && $doors_steel == '' && $doors_wood == ''):
			$doors_rw = '';
			$number_of_doors = '';	
			$finish = '';
		endif;

		$db =& JFactory::getDBO();
	    $query = 'SELECT * FROM `#__doors` WHERE ' . $doors_rw . ' ' . $number_of_doors . ' ' . $finish . ' state=1';
		$db->setQuery( $query, 0 , $this->items );
	    $items = $db->loadObjectList();

	?>

    <div id="doors_filter_items_list" class="filter_items_list">
		<?php if(sizeof($items) == 0) : ?>
 			<div class="filter_empty_list">
 				No results were found. Try to add more attributes to your search.
 			</div>
 		<?php endif; ?>

        <?php foreach ($items as $item) : ?>
        	        		
        	<a class="filter_list_result" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/doors/door/' . (int)$item->id; ?>">
        		<div class="filter_list_result_photo filter_list_photo">
        			<?php if($item->photo_150px): ?>
						<img alt="<?php echo $item->name; ?>" src="<?php echo $item->photo_150px; ?>" width="100px" height="100px">
					<?php else :?>
						<img alt="<?php echo $item->name; ?>" src="images/not_available_small.png" width="100px" height="100px">
					<?php endif; ?>
				</div>
				<div class="filter_list_result_name"><?php echo $item->name; ?></div>
			</a>
			
		<?php endforeach; ?>
	</div>


<!--++++++++++++++++++++++++++++++++PANELS ITEMS LIST+++++++++++++++++++++++++++++++-->
	<?php

	//--------------------------------LENGTH----------------------------//		
		$panels_length = $_POST['panels_length'];
		if($panels_length == ''):
			$length = '';
		else :
			$length = 'length = ' . $panels_length . ' AND ';	
		endif;

	//--------------------------------WIDTH----------------------------//		
		$panels_width = $_POST['panels_width'];
		if($panels_width == ''):
			$width = '';
		else :
			$width = 'width = ' . $panels_width . ' AND ';	
		endif;

	//------------------------------THICKNESS--------------------------//	
		$panels_thickness = $_POST['panels_thickness'];	
		if($panels_thickness == ''):
			$thickness = '';
		else :
			$thickness = 'thickness = ' . $panels_thickness . ' AND ';	
		endif;

	//----------------------------FUNCTIONALITY-------------------------//
		$panels_absorption = $_POST['panels_absorption'];
		$panels_diffusion = $_POST['panels_diffusion'];
		$panels_basstrap = $_POST['panels_basstrap'];		

		if($panels_absorption == 1 && $panels_diffusion == 1 && $panels_basstrap == 1):
			$functionality = '';		
		elseif($panels_absorption == '' && $panels_diffusion == '' && $panels_basstrap == ''):
			$functionality = 'functionality="o" AND';	
		else:
			$functionality = '(';

			if($panels_absorption == 1):
				$functionality .= 'UPPER(functionality)=UPPER("absorption") OR ';
			endif;
			if($panels_diffusion == 1):
				$functionality .= 'UPPER(functionality)=UPPER("diffusion") OR ';
			endif;
			if($panels_basstrap == 1):
				$functionality .= 'UPPER(functionality)=UPPER("basstrap") OR ';
			endif;			
			
			$functionality = substr($functionality, 0, -4);
			$functionality .= ') AND';
		endif;	


	//------------------------ABSORPTION FREQUENCY----------------------//
		$panels_low = $_POST['panels_low'];
		$panels_medium = $_POST['panels_medium'];
		$panels_high = $_POST['panels_high'];
		$panels_full = $_POST['panels_full'];

		if($panels_low == 1 && $panels_medium == 1 && $panels_high == 1 && $panels_full == 1):
			$absorption_frequency = '';		
		elseif($panels_low == '' && $panels_medium == '' && $panels_high == '' && $panels_full == ''):
			$absorption_frequency = 'absorption_frequency="o" AND';
		else:
			$absorption_frequency = '(';

			if($panels_low == 1):
				$absorption_frequency .= 'UPPER(absorption_frequency) = UPPER("low") OR ';
			endif;
			if($panels_medium == 1):
				$absorption_frequency .= 'UPPER(absorption_frequency) = UPPER("medium") OR ';
			endif;
			if($panels_high == 1):
				$absorption_frequency .= 'UPPER(absorption_frequency) = UPPER("high") OR ';
			endif;
			if($panels_full == 1):
				$absorption_frequency .= 'UPPER(absorption_frequency) = UPPER("full") OR ';
			endif;
			
			$absorption_frequency = substr($absorption_frequency, 0, -4);
			$absorption_frequency .= ') AND';
		endif;	


	//--------------------------ABSORPTION CLASS------------------------//
		if($_POST['panels_absorption_class'] == ''):
			$absorption_class = '';
		else :
			$absorption_class = 'UPPER(absorption_class) = UPPER("' . $_POST['panels_absorption_class'] . '") AND ';	
		endif;


	//----------------------------INSTALLATION--------------------------//
		$panels_wall = $_POST['panels_wall'];
		$panels_ceiling = $_POST['panels_ceiling'];
		$panels_floor = $_POST['panels_floor'];
		$panels_corner = $_POST['panels_corner'];
		$panels_vas = $_POST['panels_vas'];

		if($panels_wall == 1 && $panels_ceiling == 1 && $panels_floor == 1 && $panels_corner == 1 && $panels_vas == 1):
			$installation = '';		
		elseif($panels_wall == '' && $panels_ceiling == '' && $panels_floor == '' && $panels_corner == '' && $panels_vas == ''):
			$installation = 'installation_wall="o" AND';	
		else:
			$installation = '(';

			if($panels_wall == 1):
				$installation .= 'installation_wall=1 OR ';
			endif;
			if($panels_ceiling == 1):
				$installation .= 'installation_ceiling=1 OR ';
			endif;
			if($panels_floor == 1):
				$installation .= 'installation_floor=1 OR ';
			endif;
			if($panels_corner == 1):
				$installation .= 'installation_corner=1 OR ';
			endif;
			if($panels_vas == 1):
				$installation .= 'installation_vas=1 OR ';
			endif;
			
			$installation = substr($installation, 0, -4);
			$installation .= ') AND';
		endif;	


	//-----------------------------FIXING TYPE--------------------------//
		$panels_15mm = $_POST['panels_15mm'];
		$panels_24mm = $_POST['panels_24mm'];
		$panels_clip_in = $_POST['panels_clip_in'];
		$panels_screwed = $_POST['panels_screwed'];
		$panels_glued = $_POST['panels_glued'];
		$panels_adhesive = $_POST['panels_adhesive'];

		if($panels_15mm == 1 && $panels_24mm == 1 && $panels_clip_in == 1 && $panels_screwed == 1 && $panels_glued == 1 && $panels_adhesive == 1):
			$fixing_type = '';		
		elseif($panels_15mm == '' && $panels_24mm == '' && $panels_clip_in == '' && $panels_screwed == '' && $panels_glued == '' && $panels_adhesive == ''):
			$fixing_type = 'fixing_type_standard15="o" AND';	
		else:
			$fixing_type = '(';

			if($panels_15mm == 1):
				$fixing_type .= 'fixing_type_standard15=1 OR ';
			endif;
			if($panels_24mm == 1):
				$fixing_type .= 'fixing_type_standard24=1 OR ';
			endif;
			if($panels_clip_in == 1):
				$fixing_type .= 'fixing_type_clipin=1 OR ';
			endif;
			if($panels_screwed == 1):
				$fixing_type .= 'fixing_type_screwed=1 OR ';
			endif;
			if($panels_glued == 1):
				$fixing_type .= 'fixing_type_glued=1 OR ';
			endif;
			if($panels_adhesive == 1):
				$fixing_type .= 'fixing_type_adhesive=1 OR ';
			endif;
			
			$fixing_type = substr($fixing_type, 0, -4);
			$fixing_type .= ') AND';
		endif;	


	//--------------------------------EDGES-----------------------------//
		$panels_leveled = $_POST['panels_leveled'];
		$panels_angled = $_POST['panels_angled'];		

		if($panels_leveled == 1 && $panels_angled == 1):
			$edges = '';		
		elseif($panels_leveled == '' && $panels_angled == ''):
			$edges = 'edge_leveled="o" AND';	
		else:
			$edges = '(';

			if($panels_leveled == 1):
				$edges .= 'edge_leveled=1 OR ';
			endif;
			if($panels_angled == 1):
				$edges .= 'edge_angled=1 OR ';
			endif;			
			
			$edges = substr($edges, 0, -4);
			$edges .= ') AND';
		endif;	


	//-------------------------------MATERIAL---------------------------//
		$panels_wood = $_POST['panels_wood'];
		$panels_fabric = $_POST['panels_fabric'];
		$panels_metal = $_POST['panels_metal'];
		$panels_foam = $_POST['panels_foam'];
		$panels_polystyrene = $_POST['panels_polystyrene'];

		if($panels_wood == 1 && $panels_fabric == 1 && $panels_metal == 1 && $panels_foam == 1 && $panels_polystyrene == 1):
			$material = '';		
		elseif($panels_wood == '' && $panels_fabric == '' && $panels_metal == '' && $panels_foam == '' && $panels_polystyrene == ''):
			$material = 'wood="o" AND';	
		else:
			$material = '(';

			if($panels_wood == 1):
				$material .= 'wood=1 OR ';
			endif;
			if($panels_fabric == 1):
				$material .= 'fabric=1 OR ';
			endif;
			if($panels_metal == 1):
				$material .= 'metal=1 OR ';
			endif;
			if($panels_foam == 1):
				$material .= 'foam=1 OR ';
			endif;
			if($panels_polystyrene == 1):
				$material .= 'polystyrene=1 OR ';
			endif;			
			
			$material = substr($material, 0, -4);
			$material .= ') AND';
		endif;	


	//-----------------------------WOOD COLOR---------------------------//
		$panels_wood_nordik = $_POST['panels_wood_nordik'];
		$panels_wood_light_brown = $_POST['panels_wood_light_brown'];
		$panels_wood_cherry = $_POST['panels_wood_cherry'];
		$panels_wood_black = $_POST['panels_wood_black'];
		$panels_wood_wenge = $_POST['panels_wood_wenge'];
        $panels_wood_m_cherry = $_POST['panels_wood_m_cherry'];
        $panels_wood_m_light_brown = $_POST['panels_wood_m_light_brown'];
        $panels_wood_m_nordik = $_POST['panels_wood_m_nordik'];
        $panels_wood_m_wenge = $_POST['panels_wood_m_wenge'];
        $panels_wood_m_ash_wood = $_POST['panels_wood_m_ash_wood'];
        $panels_wood_m_walnut = $_POST['panels_wood_m_walnut'];

		if($panels_wood == '' || ($panels_wood_nordik == 1 && $panels_wood_light_brown == 1 && $panels_wood_cherry == 1 && $panels_wood_black == 1 && $panels_wood_wenge == 1 &&
            $panels_wood_m_cherry == 1 && $panels_wood_m_light_brown == 1 && $panels_wood_m_nordik == 1 && $panels_wood_m_wenge == 1 && $panels_wood_m_ash_wood == 1 && $panels_wood_m_walnut == 1)):
			$wood_color = '';		
		elseif($panels_wood_nordik == '' && $panels_wood_light_brown == '' && $panels_wood_cherry == '' && $panels_wood_black == '' && $panels_wood_wenge == '' &&
            $panels_wood_m_cherry == '' && $panels_wood_m_light_brown == '' && $panels_wood_m_nordik == '' && $panels_wood_m_wenge == '' && $panels_wood_m_ash_wood == '' && $panels_wood_m_walnut == ''):
			$wood_color = 'wood_color="o" AND';	
		else:
			$wood_color = '(';

			if($panels_wood_nordik == 1):
				$wood_color .= 'wood_color="nordik" OR ';
			endif;
			if($panels_wood_light_brown == 1):
				$wood_color .= 'wood_color="light brown" OR ';
			endif;
			if($panels_wood_cherry == 1):
				$wood_color .= 'wood_color="cherry" OR ';
			endif;
			if($panels_wood_black == 1):
				$wood_color .= 'wood_color="black" OR ';
			endif;
			if($panels_wood_wenge == 1):
				$wood_color .= 'wood_color="wenge" OR ';
			endif;
            if($panels_wood_m_cherry == 1):
              $wood_color .= 'wood_color="melamine cherry" OR ';
            endif;
            if($panels_wood_m_light_brown == 1):
              $wood_color .= 'wood_color="melamine light brown" OR ';
            endif;
            if($panels_wood_m_nordik == 1):
              $wood_color .= 'wood_color="melamine nordik" OR ';
            endif;
            if($panels_wood_m_wenge == 1):
              $wood_color .= 'wood_color="melamine wenge" OR ';
            endif;
            if($panels_wood_m_ash_wood == 1):
              $wood_color .= 'wood_color="melamine ash wood" OR ';
            endif;
            if($panels_wood_m_walnut == 1):
              $wood_color .= 'wood_color="melamine walnut" OR ';
            endif;

            $wood_color = substr($wood_color, 0, -4);
			$wood_color .= ') AND';
		endif;

    echo $wood_color;

	//----------------------------FABRIC COLOR--------------------------//
		$panels_fabric_black = $_POST['panels_fabric_black'];
		$panels_fabric_grey = $_POST['panels_fabric_grey'];
		$panels_fabric_bordeaux = $_POST['panels_fabric_bordeaux'];
		$panels_fabric_beige = $_POST['panels_fabric_beige'];
		$panels_fabric_natural_white = $_POST['panels_fabric_natural_white'];
		$panels_fabric_brown = $_POST['panels_fabric_brown'];
		$panels_fabric_blue = $_POST['panels_fabric_blue'];
		$panels_fabric_orange = $_POST['panels_fabric_orange'];

		if($panels_fabric == '' || ($panels_fabric_black == 1 && $panels_fabric_grey == 1 && $panels_fabric_bordeaux == 1 && $panels_fabric_beige == 1 && $panels_fabric_natural_white == 1 
			&& $panels_fabric_brown == 1 && $panels_fabric_blue == 1 && $panels_fabric_orange == 1)):
			$fabric_color = '';		
		elseif($panels_fabric_black == '' && $panels_fabric_grey == '' && $panels_fabric_bordeaux == '' && $panels_fabric_beige == '' && $panels_fabric_natural_white == '' 
			&& $panels_fabric_brown == '' && $panels_fabric_blue == '' && $panels_fabric_orange == ''):
			$fabric_color = 'fabric_color="o" AND';	
		else:
			$fabric_color = '(';

			if($panels_fabric_black == 1):
				$fabric_color .= 'fabric_color="black" OR ';
			endif;
			if($panels_fabric_grey == 1):
				$fabric_color .= 'fabric_color="grey" OR ';
			endif;
			if($panels_fabric_bordeaux == 1):
				$fabric_color .= 'fabric_color="bordeaux" OR ';
			endif;
			if($panels_fabric_beige == 1):
				$fabric_color .= 'fabric_color="beige" OR ';
			endif;
			if($panels_fabric_natural_white == 1):
				$fabric_color .= 'fabric_color="natural_white" OR ';
			endif;
			if($panels_fabric_brown == 1):
				$fabric_color .= 'fabric_color="brown" OR ';
			endif;
			if($panels_fabric_blue == 1):
				$fabric_color .= 'fabric_color="blue" OR ';
			endif;
			if($panels_fabric_orange == 1):
				$fabric_color .= 'fabric_color="orange" OR ';
			endif;

			$fabric_color = substr($fabric_color, 0, -4);
			$fabric_color .= ') AND';
		endif;	


	//--------------------------POLYSTYRENE COLOR-----------------------//
		/*$panels_polystyrene_black = $_POST['panels_polystyrene_black'];
		$panels_polystyrene_white = $_POST['panels_polystyrene_white'];
		$panels_polystyrene_grey = $_POST['panels_polystyrene_grey'];		

		if($panels_polystyrene == '' || ($panels_polystyrene_black == 1 && $panels_polystyrene_white == 1 && $panels_polystyrene_grey == 1)):
			$polystyrene_color = '';		
		elseif($panels_polystyrene_black == '' && $panels_polystyrene_white == '' && $panels_polystyrene_grey == ''):
			$polystyrene_color = 'polystyrene_color="o" AND';	
		else:
			$polystyrene_color = '(';

			if($panels_polystyrene_black == 1):
				$polystyrene_color .= 'UPPER(polystyrene_color)=UPPER("black") OR ';
			endif;
			if($panels_polystyrene_white == 1):
				$polystyrene_color .= 'UPPER(polystyrene_color)=UPPER("white") OR ';
			endif;
			if($panels_polystyrene_grey == 1):
				$polystyrene_color .= 'UPPER(polystyrene_color)=UPPER("grey") OR ';
			endif;			
			
			$polystyrene_color = substr($polystyrene_color, 0, -4);
			$polystyrene_color .= ') AND';
		endif;	
*/

	//-----------------------------FOAM TYPE----------------------------//
		$panels_foam_m1 = $_POST['panels_foam_m1'];
		$panels_foam_recycled = $_POST['panels_foam_recycled'];
		$panels_foam_tech = $_POST['panels_foam_tech'];	
		$panels_foam_quash = $_POST['panels_foam_quash'];		

		if($panels_foam == '' || ($panels_foam_m1 == 1 && $panels_foam_recycled == 1 && $panels_foam_tech == 1 && $panels_foam_quash == 1)):
			$foam_type = '';		
		elseif($panels_foam_m1 == '' && $panels_foam_recycled == '' && $panels_foam_tech == '' && $panels_foam_quash == ''):
			$foam_type = 'foam_type="o" AND';	
		else:
			$foam_type = '(';

			if($panels_foam_m1 == 1):
				$foam_type .= 'foam_type="m1" OR ';
			endif;
			if($panels_foam_recycled == 1):
				$foam_type .= 'foam_type="recycled" OR ';
			endif;
			if($panels_foam_tech == 1):
				$foam_type .= 'foam_type="tech" OR ';
			endif;			
			if($panels_foam_quash == 1):
				$foam_type .= 'foam_type="quash" OR ';
			endif;		
			
			$foam_type = substr($foam_type, 0, -4);
			$foam_type .= ') AND';
		endif;


	//---------------------------------QUERY----------------------------//		

		if($panels_absorption == '' && $panels_diffusion == '' && $panels_basstrap == '' && 
			$panels_low == '' && $panels_medium == '' && $panels_high == '' && $panels_full == '' && 
			$panels_wall == '' && $panels_ceiling == '' && $panels_floor == '' && $panels_corner == '' && $panels_vas == '' && 
			$panels_15mm == '' && $panels_24mm == '' && $panels_clip_in == '' && $panels_screwed == '' && $panels_glued == '' && $panels_adhesive == '' && 
			$panels_leveled == '' && $panels_angled == '' && 
			$panels_wood == '' && $panels_fabric == '' && $panels_metal == '' && $panels_foam == '' && $panels_polystyrene == '' && 
			$panels_wood_nordik == '' && $panels_wood_light_brown == '' && $panels_wood_cherry == '' && $panels_wood_black == '' && $panels_wood_wenge == '' && 
			$panels_fabric_black == '' && $panels_fabric_grey == '' && $panels_fabric_bordeaux == '' && $panels_fabric_beige == '' && 
			$panels_fabric_natural_white == '' && $panels_fabric_brown == '' && $panels_fabric_blue == '' && $panels_fabric_orange == '' && 
			$panels_foam_m1 == '' && $panels_foam_recycled == '' && $panels_foam_tech == '' && $panels_foam_quash == ''):
			
			$functionality = '';
			$absorption_frequency = '';			
			$installation = '';
			$fixing_type = '';	
			$edges = '';
			$material = '';
			$wood_color = '';
			$fabric_color = '';	
			$foam_type = '';
		endif;

		
		$db =& JFactory::getDBO();
	    $query = 'SELECT * FROM `#__panels` WHERE ' . $length . ' ' . $width . ' ' . $thickness . ' ' . $functionality . ' ' . $absorption_frequency . ' ' . 
	    $absorption_class . ' ' .  $installation . ' ' . $fixing_type . ' ' . $edges . ' ' . $material . ' ' . $wood_color . ' ' . $fabric_color 
	    /*. ' ' . $polystyrene_color*/  . ' ' . $foam_type . ' ' . $market_area . ' AND state=1 ORDER BY name DESC';
		$db->setQuery( $query, 0 , $this->items );
	    $items = $db->loadObjectList();
	?>

    <div id="panels_filter_items_list" class="filter_items_list">
        <?php if(sizeof($items) == 0) : ?>
 			<div class="filter_empty_list">
 				No results were found. Try to add more attributes to your search.
 			</div>
 		<?php endif; ?>

        <?php foreach ($items as $item) : ?>
        	<a class="filter_list_result" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$item->id; ?>">        		
        		<div class="filter_list_panel_photo filter_list_photo">

    				<?php $photo_url = getimagesize('images/panels/photos_150px/'. $item->ref .'_150.png'); ?>

	        		<?php if($item->photo_150px): ?>
						<img alt="<?php echo $item->name; ?>" src="<?php echo $item->photo_150px; ?>" width="100px" height="100px">
					<?php elseif(!is_array($photo_url)): ?>
						<img alt="<?php echo $item->name; ?>" src="images/not_available_small.png" width="100px" height="100px">
					<?php else : ?>
    					<img alt="<?php echo $item->name; ?>" src="images/panels/photos_150px/<?php echo $item->ref; ?>_150.png" width="100px" height="100px">    		
					<?php endif; ?>
				</div>

				<div class="filter_list_result_name"><?php echo $item->name; ?></div>
			</a>
		<?php endforeach; ?>		
	</div>


<!--++++++++++++++++++++++++++++ANTIVIBRATICS ITEMS LIST++++++++++++++++++++++++++++-->
	<?php
	
	//------------------------INSTALLATION----------------------//
		$antivibratics_wall = $_POST['antivibratics_wall'];
		$antivibratics_ceiling = $_POST['antivibratics_ceiling'];
		$antivibratics_floor = $_POST['antivibratics_floor'];
		$antivibratics_division_wall = $_POST['antivibratics_division_wall'];

		if($antivibratics_wall == 1 && $antivibratics_ceiling == 1 && $antivibratics_floor == 1 && $antivibratics_division_wall == 1):
			$installation = '';		
		elseif($antivibratics_wall == '' && $antivibratics_ceiling == '' && $antivibratics_floor == '' && $antivibratics_division_wall == ''):
			$installation = 'installation_wall="o" AND';	
		else:
			$installation = '(';

			if($antivibratics_wall == 1):
				$installation .= 'installation_wall=1 OR ';
			endif;
			if($antivibratics_ceiling == 1):
				$installation .= 'installation_ceiling=1 OR ';
			endif;
			if($antivibratics_floor == 1):
				$installation .= 'installation_floor=1 OR ';
			endif;
			if($antivibratics_division_wall == 1):
				$installation .= 'installation_division_wall=1 OR ';
			endif;		

			$installation = substr($installation, 0, -4);
			$installation .= ') AND';
		endif;

	//-----------------------------LOAD WEIGHT-----------------------------//
		$antivibratics_load_weight = $_POST['antivibratics_load_weight'];

		if($antivibratics_load_weight == ''):
			$load_weight = '';
		else :
			$load_weight = 'load_weight_max = ' . $antivibratics_load_weight . ' AND ';	
		endif;
	
	//----------------------------MOUNTING WIDTH----------------------------//
		$antivibratics_mounting_width = $_POST['antivibratics_mounting_width'];

		if($_POST['antivibratics_mounting_width'] == ''):
			$mounting_width = '';
		else :
			$mounting_width = 'mounting_width = "' . $antivibratics_mounting_width . '" AND ';	
		endif;

		//---------------------------------QUERY----------------------------//
		if($antivibratics_wall == '' && $antivibratics_ceiling == '' && $antivibratics_floor == '' && $antivibratics_division_wall == ''
		 && $antivibratics_load_weight == '' && $antivibratics_mounting_width == ''):
			$installation = '';
			$load_weight = '';	
			$mounting_width = '';
		endif;

		$db =& JFactory::getDBO();
	    $query = 'SELECT * FROM `#__antivibratics` WHERE ' . $installation . ' ' . $load_weight . ' ' . $mounting_width . ' state=1';
		$db->setQuery( $query, 0 , $this->items );
	    $items = $db->loadObjectList();
	?>

    <div id="antivibratics_filter_items_list" class="filter_items_list">
        <?php if(sizeof($items) == 0) : ?>
 			<div class="filter_empty_list">
 				No results were found. Try to add more attributes to your search.
 			</div>
 		<?php endif; ?>

        <?php foreach ($items as $item) : ?>
        	<a class="filter_list_result" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->id; ?>">
        		<div class="filter_list_result_photo filter_list_photo">
	        		<?php if($item->photo_150px): ?>
						<img alt="<?php echo $item->name; ?>" src="<?php echo $item->photo_150px; ?>" width="100px" height="100px">
					<?php else :?>
						<img alt="<?php echo $item->name; ?>" src="images/not_available_small.png" width="100px" height="100px">
					<?php endif; ?>
				</div>
				<div class="filter_list_result_name"><?php echo $item->name; ?></div>				
			</a>
		<?php endforeach; ?>
	</div>


<!--+++++++++++++++++++++++++++++++BLANKETS ITEMS LIST++++++++++++++++++++++++++++++-->
	<?php

		if($_POST['blankets_rw'] == ''):
			$blankets_rw = '';
		else :
			$blankets_rw = 'rw=' . $_POST['blankets_rw'] . ' AND ';	
		endif;		

		$db =& JFactory::getDBO();
	    $query = 'SELECT * FROM `#__blankets` WHERE ' . $blankets_rw . ' state=1';
		$db->setQuery( $query, 0 , $this->items );
	    $items = $db->loadObjectList();
	?>

    <div id="blankets_filter_items_list" class="filter_items_list">
 		<?php if(sizeof($items) == 0) : ?>
 			<div class="filter_empty_list">
 				No results were found. Try to add more attributes to your search.
 			</div>
 		<?php endif; ?>

        <?php foreach ($items as $item) : ?>
        	<a class="filter_list_result" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->id; ?>">

        		<div class="filter_list_blanket_photo filter_list_photo">
	        		<?php if($item->photo_150px): ?>
						<img alt="<?php echo $item->name; ?>" src="<?php echo $item->photo_150px; ?>" width="100px" height="100px">
					<?php else :?>
						<img alt="<?php echo $item->name; ?>" src="images/not_available_small.png" width="100px" height="100px">
					<?php endif; ?>
				</div>
				<div class="filter_list_result_name"><?php echo $item->name; ?></div>
			</a>
		<?php endforeach; ?>		
	</div>
</div>

<div id="filter_hidden_field"><?php echo $_POST['category_button']; ?></div>