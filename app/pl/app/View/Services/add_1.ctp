
<div class="row col-sm-12">
	<?php echo $this->Form->create('Service'); ?>
		<h1>Add Service</h1>
		
		<div class="col-sm-4">
			<?php
				echo $this->Form->input('name', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Name'));
				echo $this->Form->input('description', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Description'));
				echo $this->Form->input('price', array('default'=>'0.00', 'class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Price'));
			?>
		</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
		<?php $url = array('controller'=>'services', 'action'=>'index');
			echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>