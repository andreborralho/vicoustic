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
                if (task == 'acoustic_mb_option.cancel') {
                    Joomla.submitform(task, document.getElementById('acoustic_mb_option-form'));
                }
                else{
                    
                    if (task != 'acoustic_mb_option.cancel' && document.formvalidator.isValid(document.id('acoustic_mb_option-form'))) {
                        Joomla.submitform(task, document.getElementById('acoustic_mb_option-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_acoustic_solutions&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="acoustic_mb_option-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_ACOUSTIC_SOLUTIONS_LEGEND_ACOUSTIC_MB_OPTION'); ?></legend>
            <ul class="adminformlist">

				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
                <li><?php echo $this->form->getLabel('name'); ?>
                <?php echo $this->form->getInput('name'); ?></li>
                <li><?php echo $this->form->getLabel('ref'); ?>
                <?php echo $this->form->getInput('ref'); ?></li>

                <li><?php echo $this->form->getLabel('icon'); ?>
                <?php echo $this->form->getInput('icon'); ?></li>
                <li><?php echo $this->form->getLabel('image'); ?>
                <?php echo $this->form->getInput('image'); ?></li>
      
                <li><?php echo $this->form->getLabel('solution_id'); ?>
                <?php echo $this->form->getInput('solution_id'); ?></li>  

                <li>
                    <?php echo $this->form->getLabel('panel_id1'); ?>
                    <?php echo $this->form->getInput('panel_id1'); ?>                
                </li>
                <li>
                    <?php echo $this->form->getLabel('panel_id2'); ?>
                    <?php echo $this->form->getInput('panel_id2'); ?>                    
                </li>             

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