<?php
/**
 * @version     1.0.0
 * @package     com_acoustic_solutions
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/galleria-1.2.9.min.js');
$document->addScript('scripts/components.js');

$url = JURI::current();
$tokens = explode('/', $url);

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_acoustic_solutions', JPATH_ADMINISTRATOR);

?>
<?php if( $this->item ) : ?>

    <div id="acoustic_simulator_result_solution_<?php echo $this->item->id; ?>" class="acoustic_simulator_result_solution">
                
        <div class="acoustic_simulator_panel_solution_name">
            <?php echo $this->item->name; ?>
        </div>

        <img class="acoustic_simulator_panel_solution_icon" alt="" src="<?php echo $this->item->icon; ?>" width="200px" height="200px">

        <div id="acoustic_simulator_solution_gallery" class="acoustic_simulator_solution_gallery">
            <?php if($this->item->image2): ?>
                <img class="acoustic_simulator_solution_render" alt="" src="<?php echo $this->item->image2; ?>" width="416px" height="273px">
            <?php endif; ?>
            <?php if($this->item->image1): ?>    
                <img class="acoustic_simulator_solution_render" alt="" src="<?php echo $this->item->image1; ?>" width="416px" height="273px">
            <?php endif; ?>
            <?php if($this->item->image3): ?>
                <img class="acoustic_simulator_solution_render" alt="" src="<?php echo $this->item->image3; ?>" width="416px" height="273px">
            <?php endif; ?>
        </div>

        <div id="acoustic_simulator_panel<?php echo $this->item->id; ?>" class="acoustic_simulator_panels"> 
            
            <?php                

            foreach ($this->items as $i=>$item) :
                if($item->panel1_id && $item->id == $this->item->id):
            
                    $photo1_url=getimagesize('images/panels/photos_150px/'. $item->panel1_ref .'_150.png'); ?>

                    <div class="acoustic_simulator_panel_entry">
                        
                        <div class="acoustic_simulator_mb_panel_photo">
                            <?php if($item->panel1_photo != ""): ?>
                                <img alt="" src="<?php echo $item->panel1_photo; ?>" width="25px" height="25px">
                            <?php elseif(!is_array($photo1_url)): ?>
                                <img alt="" src="images/not_available_small.png" width="25px" height="25px">
                            <?php else: ?>
                                <img alt="<?php echo $item->panel1_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel1_ref; ?>_150.png" width="25px" height="25px">
                            <?php endif;?>
                        </div>

                        <div class="acoustic_simulator_panel_name">
                            <a style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$item->panel1_id; ?>">
                                <?php echo $item->panel1_family; ?>
                            </a>
                        </div>

                        <div class="acoustic_simulator_panel_msrp">
                            <?php echo "MSRP: " . $item->panel1_box_msrp . " €*"; ?>
                        </div>
                        <div class="acoustic_simulator_panel_boxes">
                            <?php 
                            if($item->panel1_boxes == 1):
                                echo $item->panel1_boxes . " box";
                            else :
                                echo $item->panel1_boxes . " boxes";
                            endif; 
                            ?>
                        </div>
                        
                    </div>
                <?php endif;

                if($item->panel2_id && $item->id == $this->item->id): 

                    $photo2_url=getimagesize('images/panels/photos_150px/'. $item->panel2_ref .'_150.png'); ?>
                    
                    <div class="acoustic_simulator_panel_entry">
                        <div class="acoustic_simulator_mb_panel_photo">
                            <?php if($item->panel2_photo != ""): ?>
                                <img alt="" src="<?php echo $item->panel2_photo; ?>" width="25px" height="25px">
                            <?php elseif(!is_array($photo2_url)): ?>
                                <img alt="" src="images/not_available_small.png" width="25px" height="25px">
                            <?php else: ?>
                                <img alt="<?php echo $item->panel2_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel2_ref; ?>_150.png" width="25px" height="25px">
                            <?php endif;?>
                        </div>

                        <div class="acoustic_simulator_panel_name">
                            <a style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$item->panel2_id; ?>">                                            
                                <?php echo $item->panel2_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_panel_msrp">
                            <?php echo "MSRP: " . $item->panel2_box_msrp . " €*"; ?>
                        </div>
                        <div class="acoustic_simulator_panel_boxes">
                            <?php 
                            if($item->panel2_boxes == 1):
                                echo $item->panel2_boxes . " box";
                            else :
                                echo $item->panel2_boxes . " boxes";
                            endif; 
                            ?>
                        </div>
                        
                    </div>
                <?php endif;

                if($item->panel3_id && $item->id == $this->item->id):

                    $photo3_url=getimagesize('images/panels/photos_150px/'. $item->panel3_ref .'_150.png'); ?>
                   
                    <div class="acoustic_simulator_panel_entry">
                        <div class="acoustic_simulator_mb_panel_photo">
                            <?php if($item->panel3_photo != ""): ?>
                                <img alt="" src="<?php echo $item->panel3_photo; ?>" width="25px" height="25px">
                            <?php elseif(!is_array($photo3_url)): ?>
                                <img alt="" src="images/not_available_small.png" width="25px" height="25px">
                            <?php else: ?>
                                <img alt="<?php echo $item->panel3_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel3_ref; ?>_150.png" width="25px" height="25px">
                            <?php endif;?>
                        </div>

                        <div class="acoustic_simulator_panel_name">                                        
                            <a style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$item->panel3_id; ?>">
                                <?php echo $item->panel3_family; ?>
                            </a>
                        </div>                        
                        
                        <div class="acoustic_simulator_panel_msrp">
                            <?php echo "MSRP: " . $item->panel3_box_msrp . " €*"; ?>
                        </div>
                        <div class="acoustic_simulator_panel_boxes">
                            <?php 
                            if($item->panel3_boxes == 1):
                                echo $item->panel3_boxes . " box";
                            else :
                                echo $item->panel3_boxes . " boxes";
                            endif; 
                            ?>
                        </div>
                    </div>
                <?php endif;

                if($item->panel4_id && $item->id == $this->item->id):

                    $photo4_url=getimagesize('images/panels/photos_150px/'. $item->panel4_ref .'_150.png'); ?>

                    <div class="acoustic_simulator_panel_entry">
                        <div class="acoustic_simulator_mb_panel_photo">
                            <?php if($item->panel4_photo != ""): ?>
                                <img alt="" src="<?php echo $item->panel4_photo; ?>" width="25px" height="25px">
                            <?php elseif(!is_array($photo4_url)): ?>
                                <img alt="" src="images/not_available_small.png" width="25px" height="25px">
                            <?php else: ?>
                                <img alt="<?php echo $item->panel4_family; ?>" src="images/panels/photos_150px/<?php echo $item->panel4_ref; ?>_150.png" width="25px" height="25px">
                            <?php endif;?>
                        </div>

                        <div class="acoustic_simulator_panel_name">
                            <a style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$item->panel4_id; ?>">                                            
                                <?php echo $item->panel4_family; ?>
                            </a>
                        </div>
                        
                        <div class="acoustic_simulator_panel_msrp">
                            <?php echo "MSRP: " . $item->panel4_box_msrp . " €*"; ?>
                        </div>
                        <div class="acoustic_simulator_panel_boxes">
                            <?php 
                            if($item->panel4_boxes == 1):
                                echo $item->panel4_boxes . " box";
                            else :
                                echo $item->panel4_boxes . " boxes";
                            endif;
                            ?>
                        </div>
                        
                    </div>
                <?php endif; 
            endforeach; ?>

        </div>                    

        <div class="acoustic_simulator_solution_description">
            *Total for this solution (Shipping not included, prices may vary depending on the country).
        </div>

        <div class="acoustic_simulator_solution_description">
            <?php echo $this->item->description; ?>
        </div>

        <?php 
            $current_panel_id1 = 0;
            foreach ($this->items as $i=>$item) :
                if ($item->line_name == "Premium Line" && $item->id == $this->item->id): 
                    
                    $db =& JFactory::getDBO();

                    $query = 'SELECT a.* , panels1.id AS panel1_id, panels1.name AS panel1_name, panels2.id AS panel2_id, panels2.name AS panel2_name
                                FROM `#__acoustic_solutions_options` AS a 
                                LEFT JOIN `#__panels` AS panels1 ON a.panel_id1 = panels1.id 
                                LEFT JOIN `#__panels` AS panels2 ON a.panel_id2 = panels2.id 
                                WHERE a.state=1 AND a.solution_id='.$this->item->id;

                    $db->setQuery( $query, 0 , $this->options_list);
                    $options_list = $db->loadObjectList();
        ?>

            <div class="acoustic_simulator_other_options">
                <?php foreach ($options_list as $option) : ?>                                                                    
                    
                    <?php if($option->panel_id2 == 0) : ?>
                        <div class="acoustic_simulator_other_options_image">
                            <a href="<?php echo $option->image; ?>" class="acoustic_simulator_other_options_preview">
                                <img class="acoustic_simulator_other_options_thumbnail" alt="" src="<?php echo $option->icon; ?>" width="180px" height="109px"> 
                            </a>
                        

                        <?php if($option->panel_id1) : 
                            $panel_name_tokens = explode('Ref.', $option->panel1_name);                                            
                        ?>

                            <a id="acoustic_simulator_option<?php echo $option->id; ?>" class="acoustic_simulator_option_panel2" style="cursor: pointer;" 
                                href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$option->panel1_id; ?>">
                                <?php echo $panel_name_tokens[0]; ?>
                                <br>
                                <div class="acoustic_simulator_other_options_ref"><?php echo "Ref." . $panel_name_tokens[1]; ?></div>
                            </a>
                        
                        <?php endif; ?>
                    </div>

                    <?php elseif($option->panel_id1 && $option->panel_id1 != $current_panel_id1) : ?>

                        <a id="acoustic_simulator_option<?php echo $option->id; ?>" class="acoustic_simulator_option_panel1" style="cursor: pointer;" 
                            href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$option->panel1_id; ?>">
                            <?php echo $option->panel1_name; ?>
                        </a>
                        <?php $current_panel_id1 = $option->panel_id1;
                   

                    elseif($option->panel_id2 != 0) : ?>
                        <div class="acoustic_simulator_other_options_image">
                            <a href="<?php echo $option->image; ?>" class="acoustic_simulator_other_options_preview">
                                <img class="acoustic_simulator_other_options_thumbnail" alt="" src="<?php echo $option->icon; ?>" width="180px" height="109px"> 
                            </a>

                            <?php if($option->panel_id2) : 

                                $panel_name_tokens = explode('Ref.', $option->panel2_name);                                            
                            ?>

                                <a id="acoustic_simulator_option<?php echo $option->id; ?>" class="acoustic_simulator_option_panel2" style="cursor: pointer;" 
                                    href="<?php echo $tokens[3] . '/products/acoustic-treatment/panel/' . (int)$option->panel2_id; ?>">
                                    <?php echo $panel_name_tokens[0]; ?>
                                    <br>
                                    <div class="acoustic_simulator_other_options_ref"><?php echo "Ref." . $panel_name_tokens[1]; ?></div>
                                </a>
                            <?php endif; ?>
                        </div>
            
                <?php endif; endforeach; ?>
            </div>
        <?php endif; endforeach;?>

    </div>   
    
<?php else: ?>
    Could not load the item
<?php endif; ?>
