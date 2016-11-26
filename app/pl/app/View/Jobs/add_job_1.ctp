
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


    function checkDate(start_id,end_id){
        var start_date  = $("#WorkshopClassStartYear").val()+$("#WorkshopClassStartMonth").val()+$("#WorkshopClassStartDay").val();
        var end_date  = $("#WorkshopClassEndYear").val()+$("#WorkshopClassEndMonth").val()+$("#WorkshopClassEndDay").val();
        var start_date1 = $("#WorkshopClassStartHour").val()+$("#WorkshopClassStartMin").val();
        var end_date1 = $("#WorkshopClassEndHour").val()+$("#WorkshopClassEndMin").val();
        var start_date2 = $("#WorkshopClassStartMeridian").val()=='am'?0:12;
        var end_date2 = $("#WorkshopClassEndMeridian").val()=='am'?0:12;
        if(start_date > end_date){
            //alert("The start time must be before the end time.");
            $("#super_error").show();
            return false;
        }else if(start_date == end_date){
            if(start_date2 == end_date2){
                if(start_date1 >= end_date1){
                    $("#super_error").show();
                    return false;
                }
            }else if(start_date2>end_date2){
                $("#super_error").show();
                return false;
            }
        }
        return true;
    }
</script>

<div class="row col-sm-12">
    <?php echo $this->Form->create('Job'); ?>
    <h1>Add Job</h1>
	
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('title', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter a Title'));
		echo $this->Form->input('customer_id', array('class'=>'form-control', 'style' => "margin-bottom:10px;"));
		echo $this->Form->input('startTime', array('style' => "margin-bottom:10px;", 'timeFormat'=>'24','between' => '<br />'));
		echo $this->Form->input('endTime', array('style' => "margin-bottom:10px;", 'timeFormat' => '24','between' => '<br />'));
        echo '<div class="error-message" id="super_error" style="display:none">The start time must be before the end time.</div>';
		echo $this->Form->input('status',array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Status','options'=>array('Finished'=>'Finished','NotFinished'=>'Not Finished')));
		?>
	</div>
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('Staff',array(
			'label' => __('Staff',true),
			'class'=>'checkbox multiselect',
			'type' => 'select',
			'style' => "margin-bottom:10px;",
			'multiple' => 'multiple',
			'options' => $staffs,
			'selected' => $this->html->value('Staff.Staff'),
			'between' => '<br />'
		));
		
		echo $this->Form->input('Service',array(
			'label' => __('Services',true),
			'class'=>'checkbox multiselect',
			'type' => 'select',
			'style' => "margin-bottom:10px;",
			'multiple' => 'multiple',
			'options' => $services,
			'selected' => $this->html->value('Service.Service'),
			'between' => '<br />'
		));
		?>
	
	</div>
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('comment', array('class'=>'form-control', 'rows'=>'3', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter a comment'));
		?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
		<?php $url = array('controller'=>'jobs', 'action'=>'index');
		echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.multiselect').multiselect({
			buttonWidth: '100%'
		});
	});
</script>