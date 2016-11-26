

<div class="cakebakes form">
<?php echo $this->Form->create('Cakebake'); ?>
	<fieldset>
		<legend><?php echo __('Add Blog'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('content', array('type' => 'textarea')); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Cancel'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php echo $this->Element('tinymce'); ?>