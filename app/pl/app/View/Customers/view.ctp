
<div class="row col-sm-12">
	<h1><?php  echo __('Customer'); ?></h1>
		<div class="col-sm-6">
			<table class="table table-striped">
				<tr>
					<td><?php echo __('Name'); ?></td>
					<td><?php echo h($customer['Customer']['firstName']); ?> <?php echo h($customer['Customer']['lastName']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Address'); ?></td>
					<td><?php echo h($customer['Customer']['address']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Phone'); ?></td>
					<td><?php echo h($customer['Customer']['phone']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('E-mail'); ?></td>
					<td><?php echo h($customer['Customer']['email']); ?></td>
				</tr>
				<tr>
					<td><?php echo __('DateOfBirth'); ?></td>
					<td><?php echo date("d-m-Y",strtotime($customer['Customer']['birthday'])); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Gender'); ?></td>
					<td><?php echo h($customer['Customer']['gender']); ?></td>
				</tr>

			</table>
			
		</div>
</div>
<div class="row col-sm-12">
	<?php $urlEdit = array ('controller'=>'/Customers/','action'=>'edit',$customer['Customer']['id']);
	echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
	?>

	<?php $urlDel = array('controller'=>'Customers','action'=>'delete',$customer['Customer']['id']);
	echo $this->Form->button('Delete',array('class'=>'btn btn-primary','onclick' => "if(confirm('Are you sure you want to delete this customer?'))location.href='".$this->Html->url($urlDel)."'"));
	?>

    <?php $url = array('controller'=>'customers', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
	?>
</div>