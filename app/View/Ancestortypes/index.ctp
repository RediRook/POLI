<div class="ancestortypes index">
	<h2><?php echo __('Ancestortypes'); ?></h2>
	<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('View Client Case'), array('controller' => 'clientcases', 'action' => 'index')); ?> </li>
		<!-- <li><?php echo $this->Html->link(__('New Ancestortype'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ancestor_type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ancestortypes as $ancestortype): ?>
	<tr>
		<td><?php echo h($ancestortype['Ancestortype']['id']); ?>&nbsp;</td>
		<td><?php echo h($ancestortype['Ancestortype']['ancestor_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ancestortype['Ancestortype']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ancestortype['Ancestortype']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ancestortype['Ancestortype']['id']), null, __('Are you sure you want to delete # %s?', $ancestortype['Ancestortype']['id'])); ?>
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

