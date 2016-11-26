
<?php echo $this->Html->script('jquery-datepicker1'); ?>
<?php echo $this->Html->script('jquery-datepicker2'); ?>
<?php echo $this->Html->css('datepicker');?>

<script>
    $(function() {
        $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: "-150Y",
                maxDate: "+0D",
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                showOtherMonths: true,
                selectOtherMonths: true

            }

        );
    });
</script>
<div class="row col-sm-12">
    <?php echo $this->Form->create('Staff',array('enctype'=>'multipart/form-data')); ?>
    <h1>Add Staff</h1>
    
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('firstName', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
		echo $this->Form->input('lastName', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Last Name'));
		echo $this->Form->input('address', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Address'));
		echo $this->Form->input('phone', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Phone Number'));
		?>
	</div>
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('email', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Email'));
		echo $this->Form->input('birthday', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Date Of Birth','id'=>'datepicker', 'type'=>'text', 'placeholder'=>'Click Here to Enter DOB'));
		echo $this->Form->input('gender',array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Gender','options'=>array('Male'=>'Male','Female'=>'Female')));
		?>
	</div>
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('User.password', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'type'=>'password','label' =>'Password:', 'size'=>'50', 'placeholder'=>'Enter Password'));
		echo $this->Form->input('User.token_hash', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'type'=>'password','label'=>'Confirm Password', 'placeholder'=>'Confirm Password'));
		echo $this->Form->input('User.role', array('type' => 'hidden', 'value' => '2'));
		echo $this->Form->input('User.customer_id', array('type' => 'hidden', 'value' => '0'));
		echo $this->Form->input('photos.', array('type' => 'file', 'label' => 'Add Images', 'multiple'));
		?>
	</div>
</div>
<div class="row col-sm-12">
	<h1>Emergency Contact (Optional)</h1>
		<div class="col-sm-4">
			<?php
			echo $this->Form->input('emergencyName', array('label' =>'Contact Name', 'class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Contact Name'));
			echo $this->Form->input('emergencyRelationship', array('label' =>'Contact Relationship', 'class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Contact Relationship'));
			echo $this->Form->input('emergencyContact',array('label' =>'Contact Number', 'class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Contact Number'));
			?>
		</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
		<?php $url = array('controller'=>'staffs', 'action'=>'index');
		echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>