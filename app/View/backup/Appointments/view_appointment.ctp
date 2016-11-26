
<div class="row">
	<h1>'Appointments'</h1>
		<div class="col-sm-6">
				<table class="table table-striped">
					<tr>
						<td><?php echo __('Customer'); ?></td>
						<td><?php echo $appointment['Customer']['customer_name']?></td>
					</tr>
					<tr>
						<td><?php echo __('Customer Address'); ?></td>
						<td><?php echo h($appointment['Customer']['address']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('StartTime'); ?></td>
						<td><?php echo h($appointment['Appointment']['startTime']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('EndTime'); ?></td>
						<td><?php echo h($appointment['Appointment']['endTime']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Status'); ?></td>
						<td><?php echo h($appointment['Appointment']['status']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Employee'); ?></td>
						<td><?php foreach($appointment['Employee'] as $employee): ?>

							<p><?php echo $this->Html->link($employee['employee_name'], array('controller' => 'employees', 'action' => 'employeeView', $employee['id'])); ?></p>

							<?php endforeach; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Service'); ?></td>
						<td><?php foreach($appointment['Service'] as $service): ?>

							<p><?php echo $service['name']; ?></p>
							<?php endforeach; ?>
						</td>
					</tr>

                         <td><?php echo __('Comment'); ?></td>
                      <td><?php echo h($appointment['Appointment']['comment']); ?></td>
                    					</tr>
				</table>
		</div>
</div>
<div class="row">


    <?php $url = array('controller'=>'appointments', 'action'=>'timeTable');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
	?>
</div>