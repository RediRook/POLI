<div class="statuses form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><?php echo __('Edit Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

