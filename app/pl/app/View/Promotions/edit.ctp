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


<div class="row col-sm-12">
    <?php echo $this->Form->create('Promotion',array('enctype'=>'multipart/form-data')); ?>
    <h1>Edit Promotion</h1>
    <div class="col-sm-6">
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title');
        echo $this->Form->input('date',array( 'id'=>'datepicker', 'type'=>'hidden'));
        echo $this->Form->input('photos.', array('type' => 'file', 'label' => 'Edit Images', 'multiple'));
        ?>

    </div>
</div>
<div class="row col-sm-12">
    <div class="col-sm-6">
        <?php
        if($this->request->data)
        {
            echo $this->Html->link(
                $this->Html->image("delete.png", array('class'=>'deleteImage')),
                array('controller' => 'promotions', 'action' => 'deletePhoto',
                    'promotionid' => $this->request->data['Promotion']['id'],
                    'photoid' => $this->request->data['Photo']['id']),
                array('escape' => false),
                'Are you sure you want to this photo?');?>

            <?php foreach($photos as $photo): ?>

            <img src="<?php echo $this->webroot . "app/webroot/" . $photo['Photo']['file_path'];?>">
        <?php endforeach; ?>


        <?php

        }
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<div class="row col-sm-12">
        <?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
        <?php echo $this->Form->submit(__('Cancel', true), array('class'=>'btn btn-primary','name' => 'cancel','div' => false)); ?>
</div>