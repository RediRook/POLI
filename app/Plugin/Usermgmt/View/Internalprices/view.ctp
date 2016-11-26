<div class="internalprices view">
<h2><?php  echo __('Internalprice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($internalprice['Internalprice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($internalprice['Internalprice']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($internalprice['Internalprice']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Internalprice'), array('action' => 'edit', $internalprice['Internalprice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Internalprice'), array('action' => 'delete', $internalprice['Internalprice']['id']), null, __('Are you sure you want to delete # %s?', $internalprice['Internalprice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Internalprices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internalprice'), array('action' => 'add')); ?> </li>
	</ul>
</div>
