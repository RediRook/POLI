
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
<div class="row col-md-12">
	<?php echo $this->Form->create('Customer'); ?>
	<h1>Edit Customer</h1>
		<div class="col-sm-4">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('firstName', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
				echo $this->Form->input('lastName', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Last Name'));
				echo $this->Form->input('address', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Address'));
				echo $this->Form->input('phone', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Phone Number'));
			?>
		</div>
		<div class="col-sm-4">
			<?php
				echo $this->Form->input('email', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Email'));
				echo $this->Form->input('birthday',array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Date Of Birth', 'id'=>'datepicker', 'type'=>'text', 'placeholder'=>'Click Here to Enter DOB'));

				echo $this->Form->input('gender',array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Gender','options'=>array('Male'=>'Male','Female'=>'Female')));
			?>
		</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary', 'name' => 'ok', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('class'=>'btn btn-primary','name' => 'cancel','div' => false)); ?>

		<?php echo $this->Form->end(); ?>
	</div>
</div>