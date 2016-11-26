
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
	<h1><?php echo __('Jobs'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
		<tr class='list'>
			<th class='heading'><?php echo $this->Paginator->sort('title'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('customer_id'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('startTime'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('status'); ?></th>
			<th class='heading'></th>
			<th class='heading'></th>
			<th class='heading'></th>
		</tr>
		</thead>
		<?php foreach ($jobs as $job): ?>
		<tr class='listeven'>
		
			<td><?php echo h($job['Job']['title']);?>&nbsp;</td>
			
			<td><?php echo h($job['Customer']['customer_name']);?>&nbsp;</td>


			<td><?php echo date("d-m-Y",strtotime($job['Job']['startTime'])); ?>&nbsp;</td>
			<?php if ($job['Job']['status']=='Finished'):?>
							<td><span class="label label-success">Finished</span></td>
						<?php else:?>
							<td><span class="label label-danger">Not Finished</span></td>
						<?php endif;?>
			<td>
				<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'jobs','action' => 'view', $job['Job']['id']))));?>
			</td>
			<td>
				<?php echo $this->Html->image("Edit.jpg", array('url'=>array('controller'=>'jobs','action' => 'editJob', $job['Job']['id'])));?>
			</td>
			<td>
				<?php echo $this->Html->link(
					$this->Html->image("Delete.png"),
					array('controller' => 'jobs', 'action' => 'deleteJob', $job['Job']['id']),
					array('escape' => false),
					'Are you sure you want to delete ' . $job['Job']['id'] . '?');?>

			</td>
		</tr>
	<?php endforeach; ?>
		</table>
</div>
<div class="row col-sm-12">
	<?php $urlAdd = array ('controller'=>'/Jobs/','action'=>'addJob');
	echo $this->Form->button('Add Job',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
	?>

	<?php $urlCalendar = array ('controller'=>'/Jobs/','action'=>'calendar');
	echo $this->Form->button('View Calendar',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlCalendar)."'"));
	?>

	<?php $urlDaily = array ('controller'=>'/Jobs/','action'=>'daily');
	echo $this->Form->button('View Daily Job',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlDaily)."'"));
	?>
</div>