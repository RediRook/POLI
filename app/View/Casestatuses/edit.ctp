<div class="casestatuses form">
<?php echo $this->Form->create('Casestatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Casestatus'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('clientcase_id');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Casestatus.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Casestatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Casestatuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientcases'), array('controller' => 'clientcases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientcase'), array('controller' => 'clientcases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
