
<?php echo $this->Html->script('jquery-datepicker1'); ?>
<?php echo $this->Html->script('jquery-datepicker2'); ?>
<?php echo $this->Html->css('datepicker');?>
<?php echo $this->Html->css('bootstrap-multiselect'); ?>
<?php echo $this->Html->script('bootstrap-multiselect'); ?>

  <link rel="stylesheet" href="../css/prism.css">
  <link rel="stylesheet" href="../css/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>

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
    <?php echo $this->Form->create('Appointment'); ?>
    <h1>Add Appointment</h1>
	
	<div class="col-sm-4">
		<?php
		echo $this->Form->input('title', array('class'=>'form-control', 'type' => 'textarea', 'style' => "width:500px;", 'placeholder'=>'Enter a Title'));
		echo $this->Form->input('Applicant.Applicant', array('class' => 'chosen-select', 'style' => 'font-height:150px;'));
		echo $this->Form->input('startTime', array('style' => "margin-bottom:10px;", 'timeFormat'=>'24'));
		echo $this->Form->input('endTime', array('style' => "margin-bottom:10px;", 'timeFormat' => '24','between' => '<br />'));
        echo '<div class="error-message" id="super_error" style="display:none">The start time must be before the end time.</div>';
		echo $this->Form->input('status',array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label'=>'Status','options'=>array('NotFinished'=>'Not Finished', 'Finished'=>'Finished')));
		?>
	</div>
	<div class="col-sm-4">
		<!--<?php/*
		echo $this->Form->input('Employee',array(
			'label' => __('Employee',true),
			'class'=>'checkbox',
			'type' => 'select',
			'style' => "margin-bottom:10px;",
			'selected' => $this->html->value('Employee.Employee'),
			'between' => '<br />'
		));
		*/
		 
		?>!-->
	<?php echo $this->Form->input('Employee.Employee');?>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
		<?php $url = array('controller'=>'Appointments', 'action'=>'index');
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="../js/chosen.jquery.js" type="text/javascript"></script>
  <script src="../js/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>