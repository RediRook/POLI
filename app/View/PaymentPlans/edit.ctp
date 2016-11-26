<div class="paymentPlans form">
<?php echo $this->Form->create('PaymentPlan'); ?>
	<fieldset>
		<legend><?php echo __('Edit Payment Plan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('installment_price1');
		echo $this->Form->input('installment_price2');
		echo $this->Form->input('installment_price3');
		echo $this->Form->input('installment_price4');
		echo $this->Form->input('installment_price5');
		echo $this->Form->input('installment_price6');
		echo $this->Form->input('total');
		echo $this->Form->input('clientcase_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PaymentPlan.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PaymentPlan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Payment Plans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientcases'), array('controller' => 'clientcases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientcase'), array('controller' => 'clientcases', 'action' => 'add')); ?> </li>
	</ul>
</div>
