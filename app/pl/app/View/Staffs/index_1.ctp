
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
	<h1><?php echo __('Staffs'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
		<tr class='list'>
			<th class='heading'><?php echo $this->Paginator->sort('lastName'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('firstName'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('address'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('email'); ?></th>
			<th class='heading'></th>
			<th class='heading'></th>
			<th class='heading'></th>
		</tr>
		</thead>
		<?php foreach ($staffs as $staff): ?>
			<tr class='listeven'>

				<td><?php echo h($staff['Staff']['lastName']); ?>&nbsp;</td>
				<td><?php echo h($staff['Staff']['firstName']); ?>&nbsp;</td>
				<td><?php echo h($staff['Staff']['address']); ?>&nbsp;</td>
				<td><?php echo h($staff['Staff']['email']); ?>&nbsp;</td>
				<td>
						<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'staffs','action' => 'view', $staff['Staff']['id']))));?>
						   </td>
					   <td>
						<?php echo $this->Html->image("Edit.jpg", array('url'=>array('controller'=>'staffs','action' => 'edit', $staff['Staff']['id'])));?>
						   </td>
					   <td>
					<?php echo $this->Html->link(
								$this->Html->image("Delete.png"),
								array('controller' => 'staffs', 'action' => 'delete', $staff['Staff']['id'], $staff['Staff']['staff_name']),
								array('escape' => false),
								'Are you sure you want to delete ' . $staff['Staff']['staff_name'] . '?');?>

					</td>
		<?php endforeach; ?>
	</table>
</div>
<div class="row col-sm-12">
	<?php $urlAdd = array ('controller'=>'/Staffs/','action'=>'add');
	echo $this->Form->button('Add Staff',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
	?>
</div>