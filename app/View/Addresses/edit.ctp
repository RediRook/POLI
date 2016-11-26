<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/'.$applicant['Applicant']['clientcase_id']);
$this->Html->addCrumb('Change Address', '/addresses/edit/'.$id);
?>
<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<h2><?php echo __('Change Address'); ?></h2>
	<?php
		echo $this->Form->input('address_line', array('label' => 'Address'));
		echo $this->Form->input('suburb');
		echo $this->Form->input('postcode');
		echo $this->Form->input('state');
		echo $this->Form->input('country_id', array('options' => $countries, 'label' => 'Country')); ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
