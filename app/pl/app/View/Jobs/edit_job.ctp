
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
	<?php echo $this->Form->create('Job'); ?>
		<h1>Edit Job</h1>
		
		<div class="col-sm-4">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
				echo $this->Form->input('customer_id', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
				echo $this->Form->input('startTime', array('style' => "margin-bottom:10px;", 'timeFormat'=>'24','between' => '<br />'));
				echo $this->Form->input('endTime', array('style' => "margin-bottom:10px;", 'timeFormat'=>'24','between' => '<br />'));
				echo $this->Form->input('status', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Status','options'=>array('finished'=>'Finished','notfinished'=>'Not Finished')));
			?>
		</div>
		<div class="col-sm-4">
			<?php
			// output all the checkboxes at once
			echo $this->Form->input('Staff',array(
				'label' => __('Staff',true),
				'class'=>'checkbox multiselect',
				'style' => "margin-bottom:10px;",
				'type' => 'select',
				'multiple' => 'multiple',
				'options' => $staffs,
				'selected' => $this->html->value('Staff.Staff'),
				'between' => '<br />'
			));
			echo $this->Form->input('Service',array(
				'class' => 'checkbox multiselect',
				'label' => __('Services',true),
				'style' => "margin-bottom:10px;",
				'type' => 'select',
				'multiple' => 'multiple',
				'options' => $services,
				'selected' => $this->html->value('Service.Service'),
				'between' => '<br />'
			));
			?>
		</div>
		<div class="col-sm-4">
			<?php
			echo $this->Form->input('comment', array('rows'=>'3','class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter First Name'));
			/*
			// output all the checkboxes individually
			$checked = $form->value('Tag.Tag');
			echo $form->label(__('Tags',true));
			foreach ($tags as $id=>$label) {
				echo $form->input("Tag.checkbox.$id", array(
					'label'=>$label,
					'type'=>'checkbox',
					'checked'=>(isset($checked[$id])?'checked':false),
				));
			}
			*/
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