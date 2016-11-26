<div class="documenttypes form">
    <?php
    $this->Html->addCrumb('Admin Dashboard', '/dashboard');
    $this->Html->addCrumb('Management', '/management');
    $this->Html->addCrumb('Add Document Type', '/documenttypes/add');
    ?>
    <?php echo $this->Form->create('Documenttype'); ?>
    <fieldset>
        <legend><?php echo __('Add Documenttype'); ?></legend>
        <?php
        echo $this->Form->input('category');
        echo $this->Form->input('type');
        echo $this->Form->input('code');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
