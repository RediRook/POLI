
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('username');
        echo $this->Form->input('password', array('type'=>'password','label' =>'Password:', 'size'=>'50'));
        echo $this->Form->input('token_hash', array('type'=>'password','label'=>'Confirm Password'));
        echo $this->Form->input('role',array('type' => 'hidden', 'value' => '1'));?>
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
