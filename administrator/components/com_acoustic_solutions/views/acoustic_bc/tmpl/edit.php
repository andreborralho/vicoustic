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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
?>

<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'acoustic_bc.cancel') {
                    Joomla.submitform(task, document.getElementById('acoustic_bc-form'));
                }
                else{
                    
                    if (task != 'acoustic_bc.cancel' && document.formvalidator.isValid(document.id('acoustic_bc-form'))) {
                        Joomla.submitform(task, document.getElementById('acoustic_bc-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_acoustic_solutions&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="acoustic_bc-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_ACOUSTIC_SOLUTIONS_LEGEND_ACOUSTIC_BC'); ?></legend>
            <ul class="adminformlist">

				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>    

                <li><?php echo $this->form->getLabel('room_id'); ?>
                <?php echo $this->form->getInput('room_id'); ?></li>
                
                <li>
                    <?php echo $this->form->getLabel('panel_id1'); ?>
                    <?php echo $this->form->getInput('panel_id1'); ?>
                    <?php echo $this->form->getLabel('panel1_percentage'); ?>
                    <?php echo $this->form->getInput('panel1_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id2'); ?>
                    <?php echo $this->form->getInput('panel_id2'); ?>
                    <?php echo $this->form->getLabel('panel2_percentage'); ?>
                    <?php echo $this->form->getInput('panel2_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id3'); ?>
                    <?php echo $this->form->getInput('panel_id3'); ?>
                    <?php echo $this->form->getLabel('panel3_percentage'); ?>
                    <?php echo $this->form->getInput('panel3_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id4'); ?>
                    <?php echo $this->form->getInput('panel_id4'); ?>
                    <?php echo $this->form->getLabel('panel4_percentage'); ?>
                    <?php echo $this->form->getInput('panel4_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id5'); ?>
                    <?php echo $this->form->getInput('panel_id5'); ?>
                    <?php echo $this->form->getLabel('panel5_percentage'); ?>
                    <?php echo $this->form->getInput('panel5_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id6'); ?>
                    <?php echo $this->form->getInput('panel_id6'); ?>
                    <?php echo $this->form->getLabel('panel6_percentage'); ?>
                    <?php echo $this->form->getInput('panel6_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id7'); ?>
                    <?php echo $this->form->getInput('panel_id7'); ?>
                    <?php echo $this->form->getLabel('panel7_percentage'); ?>
                    <?php echo $this->form->getInput('panel7_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id8'); ?>
                    <?php echo $this->form->getInput('panel_id8'); ?>
                    <?php echo $this->form->getLabel('panel8_percentage'); ?>
                    <?php echo $this->form->getInput('panel8_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id9'); ?>
                    <?php echo $this->form->getInput('panel_id9'); ?>
                    <?php echo $this->form->getLabel('panel9_percentage'); ?>
                    <?php echo $this->form->getInput('panel9_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id10'); ?>
                    <?php echo $this->form->getInput('panel_id10'); ?>
                    <?php echo $this->form->getLabel('panel10_percentage'); ?>
                    <?php echo $this->form->getInput('panel10_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id11'); ?>
                    <?php echo $this->form->getInput('panel_id11'); ?>
                    <?php echo $this->form->getLabel('panel11_percentage'); ?>
                    <?php echo $this->form->getInput('panel11_percentage'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id12'); ?>
                    <?php echo $this->form->getInput('panel_id12'); ?>
                    <?php echo $this->form->getLabel('panel12_percentage'); ?>
                    <?php echo $this->form->getInput('panel12_percentage'); ?>
                </li>


                <li><?php echo $this->form->getLabel('description'); ?>
                <?php echo $this->form->getInput('description'); ?></li>

                <li><?php echo $this->form->getLabel('icon'); ?>
                <?php echo $this->form->getInput('icon'); ?></li>
                <li><?php echo $this->form->getLabel('image1'); ?>
                <?php echo $this->form->getInput('image1'); ?></li>
                <li><?php echo $this->form->getLabel('image2'); ?>
                <?php echo $this->form->getInput('image2'); ?></li>
                <li><?php echo $this->form->getLabel('image3'); ?>
                <?php echo $this->form->getInput('image3'); ?></li>                


                <li><?php echo $this->form->getLabel('technical_file'); ?>
                <?php echo $this->form->getInput('technical_file'); ?></li>

				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>
            </ul>
        </fieldset>
    </div>

    

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>