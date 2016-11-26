
<div class="row">
	<h1><?php  echo __('Job'); ?></h1>
		<div class="col-sm-6">
				<table class="table table-striped">
					<tr>
						<td><?php echo __('Customer'); ?></td>
						<td><?php echo $job['Customer']['customer_name']?></td>
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

							<p><?php echo $this->Html->link($staff['staff_name'], array('controller' => 'staffs', 'action' => 'staffView', $staff['id'])); ?></p>

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

                         <td><?php echo __('Comment'); ?></td>
                      <td><?php echo h($job['Job']['comment']); ?></td>
                    					</tr>
				</table>
		</div>
</div>
<div class="row">


    <?php $url = array('controller'=>'jobs', 'action'=>'timeTable');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
	?>
</div>