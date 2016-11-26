<?php
echo $this->Html->script('bootstrap-datepicker.js');
echo $this->HTML->css('datepicker');
echo $this->HTML->script('JQueryUser');
?>

<?php $this->Html->addCrumb('Reporting', '/clientcases/reporting'); ?> 
<?php $this->Html->addCrumb('Research Task Reporting', '/clientcases/reportResearchTasks'); ?> 
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            autoclose: true
        });
    });
</script>
<h2>Employees Responsible for Tasks</h2>

<?php echo $this->form->create('reportTasks'); ?>
<fieldset>
    <?php echo $this->Form->input('date1', array('label' => 'First date', 'class' => 'datepicker', 'id' => "dpd1")); ?>
    <?php echo $this->Form->input('date2', array('label' => 'Second date', 'class' => 'datepicker', 'id' => "dpd2")); ?>

    <div class="input">
        <label>Select an Employee:</label>
        <select name="data[employee][responsible_id]">
            <option value="">Choose an Employee</option>
            <?php foreach ($employees as $employee): ?>
                <option value="<?php echo $employee['Employee']['id']; ?>"><?php echo $employee['Employee']['first_name'] . ' ' . $employee['Employee']['surname']; ?></option>
            <?php endforeach ?>
        </select>

        <label>By Creation or Completion:</label>
        <select name="data[created/complete]">
            <option value="completion">Completion</option>
            <option value="creation">Creation</option>
        </select>
    </div>
    <?php echo $this->Form->end(__('Submit')); ?>

</fieldset>

<?php if ($data['created/complete'] != null) { ?>
    <?php
    echo $this->Form->create('Clientcase', array('action' => 'report9'));
    echo $this->Form->hidden('date1', array('default' => $data['date1']));
    echo $this->Form->hidden('date2', array('default' => $data['date2']));
    echo $this->Form->hidden('created/complete', array('default' => $data['created/complete']));
    echo $this->Form->hidden('responsible', array('default' => $data['employee']['responsible_id']));
    echo $this->Form->end(__('Excel Report'));
    ?>      
    <table id="data">
        <thead>
        <th class="heading">Task Description</th>
        <th class="heading">Creation Date</th>
        <?php if ($data['created/complete'] == 'completion') { ?>
            <th class="heading">Completion Date</th>
        <?php } ?>
        <?php if ($data['created/complete'] == 'creation') { ?>
            <th class="heading">Expected Completion Date</th>
        <?php } ?>
        <th class="heading">Person Responsible</th>
        <?php if ($data['created/complete'] == 'completion') { ?>
            <th class="heading">Outcome</th>
        <?php } ?>
        <?php if ($data['created/complete'] == 'creation') { ?>
            <th class="heading">Expected Outcome</th>
            <?php } ?>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
        <td valighn="top">
            <?php echo $this->text->truncate($task['ResearchTask']['description'], 20, array('ellipses' => '...')); ?>
        </td>
        <td valighn="top">
            <?php echo $task['ResearchTask']['creation_date']; ?>
        </td>
        <?php if ($data['created/complete'] == 'completion') { ?>
            <td valighn="top">
                <?php echo $task['ResearchTask']['completion_date']; ?>
            </td>
        <?php } ?>
        <?php if ($data['created/complete'] == 'creation') { ?>
            <td valighn="top">
                <?php echo $task['ResearchTask']['expected_completion_date']; ?>
            </td>
        <?php } ?>
        <td valighn="top">
            <?php echo $task['responsibleEmployee']['first_name'] . ' ' . $task['responsibleEmployee']['surname']; ?>
        </td>
        <?php if ($data['created/complete'] == 'completion') { ?>
            <td valighn="top">
                <?php echo $this->text->truncate($task['ResearchTask']['actual_outcome'], 20, array('ellipses' => '...')); ?>
            </td>
        <?php } ?>
        <?php if ($data['created/complete'] == 'creation') { ?>
            <td valighn="top">
                <?php echo $this->text->truncate($task['ResearchTask']['desired_outcome'], 20, array('ellipses' => '...')); ?>
            </td>
        <?php } ?>
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
<?php } ?>