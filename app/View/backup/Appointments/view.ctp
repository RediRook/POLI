
<div class="row col-sm-12">
	<h1>'Appointments'</h1>
		<div class="col-sm-6">
				<table class="table table-striped">
                                    	<tr>
						<td><?php echo __('Title'); ?></td>
						<td><?php echo h($appointment['Appointment']['title']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Applicant'); ?></td>
						<td><?php echo $this->Html->link($appointment['Applicant']['first_name'].' '.$appointment['Applicant']['surname'], array('controller' => 'applicants', 'action' => 'view', $appointment['Applicant']['id'])); ?></td>
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
						<td><?php echo h($appointment['Employee']['first_name'].' '.$appointment['Employee']['surname']);?>
						</td>
					</tr>
				</table>
		</div>
</div>
<div class="row col-sm-12">
	<?php $urlEdit = array ('controller'=>'/Appointments/','action'=>'editAppointment',$appointment['Appointment']['id']);
	echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
	?>
	
	<?php $urlDel = array('controller'=>'Appointments','action'=>'deleteAppointment',$appointment['Appointment']['id']);
	echo $this->Form->button('Delete',array('class'=>'btn btn-primary','onclick' => "if(confirm('Are you sure you want to delete this appointment?'))location.href='".$this->Html->url($urlDel)."'"));
	?>
	
    <?php $url = array('controller'=>'Appointments', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
	?>
</div>