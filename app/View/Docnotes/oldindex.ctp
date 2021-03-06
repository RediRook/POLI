<div class="docnotes index">
	<h2><?php echo __('Docnotes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('document_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($docnotes as $docnote): ?>
	<tr>
		<td><?php echo h($docnote['Docnote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($docnote['Document']['id'], array('controller' => 'documents', 'action' => 'view', $docnote['Document']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($docnote['User']['id'], array('controller' => 'users', 'action' => 'view', $docnote['User']['id'])); ?>
		</td>
		<td><?php echo h($docnote['Docnote']['note']); ?>&nbsp;</td>
		<td><?php echo h($docnote['Docnote']['created']); ?>&nbsp;</td>
		<td><?php echo h($docnote['Docnote']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $docnote['Docnote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $docnote['Docnote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $docnote['Docnote']['id']), null, __('Are you sure you want to delete # %s?', $docnote['Docnote']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Docnote'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
