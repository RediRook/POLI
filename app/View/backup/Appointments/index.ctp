
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
<?php 
$this->Html->addCrumb('Appointments', '/Appointments');
?>
<div class="row col-sm-12">
    <fieldset>
	<legend><?php echo __('Appointments'); ?></legend>
        </fieldset>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
		<tr class='list'>
			<th class='heading'><?php echo $this->Paginator->sort('Title'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('Customer_id'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('StartTime'); ?></th>
			<th class='heading'><?php echo $this->Paginator->sort('Status'); ?></th>
			<th class='heading'></th>
			<th class='heading'></th>
			<th class='heading'></th>
		</tr>
		</thead>
		<?php foreach ($appointments as $appointment): ?>
		<tr class='listeven'>
		
			<td><?php echo h($appointment['Appointment']['title']);?>&nbsp;</td>
			
			<td><?php echo h($appointment['Applicant']['first_name'].' '.$appointment['Applicant']['surname']);?>&nbsp;</td>


			<td><?php echo date("d-m-Y",strtotime($appointment['Appointment']['startTime'])); ?>&nbsp;</td>
			<?php if ($appointment['Appointment']['status']=='Finished'):?>
							<td><span class="label label-success">Finished</span></td>
						<?php else:?>
							<td><span class="label label-danger">Not Finished</span></td>
						<?php endif;?>
			<td>
				<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'appointments','action' => 'view', $appointment['Appointment']['id']))));?>
			</td>
			<td>
				<?php /*echo $this->Html->image("Edit.jpg", array('url'=>array('controller'=>'appointments','action' => 'editAppointment', $appointment['Appointment']['id'])))*/;?>
			</td>
			<td>
				<?php echo $this->Html->link(
					$this->Html->image("Delete.png"),
					array('controller' => 'appointments', 'action' => 'deleteAppointment', $appointment['Appointment']['id']),
					array('escape' => false),
					'Are you sure you want to delete the appointment for ' . $appointment['Applicant']['first_name'].' '.$appointment['Applicant']['surname'] . '?');?>

			</td>
		</tr>
	<?php endforeach; ?>
		</table>
</div>
<div class="row col-sm-12">
<?php $urlCalendar = array ('controller'=>'/Appointments','action'=>'calendar');
	
 	echo $this->Form->button('View Calendar',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlCalendar)."'"));
	?>

    
        <?php $urlAdd = array ('controller'=>'/Appointments','action'=>'addAppointment');
	echo $this->Form->button('Add Appointment',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));?>

	<?php $urlDaily = array ('controller'=>'/Appointments','action'=>'daily');
	echo $this->Form->button('View Daily Appointment',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlDaily)."'"));
	?>
</div>