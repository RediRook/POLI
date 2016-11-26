<div class="paymentPlans index">
	<h2><?php echo __('Payment Plans'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('installment_price1'); ?></th>
			<th><?php echo $this->Paginator->sort('installment_price2'); ?></th>
			<th><?php echo $this->Paginator->sort('installment_price3'); ?></th>
			<th><?php echo $this->Paginator->sort('installment_price4'); ?></th>
			<th><?php echo $this->Paginator->sort('installment_price5'); ?></th>
			<th><?php echo $this->Paginator->sort('installment_price6'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
                        <th><?php echo $this->Paginator->sort('interest_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('clientcase_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paymentPlans as $paymentPlan): ?>
	<tr>
		<td><?php echo h($paymentPlan['PaymentPlan']['id']); ?>&nbsp;</td>
		<td><?php echo h($paymentPlan['PaymentPlan']['installment_price1']); ?>&nbsp;</td>
		<td><?php echo h($paymentPlan['PaymentPlan']['installment_price2']); ?>&nbsp;</td>
		<td><?php echo h($paymentPlan['PaymentPlan']['installment_price3']); ?>&nbsp;</td>
		<td><?php echo h($paymentPlan['PaymentPlan']['installment_price4']); ?>&nbsp;</td>
		<td><?php echo h($paymentPlan['PaymentPlan']['installment_price5']); ?>&nbsp;</td>
		<td><?php echo h($paymentPlan['PaymentPlan']['installment_price6']); ?>&nbsp;</td>
                <td><?php echo h($paymentPlan['PaymentPlan']['total']); ?>&nbsp;</td>
                <td><?php echo h($paymentPlan['PaymentPlan']['interest_rate']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paymentPlan['Clientcase']['id'], array('controller' => 'clientcases', 'action' => 'view', $paymentPlan['Clientcase']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paymentPlan['PaymentPlan']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paymentPlan['PaymentPlan']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paymentPlan['PaymentPlan']['id']), null, __('Are you sure you want to delete # %s?', $paymentPlan['PaymentPlan']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Payment Plan'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientcases'), array('controller' => 'clientcases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientcase'), array('controller' => 'clientcases', 'action' => 'add')); ?> </li>
	</ul>
</div>
