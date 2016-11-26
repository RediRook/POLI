
<div class="pagecontents form">
<?php echo $this->Form->create('Pagecontent'); ?>
	<fieldset>
		<legend><?php echo __('Edit page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('page');
		//echo $this->Form->input('content');
		 echo $this->Element('tinymce');
        //echo $this->Tinymce->input('Pagecontent.content', array(
        echo $this->Form->input('Pagecontent.content', array('type' => 'textarea', 'label' => 'Content'),array('language'=>'en'), 'full');
        ?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('class'=>'btn btn-primary','name' => 'cancel','div' => false)); ?>
<?php echo $this->Form->end(); ?>