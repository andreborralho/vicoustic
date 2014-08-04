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
                if (task == 'acoustic_mb.cancel') {
                    Joomla.submitform(task, document.getElementById('acoustic_mb-form'));
                }
                else{
                    
                    if (task != 'acoustic_mb.cancel' && document.formvalidator.isValid(document.id('acoustic_mb-form'))) {
                        Joomla.submitform(task, document.getElementById('acoustic_mb-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_acoustic_solutions&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="acoustic_mb-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_ACOUSTIC_SOLUTIONS_LEGEND_ACOUSTIC_MB'); ?></legend>
            <ul class="adminformlist">

				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
                <li><?php echo $this->form->getLabel('name'); ?>
                <?php echo $this->form->getInput('name'); ?></li>
                <li><?php echo $this->form->getLabel('ref'); ?>
                <?php echo $this->form->getInput('ref'); ?></li>

                <li><?php echo $this->form->getLabel('area_min'); ?>
                <?php echo $this->form->getInput('area_min'); ?></li>
                <li><?php echo $this->form->getLabel('area_max'); ?>
                <?php echo $this->form->getInput('area_max'); ?></li>

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

                <li>
                    <?php echo $this->form->getLabel('panel_id1'); ?>
                    <?php echo $this->form->getInput('panel_id1'); ?>
                
                    <?php echo $this->form->getLabel('panel1_boxes'); ?>
                    <?php echo $this->form->getInput('panel1_boxes'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id2'); ?>
                    <?php echo $this->form->getInput('panel_id2'); ?>
                    <?php echo $this->form->getLabel('panel2_boxes'); ?>
                    <?php echo $this->form->getInput('panel2_boxes'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id3'); ?>
                    <?php echo $this->form->getInput('panel_id3'); ?>
                    <?php echo $this->form->getLabel('panel3_boxes'); ?>
                    <?php echo $this->form->getInput('panel3_boxes'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id4'); ?>
                    <?php echo $this->form->getInput('panel_id4'); ?>
                    <?php echo $this->form->getLabel('panel4_boxes'); ?>
                    <?php echo $this->form->getInput('panel4_boxes'); ?>
                </li>


                <li><?php echo $this->form->getLabel('line_id'); ?>
                <?php echo $this->form->getInput('line_id'); ?></li>
                <li><?php echo $this->form->getLabel('room_id'); ?>
                <?php echo $this->form->getInput('room_id'); ?></li>

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