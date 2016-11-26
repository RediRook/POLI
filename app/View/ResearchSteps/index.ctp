<div class="researchSteps index">
	<h2><?php echo __('Research Steps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('creation_date'); ?></th>
			<th><?php echo $this->Paginator->sort('completion_date'); ?></th>
			<th><?php echo $this->Paginator->sort('expected_completion_date'); ?></th>
			<th><?php echo $this->Paginator->sort('desired_outcome'); ?></th>
			<th><?php echo $this->Paginator->sort('actual_outcome'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($researchSteps as $researchStep): ?>
	<tr>
		<td><?php echo h($researchStep['ResearchStep']['id']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['description']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['creation_date']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['completion_date']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['expected_completion_date']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['desired_outcome']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['actual_outcome']); ?>&nbsp;</td>
		<td><?php echo h($researchStep['ResearchStep']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $researchStep['ResearchStep']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $researchStep['ResearchStep']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $researchStep['ResearchStep']['id']), null, __('Are you sure you want to delete # %s?', $researchStep['ResearchStep']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Research Step'), array('action' => 'add')); ?></li>
	</ul>
</div>
