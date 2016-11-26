
<?php echo $this->Html->script('jquery-datepicker1'); ?>
<?php echo $this->Html->script('jquery-datepicker2'); ?>
<?php echo $this->Html->css('datepicker');?>
<?php echo $this->Html->css('bootstrap-multiselect'); ?>
<?php echo $this->Html->script('bootstrap-multiselect'); ?>

<script>
    $(function() {
        $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: "+0D",
                maxDate: "+1Y",
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                showOtherMonths: true,
                selectOtherMonths: true

            }

        );
    });
</script>
<div class="row col-sm-12">
	<?php echo $this->Form->create('Appointment'); ?>
		<h1>Edit Appointment</h1>
		
		<div class="col-sm-4">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('Title');
				echo $this->Form->input('applicant_id', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
				echo $this->Form->input('startTime', array('style' => "margin-bottom:10px;", 'timeFormat'=>'24','between' => '<br />'));
				echo $this->Form->input('endTime', array('style' => "margin-bottom:10px;", 'timeFormat'=>'24','between' => '<br />'));
				echo $this->Form->input('status', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Status','options'=>array('finished'=>'Finished','notfinished'=>'Not Finished')));
			?>
		</div>
		<div class="col-sm-4">
			<?php
			// output all the checkboxes at once
			echo $this->Form->input('Employee',array(
				'label' => __('Employee',true),
				'class'=>'checkbox multiselect',
				'style' => "margin-bottom:10px;",
				'type' => 'select',
				'options' => $employees,
				'selected' => $this->html->value('Employee.Employee'),
				'between' => '<br />'
			));
			?>
		</div>
</div>

<div class="row col-sm-12">
	<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
	<?php echo $this->Form->submit(__('Cancel', true), array('class'=>'btn btn-primary','name' => 'cancel','div' => false)); ?>

	<?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.multiselect').multiselect({
			buttonWidth: '100%'
		});
	});
</script>