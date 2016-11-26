
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
                selectOtherMonths: true
            }

        ).datepicker( "setDate" , "1/1/2013");
    });
</script>


<div class='content'>
    <?php echo $this->Form->create('Promotion',array('enctype'=>'multipart/form-data')); ?>
    <h1>Add Promotion</h1>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('date',array( 'id'=>'datepicker', 'type'=>'hidden'));
 echo $this->Form->input('photos.', array('type' => 'file', 'label' => 'Add Images', 'multiple'));

    ?>
    <?php echo $this->Form->submit(__('Submit', true), array('id'=>'button','name' => 'ok', 'div' => false)); ?>
    <?php $url = array('controller'=>'promotions', 'action'=>'index');
    echo $this->Form->button('Cancel',array('id'=>'button','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
    <?php echo $this->Form->end(); ?>
</div>


