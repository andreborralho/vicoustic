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
?>

<h1 class="page_title">Acoustic Simulator: B&C</h1>

<form action="<?php echo JRoute::_('index.php?option=com_acoustic_solutions'); ?>" method="get" name="acoustic_simulator_filter" id="acoustic_simulator_filter"> 

    <?php 

        $db = JFactory::getDBO();
        $query = 'SELECT * FROM `#__acoustic_solution_rooms` WHERE state=1 AND building_construction=1';
        $db->setQuery( $query, 0 , $this->rooms_list);
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

    $chosen_area = $_GET['acoustic_simulator_area'];

    foreach ($this->items as $item) :
        if($item->room_id == $_GET['acoustic_simulator_rooms']):
            if($item->panel1_id): 
                $room_area = $chosen_area * ($item->panel1_percentage * 0.01);
                $panel_area = ($item->panel1_length * 0.001) * ($item->panel1_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel1_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel1_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel1_id; ?>">
                                <?php echo $item->panel1_family; ?>
                            </a>
                        </div>

                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">                    
                        <?php if($panel_photo != ""): ?>
                            <img alt="" src="<?php echo $panel_photo; ?>" width="100px" height="100px">
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel1_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel2_id):
                $room_area = $chosen_area * ($item->panel2_percentage * 0.01);
                $panel_area = ($item->panel2_length * 0.001) * ($item->panel2_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel2_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel2_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel2_id; ?>">
                                <?php echo $item->panel2_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel2_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel2_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel3_id):
                $room_area = $chosen_area * ($item->panel3_percentage * 0.01);
                $panel_area = ($item->panel3_length * 0.001) * ($item->panel3_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel3_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel3_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel3_id; ?>">
                                <?php echo $item->panel3_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel3_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel4_id):
                $room_area = $chosen_area * ($item->panel4_percentage * 0.01);
                $panel_area = ($item->panel4_length * 0.001) * ($item->panel4_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel4_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel4_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel4_id; ?>">
                                <?php echo $item->panel4_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel4_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel5_id):
                $room_area = $chosen_area * ($item->panel5_percentage * 0.01);
                $panel_area = ($item->panel5_length * 0.001) * ($item->panel5_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel5_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel5_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel5_id; ?>">
                                <?php echo $item->panel5_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel5_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel6_id):
                $room_area = $chosen_area * ($item->panel6_percentage * 0.01);
                $panel_area = ($item->panel6_length * 0.001) * ($item->panel6_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel6_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel6_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel6_id; ?>">
                                <?php echo $item->panel6_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel6_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel7_id):
                $room_area = $chosen_area * ($item->panel7_percentage * 0.01);
                $panel_area = ($item->panel7_length * 0.001) * ($item->panel7_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel7_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel7_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel7_id; ?>">
                                <?php echo $item->panel7_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel7_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel8_id):
                $room_area = $chosen_area * ($item->panel8_percentage * 0.01);
                $panel_area = ($item->panel8_length * 0.001) * ($item->panel8_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel8_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel8_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel8_id; ?>">
                                <?php echo $item->panel8_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel8_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel9_id): 
                $room_area = $chosen_area * ($item->panel9_percentage * 0.01);
                $panel_area = ($item->panel9_length * 0.001) * ($item->panel9_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel9_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel9_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel9_id; ?>">
                                <?php echo $item->panel9_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel9_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel10_id):
                $room_area = $chosen_area * ($item->panel10_percentage * 0.01);
                $panel_area = ($item->panel10_length * 0.001) * ($item->panel10_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel10_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel10_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel10_id; ?>">
                                <?php echo $item->panel10_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel10_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel11_id):
                $room_area = $chosen_area * ($item->panel11_percentage * 0.01);
                $panel_area = ($item->panel11_length * 0.001) * ($item->panel11_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel11_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel11_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel11_id; ?>">
                                <?php echo $item->panel11_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel11_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;

            if($item->panel12_id):
                $room_area = $chosen_area * ($item->panel12_percentage * 0.01);
                $panel_area = ($item->panel12_length * 0.001) * ($item->panel12_width * 0.001);
                $panel_boxes = ceil(($room_area / $panel_area) / $item->panel12_units_per_box);
                $url=getimagesize('images/panels/photos_150px/'. $item->panel12_ref .'_150.png'); ?>

                <div class="acoustic_simulator_entry">
                    <div class="acoustic_simulator_bc_panel_text">
                        <div class="acoustic_simulator_bc_panel_name">
                            <a style="cursor: pointer;" href="<?php echo 'building-construction/products/acoustic-treatment/panel/' . (int)$item->panel12_id; ?>">
                                <?php echo $item->panel12_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_bc_panel_boxes">
                            <?php echo $panel_boxes . " boxes"; ?>
                        </div>
                    </div>
                    <div class="acoustic_simulator_bc_panel_photo">
                        <?php if($panel_photo != ""): ?>
                            <?php echo $panel_photo; ?>
                        <?php elseif(!is_array($url)): ?>
                            <img alt="" src="images/not_available_small.png" width="100px" height="100px">
                        <?php else: ?>
                            <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel12_ref; ?>_150.png" width="100px" height="100px">
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;
        endif;
    endforeach; 
endif; ?>