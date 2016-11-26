
<div class="row col-sm-12">
	<h1><?php  echo __('Job'); ?></h1>
		<div class="col-sm-6">
				<table class="table table-striped">
					<tr>
						<td><?php echo __('Customer'); ?></td>
						<td><?php echo $this->Html->link($job['Customer']['customer_name'], array('controller' => 'customers', 'action' => 'view', $job['Customer']['id'])); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Customer Address'); ?></td>
						<td><?php echo h($job['Customer']['address']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('StartTime'); ?></td>
						<td><?php echo h($job['Job']['startTime']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('EndTime'); ?></td>
						<td><?php echo h($job['Job']['endTime']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Status'); ?></td>
						<td><?php echo h($job['Job']['status']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Staff'); ?></td>
						<td><?php foreach($job['Staff'] as $staff): ?>

							<p><?php echo $this->Html->link($staff['staff_name'], array('controller' => 'staffs', 'action' => 'view', $staff['id'])); ?></p>
							
							<?php endforeach; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Service'); ?></td>
						<td><?php foreach($job['Service'] as $service): ?>
						
							<p><?php echo $service['name']; ?></p>
							<?php endforeach; ?>
						</td>
					</tr>
					</tr>

                                <td><?php echo __('Comment'); ?></td>
                          <td><?php echo h($job['Job']['comment']); ?></td>
                                        					</tr>
				</table>
		</div>
</div>
<div class="row col-sm-12">
	<?php $urlEdit = array ('controller'=>'/Jobs/','action'=>'editJob',$job['Job']['id']);
	echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
	?>
	
	<?php $urlDel = array('controller'=>'Jobs','action'=>'deleteJob',$job['Job']['id']);
	echo $this->Form->button('Delete',array('class'=>'btn btn-primary','onclick' => "if(confirm('Are you sure you want to delete this job?'))location.href='".$this->Html->url($urlDel)."'"));
	?>
	
    <?php $url = array('controller'=>'jobs', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
	?>
</div>