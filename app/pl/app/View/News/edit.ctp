
<div class="news form">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
		<legend><?php echo __('Edit News'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter a Title'));
		echo $this->Form->input('date',array('label'=>'Date', 'id'=>'datepicker', 'type'=>'hidden'));
        echo $this->Element('tinymce');
        //echo $this->Tinymce->input('Pagecontent.content', array(
        echo $this->Form->input('News.body', array('type' => 'textarea', 'label' => 'Content'),array('language'=>'en'), 'full');
        ?>

	</fieldset>
	<?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'class'=>'btn btn-primary','div' => false)); ?>
			<?php $url = array('controller'=>'news', 'action'=>'index');
			echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
			?>
			<?php echo $this->Form->end(); ?>
</div>

