
<div class="row col-sm-12">
	<h1><?php  echo __('Staff'); ?></h1>
	
	<div class="col-sm-6">
		<table class="table table-striped">
				<tr>
					<td><?php echo __('First Name'); ?></td>
					<td><?php echo h($staff['Staff']['firstName']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Last Name'); ?></td>
					<td><?php echo h($staff['Staff']['lastName']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Position'); ?></td>
					<td><?php echo h($staff['Staff']['position']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Address'); ?></td>
					<td><?php echo h($staff['Staff']['address']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Phone'); ?></td>
					<td><?php echo h($staff['Staff']['phone']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('E-mail'); ?></td>
					<td><?php echo h($staff['Staff']['email']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Gender'); ?></td>
					<td><?php echo h($staff['Staff']['gender']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('DateOfBirth'); ?></td>
					<td><?php echo date("d-m-Y",strtotime($staff['Staff']['birthday'])); ?></td>
				</tr>
				<tr>
					<td><?php echo __('TFN'); ?></td>
					<td><?php echo h($staff['Staff']['taxFile']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Licence Number'); ?></td>
					<td><?php echo h($staff['Staff']['licence']); ?></td>
				</tr>
			</table>
	</div>
	
	 
</div>
<div class="row col-sm-12">
	<h1>Emergency Contact</h1>
	<div class="col-sm-6">
		<table class="table table-striped">
				<tr>
					<td><?php echo __('Name'); ?></td>
					<td><?php echo h($staff['Staff']['emergencyName']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Relationship'); ?></td>
					<td><?php echo h($staff['Staff']['emergencyRelationship']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Contact'); ?></td>
					<td><?php echo h($staff['Staff']['emergencyContact']); ?></td>
				</tr>
			</table>
	</div>

</div>
<div class="row">
	<div class="col-sm-12">
		<?php $urlEdit = array ('controller'=>'/Staffs/','action'=>'edit',$staff['Staff']['id']);
		echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
		?>
		
		<?php $urlDel = array('controller'=>'Staffs','action'=>'delete',$staff['Staff']['id']);
		echo $this->Form->button('Delete',array('class'=>'btn btn-primary','onclick' => "if(confirm('Are you sure you want to delete this staff?'))location.href='".$this->Html->url($urlDel)."'"));
		?>
		
		<?php $url = array('controller'=>'staffs', 'action'=>'index');
		echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
		?>
	</div>
</div>