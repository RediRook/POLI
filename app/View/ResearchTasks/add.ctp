<?php echo $this->Html->css('jquery-ui-1.10.3.custom'); ?>
<?php echo $this->Html->script('jquery-1.5.min'); ?>
<?php echo $this->Html->script('jquery-ui-1.10.3.custom.min'); ?>
<?php echo $this->Html->script('show-hide-checkbox'); ?>
<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $caseid . '#tab8');
$this->Html->addCrumb('Create Research Task', '/ResearchTasks/add/' . $caseid);
?>
<script>
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+10",
            showAnim: 'slideDown',
            dateFormat: "dd-mm-yy"
        });

    });
</script>

<table>
    <tr>
        <td>
            <h3>Choose From An Existing Template</h3>
            <select id="templates" >
                <option value=""> Choose a template</option>
                <?php foreach ($templates as $template): ?>
                    <option value="<?php echo $template['TemplateTask']['id'] . ' ' . $caseid ?>" onClick="javascript:location.href = this.value;"><?php echo $template['TemplateTask']['title'] ?></option>
                <?php endforeach ?>
            </select>
            <br><br>  <div class="modal hide"><input id="ID" type="text"></div>
        </td></tr></table>
<br>
<h3>Or</h3>
<br>
<div class="researchTasks form">
    <?php echo $this->Form->create('ResearchTask'); ?>
    <h3>Applicant: <?php echo $case['Applicant']['first_name']." ".$case['Applicant']['surname']; ?></h3>
    <fieldset>
        <h3>Create a New Research Task</h3>
        <?php
        echo $this->Form->input('description', array('type' => 'textarea', 'style' => 'width: 900px'));
        ?>
        <div class="modal hide">
            <?php echo $this->Form->input('creation_date'); ?>
            <?php echo $this->Form->input('completion_date'); ?>
        </div>
        <?php
        echo $this->Form->input('expected_completion_date', array('label' => 'Expected Completion Date', 'id' => 'datepicker', 'class' => 'datepicker', 'type' => 'text'));
        echo $this->Form->input('desired_outcome', array('type' => 'textarea', 'style' => 'width: 900px'));
        ?> 
        <div class="model hide">
            <?php echo $this->Form->input('actual_outcome', array('type' => 'textarea', 'style' => 'width: 900px')); ?>
        </div>
        <div class="input">
            <label>Assigned to:</label>
            <select name="data[ResearchTask][responsible_id]">
                <option value="">Choose an Employee</option>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee['Employee']['id']; ?>"><?php echo $employee['Employee']['first_name'] . ' ' . $employee['Employee']['surname']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <?php echo $this->Form->input('status', array('options' => array('Pending', 'Ongoing'))); ?>   
    </fieldset>
    <div class="submit">
        <?php echo $this->Form->submit(__('Submit', true), array('name' => 'Button', 'div' => false)); ?>
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'Button', 'div' => false)); ?>
    </div>  
    <?php echo $this->Form->end(); ?>
    <script>
    $(document).ready(function() {
        $("#templates").change(function() {
            var val = document.getElementById("templates");
            var ident = val.options[val.selectedIndex].value;
            var url = location.href;
            var splitUrlArray = url.split("/");

            //This is for IE Server
            //var firstPart = splitUrlArray[0] + "/" + splitUrlArray[1] + "/" + splitUrlArray[2] + "/" + splitUrlArray[3] + "/" + splitUrlArray[4];

            //This is for Localhost
            //var firstPart = splitUrlArray[0] + "/" + splitUrlArray[1] + "/" + splitUrlArray[2] + "/" + splitUrlArray[3];

            //This is for Polarons server
            var firstPart = splitUrlArray[0] + "/" + splitUrlArray[1] + "/" + splitUrlArray[2];

            location.href = firstPart + '/ResearchTasks/use_template/' + ident;
            document.getElementById('ID').value = firstPart + '/ResearchTasks/use_template/' + ident;// Redirects
        });
    });
    </script>
</div>
