
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
	<h1><?php echo __('Services'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
		<tr class='list'>
			<th class='heading'><?php echo $this->Paginator->sort('name'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('description'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('price'); ?></th>
			<th class='heading'></th>
			<th class='heading'></th>


		</tr>
		</thead>
		<?php foreach ($services as $service): ?>
			<tr class='listeven'>
				<td><?php echo h($service['Service']['name']); ?>&nbsp;</td>
			<td><?php echo h($service['Service']['description']); ?>&nbsp;</td>
			<td><?php echo h($service['Service']['price']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->image("Edit.jpg", array('url'=>array('controller'=>'services','action' => 'edit', $service['Service']['id'])));?>
				</td>
				<td>
					<?php echo $this->Html->link(
						$this->Html->image("Delete.png"),
						array('controller' => 'services', 'action' => 'delete', $service['Service']['id']),
						array('escape' => false),
						'Are you sure you want to delete ' . $service['Service']['name'] . '?');?>

				</td>

		</tr>
	<?php endforeach; ?>
		</table>
</div>
<div class="row col-sm-12">
	<?php $urlAdd = array ('controller'=>'/Services/','action'=>'add');
	echo $this->Form->button('Add Service',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
	?>
</div>