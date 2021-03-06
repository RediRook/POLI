<?php echo $this->Html->css('jquery-ui-1.10.3.custom'); ?>
<?php echo $this->Html->script('jquery-1.5.min'); ?>
<?php echo $this->Html->script('jquery-ui-1.10.3.custom.min'); ?>
<?php echo $this->Html->script('show-hide-checkbox'); ?>
<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8');
$this->Html->addCrumb('Edit Research Task', '/ResearchTasks/edit/' . $id);
?>
<script>
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            showAnim: 'slideDown',
            dateFormat: "dd-mm-yy"
        });
        $("#datepicker2").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            showAnim: 'slideDown',
            dateFormat: "dd-mm-yy"
        });
    });
</script>

<div class="researchTasks form">
    <?php echo $this->Form->create('ResearchTask'); ?>
    <h3>Applicant: <?php echo $case['Applicant']['first_name'] . " " . $case['Applicant']['surname']; ?></h3>
    <fieldset>
        <legend><?php echo __('Edit Research Task'); ?></legend>
        <?php
        echo $this->Form->input('description', array('type' => 'textarea', 'style' => 'width: 900px'));
        ?>
        <div class="modal hide">
            <?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('creation_date'); ?>
        </div>
        <?php echo $this->Form->input('completion_date', array('label' => 'Actual Completion Date', 'id' => 'datepicker', 'class' => 'datepicker', 'type' => 'text')); ?>
        <?php echo $this->Form->input('expected_completion_date', array('label' => 'Expected Completion Date', 'id' => 'datepicker2', 'class' => 'datepicker', 'type' => 'text')); ?>
        <?php echo $this->Form->input('desired_outcome', array('type' => 'textarea', 'style' => 'width: 900px')); ?>
        <?php echo $this->Form->input('actual_outcome', array('type' => 'textarea', 'style' => 'width: 900px')); ?>
        <div class="input">
            <label>Assigned to:</label>
            <select name="data[ResearchTask][responsible_id]">
                <option value="<?php echo $currEmp['Employee']['id']; ?>"><?php echo $currEmp['Employee']['first_name'] . ' ' . $currEmp['Employee']['surname']; ?></option>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee['Employee']['id']; ?>"><?php echo $employee['Employee']['first_name'] . ' ' . $employee['Employee']['surname']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <?php echo $this->Form->input('status', array('options' => array('Pending', 'Ongoing', 'Complete'))); ?>   
    </fieldset>
    <div class="submit">
        <?php echo $this->Form->submit(__('Submit', true), array('name' => 'Button', 'div' => false)); ?>
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'Button', 'div' => false)); ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

