

<div class="row col-sm-12">
	<?php echo $this->Form->create('Service'); ?>
		<h1>Edit Service</h1>
			
			<div class="col-sm-4">
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Name'));
					echo $this->Form->input('description', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Description'));
					echo $this->Form->input('price', array('default'=>'0.00', 'class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Price'));
				?>
			</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->submit(__('Submit', true), array('class'=>'btn btn-primary','name' => 'ok', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('class'=>'btn btn-primary','name' => 'cancel','div' => false)); ?>

		<?php echo $this->Form->end(); ?>
	</div>
</div>
