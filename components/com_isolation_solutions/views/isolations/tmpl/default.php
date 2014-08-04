<?php
/**
 * @version     1.0.0
 * @package     com_isolation_solutions
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

$geral_url = JURI::current();
$geral_tokens = explode('/', $geral_url);
?>

<h1 class="page_title">Isolation Simulator</h1>


<div class="items">
    <ul class="items_list iso_items_list">
        <?php $show = false; ?>
        
        <?php 
            $categories = array();

            foreach ($this->items as $item) :
                $categories[$item->category_id] = $item->category_name;
            endforeach;
        ?>

        <div id="iso_categories_checkboxes">

            <?php foreach ($categories as $category) :?>
                <div id="iso_category_<?php echo $category; ?>" class="iso_category_button iso_simulator_button_checked">
                    <?php echo $category; ?>                    
                </div>
            <?php endforeach; ?>  

            <?php     
                $db =& JFactory::getDBO();
                $query = "SELECT * FROM #__isolation_solution_currencies";
                $db->setQuery( $query, 0 , $currency_items );
                $currency_items = $db->loadObjectList();                
            ?>

            <ul id="iso_currency_list">
                <select id="currency_list_form" name="currency_list_form">
                    <option value="1" data-symbol="€">Euro</option>
                    
                    <?php foreach ($currency_items as $currency_item): ?>
                        <option value="<?php echo $currency_item->exchange_rate; ?>" data-symbol="<?php echo $currency_item->symbol; ?>">
                            <?php echo $currency_item->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </ul>

            <?php
                $db =& JFactory::getDBO();
                $query = "SELECT * FROM #__isolation_solution_units";
                $db->setQuery( $query, 0 , $unit_items );
                $unit_items = $db->loadObjectList();                
            ?>

            <ul id="iso_unit_list">
                <select id="unit_list_form" name="unit_list_form">
                    <option value="1" data-symbol="m">Meters</option>
                    
                    <?php foreach ($unit_items as $unit_item): ?>
                        <option value="<?php echo $unit_item->exchange_rate; ?>" data-symbol="<?php echo $unit_item->symbol; ?>">
                            <?php echo $unit_item->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select> 
            </ul>
        </div>
                
        
        <?php foreach ($this->items as $item) :?>
                
    		<?php
    			if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_isolation_solutions'))):
    				$show = true;
			?>
                <div class="iso_simulator_list_entry category_<?php echo $item->category_name; ?>">                    

                    <div class="iso_simulator_entry1">
                        <img alt="" src="<?php echo $item->solution_image; ?>" width="225px" height="250px">
                    </div>

                    <div class="iso_simulator_entry2">
                        <div class="iso_simulator_name">
                            <?php echo $item->name; ?>
                            <?php if($item->ref) :?>
                                <br>Ref: <?php echo $item->ref; ?>
                            <?php endif; ?>
                        </div>

                        <div class="iso_simulator_values">RW: <?php echo $item->rw; ?> dB &nbsp; STC: <?php echo $item->stc; ?> dB</div>

                        <img alt="Solution Graph" src="<?php echo $item->graph; ?>" width="300px" height="200px">
                    </div>

                    <div class="iso_simulator_entry3">
                        <div class="iso_simulator_price">
                            Average Price: 
                            <span class="iso_price" data-price="<?php echo $item->price; ?>"><?php echo $item->price; ?></span> 
                            <span class="iso_currency_symbol">€</span>/<span class="iso_unit_symbol">m</span><span style="vertical-align:super; font-size:0.7em">2</span>
                        </div>

                        <div class="iso_simulator_links">
                            <div class="iso_simulator_main_file">
                                <?php if($item->solution_data_sheet) :?>
                                    <a href="<?php echo $item->solution_data_sheet; ?>">Solution Technical Data Sheet</a>
                                <?php endif;?>
                            </div>

                            <div class="iso_simulator_products">
                                <div class="iso_simulator_links_label">Products used in this solution: </div>
                               
                                <?php if($item->antivibratic1_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic1_id; ?>">1 - <?php echo $item->antivibratic1_name; ?></a><br>
                                <?php elseif($item->blanket1_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket1_id; ?>">1 - <?php echo $item->blanket1_name; ?></a><br>
                                <?php endif; ?>

                                <?php if($item->antivibratic2_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic2_id; ?>">2 - <?php echo $item->antivibratic2_name; ?></a><br>
                                <?php elseif($item->blanket2_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket2_id; ?>">2 - <?php echo $item->blanket2_name; ?></a><br>
                                <?php endif; ?>

                                <?php if($item->antivibratic3_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic3_id; ?>">3 - <?php echo $item->antivibratic3_name; ?></a><br>
                                <?php elseif($item->blanket3_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket3_id; ?>">3 - <?php echo $item->blanket3_name; ?></a><br>
                                <?php endif; ?>

                                <?php if($item->antivibratic4_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic4_id; ?>">4 - <?php echo $item->antivibratic4_name; ?></a><br>
                                <?php elseif($item->blanket4_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket4_id; ?>">4 - <?php echo $item->blanket4_name; ?></a><br>
                                <?php endif; ?>

                                <?php if($item->antivibratic5_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->antivibratic5_id; ?>">5 - <?php echo $item->antivibratic5_name; ?></a><br>
                                <?php elseif($item->blanket5_id != 0): ?>
                                    <a class="iso_simulator_product_links" href="<?php echo $geral_tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->blanket5_id; ?>">5 - <?php echo $item->blanket5_name; ?></a><br>
                                <?php endif; ?>
                            </div>

                            <?php if($item->technical_file1 || $item->technical_file2 || $item->technical_file3 || $item->technical_file4) :?>
                                
                                <div class="iso_simulator_files">
                                    <div class="iso_simulator_links_label">More info to download:</div>

                                    <?php if($item->technical_file1) :
                                        $url = $item->technical_file1;
                                        $tokens = explode('/', $url);
                                        $last_url = $tokens[sizeof($tokens)-1]; ?>

                                        <a href="<?php echo $item->technical_file1; ?>"><?php echo $last_url; ?></a><br>
                                    <?php endif;?>

                                    <?php if($item->technical_file2) :
                                        $url = $item->technical_file2;
                                        $tokens = explode('/', $url);
                                        $last_url = $tokens[sizeof($tokens)-1]; ?>

                                        <a href="<?php echo $item->technical_file2; ?>"><?php echo $last_url; ?></a><br>
                                    <?php endif;?>

                                    <?php if($item->technical_file3) :
                                        $url = $item->technical_file3;
                                        $tokens = explode('/', $url);
                                        $last_url = $tokens[sizeof($tokens)-1]; ?>
                                        <a href="<?php echo $item->technical_file3; ?>"><?php echo $last_url; ?></a><br>
                                    <?php endif;?>

                                    <?php if($item->technical_file4) :
                                        $url = $item->technical_file4;
                                        $tokens = explode('/', $url);
                                        $last_url = $tokens[sizeof($tokens)-1]; ?>
                                        <a href="<?php echo $item->technical_file4; ?>"><?php echo $last_url; ?></a><br>
                                    <?php endif;?>

                               </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>  
			<?php endif; ?>

        <?php endforeach; ?>

        <?php if(!$show): ?>
            There are no items in the list
        <?php endif; ?>
    </ul>
</div>

<?php foreach ($categories as $category) :?>    

    <script type="text/javascript">
        jQuery('#iso_category_<?php echo $category; ?>').click(function(){
            if(jQuery('#iso_category_<?php echo $category; ?>').hasClass('iso_simulator_button_checked')){
                jQuery('.category_<?php echo $category; ?>').css('display', 'none');
                jQuery('#iso_category_<?php echo $category; ?>').removeClass('iso_simulator_button_checked');
            }
            else{ 
                jQuery('.category_<?php echo $category; ?>').css('display', 'block');
                jQuery('#iso_category_<?php echo $category; ?>').addClass('iso_simulator_button_checked');
            }                
        });
    </script>
<?php endforeach; ?>  

<script type="text/javascript">
    var currency_value = 1, unit_value = 1;

    $('#currency_list_form').change(function() {
        var currency_symbol = $(this).find('option:selected').data('symbol');

        currency_value = $(this).val();       
               
        $('.iso_currency_symbol').text(currency_symbol);

        $('.iso_price').each(function(){            
            $(this).text(($(this).data('price') * currency_value * unit_value).toFixed(2));
        });        
    });

    $('#unit_list_form').change(function() {        
        var unit_symbol = $(this).find('option:selected').data('symbol');
       
        unit_value = $(this).val();
       
        $('.iso_unit_symbol').text(unit_symbol);

        var current_price, value;

        $('.iso_price').each(function(){
            $(this).text(($(this).data('price') * currency_value * unit_value).toFixed(2));
        });
    });

</script>

