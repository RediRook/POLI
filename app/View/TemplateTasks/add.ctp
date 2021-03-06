<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Template Tasks', '/TemplateTasks');
$this->Html->addCrumb('Add Template Task', '/TemplateTasks/add');
?>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Research Task Templates'); ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid">
                <div class="um_box_mid_content_mid_left">
                    <div class="researchTasks form">
                        <?php echo $this->Form->create('TemplateTask'); ?>
                        <fieldset>
                            <legend><?php echo __('Add Template Task'); ?></legend>
                            <?php
                            echo $this->Form->input('title', array('style' => 'width: 900px'));
                            echo $this->Form->input('description', array('type' => 'textarea', 'style' => 'width: 900px'));
                            echo $this->Form->input('desired_outcome', array('type' => 'textarea', 'style' => 'width: 900px'));
                            ?>
                        </fieldset>
                        <div class="submit">
                            <?php echo $this->Form->submit(__('Submit', true), array('name' => 'Button', 'div' => false)); ?>
                            <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'Button', 'div' => false)); ?>
                        </div>  
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div class="um_box_mid_content_mid_right" align="right"></div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <div class="um_box_down"></div>
</div>
