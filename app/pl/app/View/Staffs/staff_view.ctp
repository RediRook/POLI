

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
			</table>
	</div>
	
 
    <?php $url = array('controller'=>'staffs', 'action'=>'staffIndex');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>