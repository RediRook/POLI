<?php echo $this->Html->script('bootstrap-datepicker.js');
echo $this->HTML->css('datepicker');
?>
<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $applicant['Applicant']['clientcase_id']);
$this->Html->addCrumb('Edit Applicant', '/applicants/edit/' . $id);
?>
<div class="applicants form">
<?php echo $this->Form->create('Applicant'); ?>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                autoclose: true,
                yearRange: "1800 : 2250"

            });
        });
    </script>
    <fieldset>
        <h2><?php echo __('Edit Applicant Details'); ?></h2>
        <?php
        echo $this->Form->hidden('id');
        echo $this->Form->hidden('clientcase_id');
        echo $this->Form->input('title', array(
            'options' => array(
                '' => '',
                'Mr' => 'Mr',
                'Mrs' => 'Mrs',
                'Ms' => 'Ms',
                'Miss' => 'Miss')));
        echo $this->Form->input('first_name');
        echo $this->Form->input('middle_name');
        echo $this->Form->input('surname');
        echo $this->Form->input('date', array('label' => 'Date of birth',
            'id' => 'datepicker',
            'type' => 'text',
            'class' => 'datepicker', 'default' => $test));
        echo $test;
        echo $this->Form->input('email');
        echo $this->Form->input('landline_number');
        echo $this->Form->input('mobile_number');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

