<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Template Steps', '/TemplateSteps');
$this->Html->addCrumb('Edit Template Step', '/TemplateSteps/edit/'.$id);
?>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Research Step Templates'); ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid">
                <div class="um_box_mid_content_mid_left">
                    <div class="templatesteps form">
                        <?php echo $this->Form->create('Templatestep'); ?>
                        <fieldset>
                            <legend><?php echo __('Edit Templatestep'); ?></legend>
                            <?php
                            echo $this->Form->input('id');
                            echo $this->Form->input('title', array('style' => 'width: 900px'));
                            echo $this->Form->input('description', array('type' => 'textarea', 'style' => 'width: 900px'));
                            echo $this->Form->input('desired_outcome', array('type' => 'textarea', 'style' => 'width: 900px'));
                            ?>
                        </fieldset>
                        <?php echo $this->Form->end(__('Submit')); ?>
                    </div>
                    <div class="actions">
                        <br>
                        <ul>

                <!--<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Templatestep.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Templatestep.id'))); ?></li>-->
                            <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
                        </ul>
                    </div>

                </div>
                <div class="um_box_mid_content_mid_right" align="right"></div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <div class="um_box_down"></div>
</div>
