

<div class="row col-sm-12">
<?php echo $this->Form->create('User'); ?>

		<h1>Add User</h1>
	<div class="col-sm-4">
        <?php
			echo $this->Form->input('username', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
			echo $this->Form->input('password', array('class'=>'form-control','type'=>'password', 'style' => "margin-bottom:10px;",'label' =>'Password:', 'size'=>'50', 'placeholder'=>'Enter Password'));
			echo $this->Form->input('token_hash', array('class'=>'form-control','style' => "margin-bottom:10px;",'type'=>'password','label'=>'Confirm Password','placeholder'=>'Confirm Password'));
			echo $this->Form->input('role',array('type' => 'hidden', 'value' => '1'));
			echo $this->Form->input('customer_id',array('type' => 'hidden', 'value' => '0'));
			echo $this->Form->input('staff_id',array('type' => 'hidden', 'value' => '0'));
		?>
	</div>
</div>

<div class="row col-sm-12">
	<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
    <?php $url = array('controller'=>'users', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
    <?php echo $this->Form->end(); ?>
</div>