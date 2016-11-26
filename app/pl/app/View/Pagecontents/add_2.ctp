
<div class="posts form">
<?php echo $this->Form->create('Pagecontent'); ?>
    <fieldset>
    <legend><?php echo __('Add Pagecontent'); ?></legend>
        <?php
        echo $this->Form->input('page');
        //echo $this->Form->input('content');
        echo $this->Element('tinymce');
        echo $this->Form->input('Pagecontent.content', array('type' => 'textarea', 'label' => 'Content'),array('language'=>'en'), 'full');

        ?>
        </fieldset>
        <?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'id'=>'button','div' => false)); ?>
<?php echo $this->Form->end(); ?>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>
    </ul>
</div>
