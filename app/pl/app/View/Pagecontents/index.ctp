
<?php echo $this->Html->css ('jquery.dataTables.css');?>
<?php echo $this->Html->script('jquery.dataTables'); ?>
<script type="text/javascript" charset="utf-8">

    //http://www.datatables.net/index


    $(document).ready(function() {
        $('#example').dataTable( {
                  "bPaginate": true,
                  "sPaginationType": "full_numbers",
                  "bLengthChange": true,
                  "bSort": false,
                  "bInfo": true,
                  "bAutoWidth": true,
                  "bStateSave": true
              } );
    } );
</script>
<div class="row col-sm-12">
	<h2><?php echo __('Home'); ?></h2>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
		<tr class='list'>
			<th class='heading'><?php echo $this->Paginator->sort('page'); ?></th>
			<th class='heading'></th>
			<th class='heading'></th>

		</tr>
		</thead>
		<?php foreach ($pagecontents as $pagecontent): ?>
			<tr class='listeven'>

				<td><?php echo h($pagecontent['Pagecontent']['page']); ?>&nbsp;</td>
				<td><?php echo $this->Html->image("View.png", array('url'=>(array('action' => 'view', $pagecontent['Pagecontent']['id']))));?></td>
				<td><?php echo $this->Html->image("Edit.jpg", array('url'=>array('action' => 'edit', $pagecontent['Pagecontent']['id'])));?></td>

		<?php endforeach; ?>
	</table>
	
<!--<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('page'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
		</tr>
		<?php foreach ($pagecontents as $pagecontent): ?>
		<tr>
			<td><?php echo h($pagecontent['Pagecontent']['page']);?></td>
			<td><?php echo ($pagecontent['Pagecontent']['content']); ?>&nbsp;</td>
			<td class="actions"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pagecontent['Pagecontent']['id'])); ?></td>
			<td class="actions"><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $pagecontent['Pagecontent']['id'])); ?></td>
			<td class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $pagecontent['Pagecontent']['id'])); ?></td>
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
	?>-->
</div>