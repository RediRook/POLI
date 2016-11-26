
<?php echo $this->Html->script('jquery-datepicker1'); ?>
<?php echo $this->Html->script('jquery-datepicker2'); ?>
<?php echo $this->Html->css('datepicker');?>

<script>
    $(function() {
        $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: "+0D",
                maxDate: "+0D",
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                showOtherMonths: true,
                selectOtherMonths: true,
            }

        ).datepicker( "setDate" , "1/1/2013");
    });
</script>
<div class="news form">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
		<legend><?php echo __('Add News'); ?></legend>
	<?php
		echo $this->Form->input('title', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter a Title'));
		echo $this->Form->input('date',array('label'=>'Date', 'id'=>'datepicker', 'type'=>'hidden'));
		/*echo date("d/m/Y");*/

        /*added by dora */
        /*date_default_timezone_set('Australia/Melbourne');
                echo $this->Form->input('Date',array( 'default'=> date('Y-mm-dd',time()),'disabled'=>true));*/

        echo $this->Element('tinymce');
        echo $this->Form->input('News.body', array('type' => 'textarea', 'label' => 'Content'),array('language'=>'en'), 'full');

        ?>

	</fieldset>
<div class="row">
		<div class="col-sm-12">

			<?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'class'=>'btn btn-primary','div' => false)); ?>
			<?php $url = array('controller'=>'news', 'action'=>'index');
			echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
			?>
			<?php echo $this->Form->end(); ?>
		</div>
</div>

