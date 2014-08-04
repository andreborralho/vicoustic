<?php
/**
 * @version     1.0.0
 * @package     com_acoustic_simulator_component
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

$url = JURI::current();
$tokens = explode('/', $url);
?>

<h1 class="page_title">Acoustic Simulator</h1>

<form action="<?php echo JRoute::_('index.php?option=com_acoustic_solutions'); ?>" method="get" name="acoustic_simulator_filter" id="acoustic_simulator_filter"> 

    <?php 

        $db =& JFactory::getDBO();
        $rooms_query = 'SELECT * FROM `#__acoustic_solution_rooms` WHERE state=1 AND (music_broadcast=1 OR hifi_home_cinema=1)';
        $db->setQuery( $rooms_query, 0 , $rooms_list);
        $rooms_list = $db->loadObjectList();
      
    ?>


    <div id="acoustic_simulator_form">
        
        <div class="acoustic_simulator_form_field">
            <div class="acoustic_simulator_form_title">
                Pick a type of room
            </div>

            <div class="acoustic_simulator_form_content">
                <select name="acoustic_simulator_rooms">
                    <option value="">Please select</option>

                    <?php foreach ($rooms_list as $room): ?>
                        <?php if($room->id): ?>
                            <?php if($_GET['acoustic_simulator_rooms'] == $room->id): ?>
                                <option value="<?php echo $room->id; ?>" selected><?php echo $room->name; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $room->id; ?>"><?php echo $room->name; ?></option>
                            <?php endif; ?>
                        <?php endif; ?> 

                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="acoustic_simulator_form_field">
            <div class="acoustic_simulator_form_title">
                Write the desired area
            </div>

            <div id="acoustic_simulator_area_input" class="acoustic_simulator_form_content">
                Area: 
                <?php if($_GET['acoustic_simulator_area'] > 0): ?>
                    <input type="text" name="acoustic_simulator_area" value="<?php echo $_GET['acoustic_simulator_area']; ?>"> m<sup>2</sup>
                <?php else: ?>
                    <input type="text" name="acoustic_simulator_area"> m<sup>2</sup>
                <?php endif; ?>
            </div>
        </div>
    
        <input type="submit" id="acoustic_simulator_button" value="Submit">

    </div>  
</form>


<?php if(isset($_GET['acoustic_simulator_rooms'])):
    
    $results_counter = 0;
    $area_posted = $_GET['acoustic_simulator_area'];
    $lines_array = array();
    $close_div = false;
    $first_solution = true;

    foreach ($this->items as $item) :
        if($item->room_id == $_GET['acoustic_simulator_rooms'] && $item->area_min <= $area_posted && $item->area_max >= $area_posted):
            
            $results_counter = $results_counter+1;

            if(!in_array($item->line_name, $lines_array)):
                array_push($lines_array, $item->line_name);

                if($close_div): ?>
                    </div>
                <?php endif; ?>

                <div class="acoustic_simulator_line">
                    <div class="acoustic_simulator_line_name"><?php echo $item->line_name; ?></div>

                <?php $close_div = true;
            endif;
            ?>
            
            <?php if($first_solution && $item->line_name=="Premium Line"): ?>
                <a id="acoustic_simulator_solution_<?php echo $item->id; ?>" class="acoustic_simulator_solution current first" 
                    style="cursor: pointer;" href="<?php echo $tokens[3] . '/tools/acoustic-simulator/acoustic_mb/' . (int)$item->id; ?>">
                        <img class="acoustic_simulator_solution_icon" alt="" src="<?php echo $item->icon; ?>" width="250px" height="200px">

            <?php else: ?>
                <a id="acoustic_simulator_solution_<?php echo $item->id; ?>" class="acoustic_simulator_solution"
                    style="cursor: pointer;" href="<?php echo $tokens[3] . '/tools/acoustic-simulator/acoustic_mb/' . (int)$item->id; ?>">  
                        <img class="acoustic_simulator_solution_icon" alt="" src="<?php echo $item->icon; ?>" width="85px" height="80px">
            <?php endif; ?> 


                    <div class="acoustic_simulator_solution_name">
                        <?php echo $item->name; ?>
                    </div>
                
                <?php if($first_solution && $item->line_name=="Premium Line"): ?>
                    <img class="acoustic_simulator_solution_first_render" alt="" src="<?php echo $item->image2; ?>" width="390px" height="240px">                    
                <?php endif; ?>

                    <div class="acoustic_simulator_solution_msrp">
                        <?php
                            $total_msrp = ($item->panel1_box_msrp * $item->panel1_boxes) + ($item->panel2_box_msrp * $item->panel2_boxes) + 
                            ($item->panel3_box_msrp * $item->panel3_boxes) + ($item->panel4_box_msrp * $item->panel4_boxes);
                            
                            echo "MSRP: " . $total_msrp . " €"; 
                        ?>
                    </div>

                <?php $first_solution = false; ?>
                </a>
            
        <?php endif; ?>
    <?php endforeach;

    if($close_div): ?>
        </div>
    <?php endif;

    if($results_counter == 0): ?>
        Dear customer, we don't have a standard solution for the dimensions you asked for. <br>
		Please fill our online form for a customised acoustic project:<br><br>
		<a href="<?php echo $tokens[3] . '/tools/online-project-request' ?>">Online Project Request</a>
    <?php endif;
    
endif; ?>